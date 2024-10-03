using Microsoft.AspNetCore.Mvc;
using Microsoft.EntityFrameworkCore;

[ApiController]
[Route("api/[controller]")]

public class TrnAssetSpecController : ControllerBase{
    private readonly AppDbContext _context;
    public TrnAssetSpecController(AppDbContext context){
        _context = context;
    }

    [HttpGet("{IDASSET}")]
    public async Task<ActionResult<List<TRNASSETSPECMODEL>>> GetAssetSpec(int IDASSET){
        var idasset = await _context.TRN_DTL_SPEC.Where(x => x.IDASSET == IDASSET).ToListAsync();

        if (idasset == null || !idasset.Any()){
            return NotFound();
        }
        return idasset;
    }

    [HttpPost]
    public async Task<ActionResult<TRNASSETSPECMODEL>> PostAssetSpec(TRNASSETSPECMODEL assetSpec){
        _context.TRN_DTL_SPEC.Add(assetSpec);
        await _context.SaveChangesAsync();

        return CreatedAtAction("GetAssetSpec", new { id = assetSpec.IDASSET }, assetSpec);
    }

    [HttpPut("{IDASSET}")]
    public async Task<IActionResult> PutAssetSpec(int IDASSET, TRNASSETSPECMODEL assetSpec){
        if (IDASSET != assetSpec.IDASSET){
            return BadRequest();
        }

        _context.Entry(assetSpec).State = EntityState.Modified;

        try{
            await _context.SaveChangesAsync();
        }
        catch (DbUpdateConcurrencyException){
            if (!AssetSpecExists(IDASSET)){
                return NotFound();
            }
            else{
                throw;
            }
        }

        return NoContent();
    }
    private bool AssetSpecExists(int IDASSET){
        return _context.TRN_DTL_SPEC.Any(e => e.IDASSET == IDASSET);
    }
}