using Microsoft.AspNetCore.Http.HttpResults;
using System.Text.Json.Serialization;
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

    // Get all hardware
    [HttpGet]
    public async Task<ActionResult<List<TRNASSETMODEL>>> GetAllAsset()
    {
        var transHardware = await _context.TRN_ASSET
            .Include(x => x.EMPLOYEE)
            .ToListAsync();
        return Ok(transHardware);
    }

    [HttpPost]
    public async Task<ActionResult<TRNASSETMODEL>> PostTrnAsset([FromBody] TRNASSETMODEL trnAsset)
    {
        //Auto increment MaxIdAsset 
        var maxIDAsset = await _context.TRN_ASSET
            .MaxAsync(e => (int?)e.IDASSET) ?? 0;
        trnAsset.IDASSET = maxIDAsset + 1;

        //Auto set Date
        trnAsset.ADDEDDATE = DateOnly.FromDateTime(DateTime.Now);

        trnAsset.ACTIVE = "y";
        trnAsset.CONDITION = "GREAT";

        // Generate the ASSETCODE based on <ASSETTYPE><ASSETCATEGORYFIRSTLATTER><ADDEDDATE><0 + IDASSET>
        string assetCategoryInitial;
        if (trnAsset.ASSETCATEGORY == "PRINTER")
        {
            assetCategoryInitial = trnAsset.ASSETCATEGORY[..2].ToUpper(); // First letter of ASSETCATEGORY
        }
        else
        {
            assetCategoryInitial = trnAsset.ASSETCATEGORY[..1].ToUpper(); // First letter of ASSETCATEGORY
        }  
        string addedDateStr = trnAsset.ADDEDDATE.ToString("yyMM"); // Format ADDEDDATE as YYYYMMDD
        trnAsset.ASSETCODE = $"{trnAsset.ASSETTYPE}{assetCategoryInitial}{addedDateStr}0{trnAsset.IDASSET}";
        trnAsset.EMPLOYEE = null;


        // Add Asset
        _context.TRN_ASSET.Add(trnAsset);
        await _context.SaveChangesAsync();

        return CreatedAtAction("GetAllAsset", new { id = trnAsset.IDASSET }, trnAsset);
    }

    [HttpPut("update-nipp/{ASSETCODE}")]
    public async Task<IActionResult> UpdateNipp(string ASSETCODE, [FromBody] int? newNipp)
    {
        var existingAsset = await _context.TRN_ASSET
            .FirstOrDefaultAsync(x => x.ASSETCODE == ASSETCODE);

        if (existingAsset == null)
        {
            return NotFound("Asset not found");
        }

        existingAsset.NIPP = newNipp;
        existingAsset.DATEUPDATED = DateOnly.FromDateTime(DateTime.Now);

        _context.Entry(existingAsset).State = EntityState.Modified;
        try
        {
            await _context.SaveChangesAsync();
        }
        catch (DbUpdateConcurrencyException)
        {
            if (!TrnAssetExists(ASSETCODE))
            {
                return NotFound();
            }
            else
            {
                throw;
            }
        }

        return Ok(existingAsset);
    }

    [HttpPut("{ASSETCODE}")]
    public async Task<ActionResult<TRNASSETMODEL>> PutTrnAsset(string ASSETCODE, [FromBody] TRNASSETMODEL trnAsset)
    {
        if (ASSETCODE != trnAsset.ASSETCODE)
        {
            return BadRequest("ASSETCODE not match");
        }

        var existingAsset = await _context.TRN_ASSET
            .FindAsync(ASSETCODE);
        if (existingAsset == null)
        {
            return NotFound("Asset not found");
        }

        existingAsset.ASSETBRAND = trnAsset.ASSETBRAND;
        existingAsset.ASSETMODEL = trnAsset.ASSETMODEL;
        existingAsset.ASSETSERIES = trnAsset.ASSETSERIES;
        existingAsset.ASSETSERIALNUMBER = trnAsset.ASSETSERIALNUMBER;
        existingAsset.CONDITION = trnAsset.CONDITION;
        existingAsset.DATEUPDATED = DateOnly.FromDateTime(DateTime.Now);
        existingAsset.PICUPDATED = trnAsset.PICUPDATED;
        existingAsset.ACTIVE = trnAsset.ACTIVE;

        _context.Entry(trnAsset).State = EntityState.Modified;
        try
        {
            await _context.SaveChangesAsync();
        }
        catch (DbUpdateConcurrencyException)
        {
            if (!TrnAssetExists(ASSETCODE))
            {
                return NotFound();
            }
            else
            {
                throw;
            }
        }

        return Ok(trnAsset);
    }

    private bool TrnAssetExists(string ASSETCODE)
    {
        return _context.TRN_ASSET.Any(e => e.ASSETCODE == ASSETCODE);
    }
}