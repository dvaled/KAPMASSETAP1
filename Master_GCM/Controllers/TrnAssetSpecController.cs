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
            return Ok();
        }
        return Ok(trngetspec);
    }

    [HttpPost]
    public async Task<ActionResult<TRNASSETSPECMODEL>> PostAssetSpec(TRNASSETSPECMODEL assetSpec){
        _context.TRN_DTL_SPEC.Add(assetSpec);
        await _context.SaveChangesAsync();

        return CreatedAtAction("GetAssetSpec", new { id = assetSpec.IDASSETSPEC }, assetSpec);
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
                return Ok();
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