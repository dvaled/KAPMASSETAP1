using Microsoft.AspNetCore.Http.HttpResults;
using Microsoft.AspNetCore.Mvc;
using Microsoft.EntityFrameworkCore;

[ApiController]
[Route("api/[controller]")]

public class TrnAssetSpecController : ControllerBase{
    private readonly AppDbContext _context;
    public TrnAssetSpecController(AppDbContext context){
        _context = context;
    }

    [HttpGet("{ASSETCODE}")]
    public async Task<ActionResult<List<TRNASSETSPECMODEL>>> GetAssetSpec(string ASSETCODE){
        var trngetspec = await _context.TRN_DTL_SPEC.Where(x => x.ASSETCODE == ASSETCODE).ToListAsync();

        if (trngetspec == null || !trngetspec.Any()){
            return Ok("No Asset Specification Data Available");
        }
        return Ok(trngetspec);
    }

    [HttpPost("{ASSETCODE}")]
    public async Task<ActionResult<TRNASSETSPECMODEL>> PostAssetSpec(string assetcode,TRNASSETSPECMODEL assetSpec)
    {
        assetSpec.ASSETCODE = assetcode;

        // Auto-increment MasterID by finding the maximum value for the same CONDITION
        var maxID = await _context.TRN_DTL_SPEC
            .MaxAsync(e => (int?)e.IDASSETSPEC) ?? 0;

        assetSpec.IDASSETSPEC = maxID + 1;
        assetSpec.DATEADDED = DateOnly.FromDateTime(DateTime.Now);
        assetSpec.DATEUPDATED = null;
        assetSpec.TRNASSET = null;

        _context.TRN_DTL_SPEC.Add(assetSpec);
        await _context.SaveChangesAsync();

        return CreatedAtAction("GetAssetSpec", new { ASSETCODE = assetSpec.ASSETCODE }, assetSpec);
    }

    [HttpPut("{IDASSETSPEC}")]
    public async Task<IActionResult> PutAssetSpec(int IDASSETSPEC, TRNASSETSPECMODEL assetSpec){
        if (IDASSETSPEC != assetSpec.IDASSETSPEC){
            return BadRequest();
        }

        _context.Entry(assetSpec).State = EntityState.Modified;

        try{
            await _context.SaveChangesAsync();
        }
        catch (DbUpdateConcurrencyException){
            if (!AssetSpecExists(IDASSETSPEC)){
                return NotFound();
            }
            else{
                throw;
            }
        }

        return NoContent();
    }
    private bool AssetSpecExists(int IDASSETSPEC){
        return _context.TRN_DTL_SPEC.Any(e => e.IDASSETSPEC == IDASSETSPEC);
    }
}