using Microsoft.AspNetCore.Http.HttpResults;
using Microsoft.AspNetCore.Mvc;
using Microsoft.EntityFrameworkCore;

[ApiController]
[Route("api/[controller]")]
public class TrnAssetController : ControllerBase
{
    private readonly AppDbContext _context;

    public TrnAssetController(AppDbContext context)
    {
        _context = context;
    }

    // Get hardware by ASSETCODE and include the employee information
    [HttpGet("{ASSETCODE}")]
    public async Task<ActionResult<TRNASSETMODEL>> GetTrnAssetById(string ASSETCODE)
    {
        var trndtlAsset = await _context.TRN_ASSET
            .Include(x => x.EMPLOYEE) // Eagerly load the related employee information
            .Where(x => x.ASSETCODE == ASSETCODE)
            .ToListAsync();

        if (trndtlAsset == null)
        {
            return Ok("Asset not found");
        }

        return Ok(trndtlAsset);
    }

    [HttpPost]
    public async Task<ActionResult<TRNASSETMODEL>> PostTrnHardware(TRNASSETMODEL trnAsset)
    {
        _context.TRN_ASSET.Add(trnAsset);
        await _context.SaveChangesAsync();

        return CreatedAtAction("GetTrnHardware", new { id = trnAsset.ASSETCODE }, trnAsset);
    }
    
    // public async Task<ActionResult<TRNASSETMODEL>> PostTrnHardware(TRNASSETMODEL trnAsset)
    // {
    //     // First, add the asset without the ASSETCODE so that the IDASSET gets generated
    //     _context.TRN_ASSET.Add(trnAsset);
    //     await _context.SaveChangesAsync();

    //     // Now, generate the ASSETCODE based on the required structure
    //     string assetCategoryInitial = trnAsset.ASSETCATEGORY.Substring(0, 1).ToUpper(); // First letter of ASSETCATEGORY
    //     string addedDateStr = trnAsset.ADDEDDATE.ToString("yyyyMMdd"); // Format ADDEDDATE as YYYYMMDD
    //     trnAsset.ASSETCODE = $"{trnAsset.ASSETTYPE}-{assetCategoryInitial}-{addedDateStr}-{trnAsset.IDASSET}";

    //     // Update the entity with the generated ASSETCODE
    //     _context.Entry(trnAsset).State = EntityState.Modified;
    //     await _context.SaveChangesAsync();

    //     return CreatedAtAction("GetTrnHardware", new { id = trnAsset.IDASSET }, trnAsset);
    // }
        
    // Get all hardware
    [HttpGet]
    public async Task<ActionResult<List<TRNASSETMODEL>>> GetAllHardware()
    {
        var transHardware = await _context.TRN_ASSET.ToListAsync();
        if (transHardware == null || !transHardware.Any())
        {
            return Ok("List is empty");
        }
        return Ok(transHardware);
    }
}