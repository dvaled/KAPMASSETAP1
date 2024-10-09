using System.Security.Cryptography.X509Certificates;
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
    public async Task<ActionResult<TRNASSETPICTUREMODEL>> PostTrnHardware(TRNASSETPICTUREMODEL trnPicture)
    {
        _context.TRN_DTL_PICTURE.Add(trnPicture);
        await _context.SaveChangesAsync();

        return CreatedAtAction("GetTrnHardware", new { id = trnPicture.IDASSETPIC }, trnPicture);
    }

    [HttpPut("{IDASSETPIC}")]
    public async Task<IActionResult> PutTrnHardware(int IDASSETPIC, TRNASSETPICTUREMODEL trnPicture)
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