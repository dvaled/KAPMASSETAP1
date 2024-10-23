using System.Net.Http.Headers;
using System.Security.Cryptography.X509Certificates;
using Master_GCM.ViewModels;
using Microsoft.AspNetCore.Http.HttpResults;
using Microsoft.AspNetCore.Mvc;
using Microsoft.EntityFrameworkCore;

[ApiController]
[Route("api/[controller]")]

public class TrnAssetDtlPictureController : ControllerBase
{
    private readonly AppDbContext _context;

    public TrnAssetDtlPictureController(AppDbContext context)
    {
        _context = context;
    }

    // Get hardware by ASSETCODE and include the employee information
    [HttpGet("{ASSETCODE}")]
    public async Task<ActionResult<List<TRNASSETPICTUREMODEL>>> GetTrnHardware(string assetcode)
    {
        var trnassetcode = await _context.TRN_DTL_PICTURE.Where(e => e.ASSETCODE == assetcode).ToListAsync();
    
        if (trnassetcode == null || !trnassetcode.Any())
        {
            return NotFound();
        }

        return Ok(trnassetcode);
    }

        [HttpPost]
        [Consumes("multipart/form-data")]
        public async Task<IActionResult> UploadAssetImage([FromForm] AssetViewModel model)
        {
            try
            {
                if (model.ASSETIMG != null && model.ASSETIMG.Count > 0)
                {
                    foreach (var file in model.ASSETIMG)
                    {
                        // Ensure the file is valid
                        if (file.Length > 0)
                        {
                            // Define folder where images will be saved
                            var folderName = Path.Combine("Images", "Assets");
                            var pathToSave = Path.Combine(Directory.GetCurrentDirectory(), folderName);

                            // Create directory if it doesn't exist
                            if (!Directory.Exists(pathToSave))
                                Directory.CreateDirectory(pathToSave);

                            // Generate the full path to save the image
                            var fileName = ContentDispositionHeaderValue.Parse(file.ContentDisposition).FileName.Trim('"');
                            var fullPath = Path.Combine(pathToSave, fileName);

                            // Save the image to the folder
                            using (var stream = new FileStream(fullPath, FileMode.Create))
                            {
                                await file.CopyToAsync(stream);
                            }

                            // Save only the file name to the database, not the path
                            var trnPicture = new TRNASSETPICTUREMODEL
                            {
                                ASSETCODE = model.ASSETCODE,
                                ACTIVE = model.ACTIVE,  
                                ASSETPIC = fileName,  
                                PICADDED = model.PICADDED,
                                DATEADDED = DateOnly.FromDateTime(DateTime.Now)  
                            };

                            // Add image data to the database
                            _context.TRN_DTL_PICTURE.Add(trnPicture);
                            await _context.SaveChangesAsync();
                        }
                        else
                        {
                            return BadRequest("Invalid file.");
                        }
                    }

                    return Ok("File(s) uploaded successfully.");
                }
                else
                {
                    return BadRequest("No files uploaded.");
                }
            }
            catch (Exception ex)
            {
                return StatusCode(500, $"Internal server error: {ex.Message}");
            }
        }

    [HttpPut("{IDASSETPIC}")]
    public async Task<IActionResult> PutImg(int IDASSETPIC, TRNASSETPICTUREMODEL trnPicture)
    {
        if (IDASSETPIC != trnPicture.IDASSETPIC)
        {
            return BadRequest();
        }

        _context.Entry(trnPicture).State = EntityState.Modified;

        try
        {
            await _context.SaveChangesAsync();
        }
        catch (DbUpdateConcurrencyException)
        {
            if (!TrnPictureExists(IDASSETPIC))
            {
                return NotFound();
            }
            else
            {
                throw;
            }
        }

        return NoContent();
    }
    private bool TrnPictureExists(int IDASSETPIC)
    {
        return _context.TRN_DTL_PICTURE.Any(e => e.IDASSETPIC == IDASSETPIC);
    }
}