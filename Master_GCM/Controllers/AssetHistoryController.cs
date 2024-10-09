using Microsoft.AspNetCore.Http.HttpResults;
using Microsoft.AspNetCore.Mvc;
using Microsoft.EntityFrameworkCore;

[ApiController]
[Route("api/[controller]")]

public class AssetHistoryController : ControllerBase{
    private readonly AppDbContext _context;

    public AssetHistoryController(AppDbContext context){
        _context = context;
    }

    [HttpGet("{ASSETCODE}")]
    public async Task<ActionResult<List<TRNASSETHISTORYMODEL>>> GetAssetHistory(string ASSETCODE){
        var assetcode = await _context.TRN_HIST_ASSET.Where(x => x.ASSETCODE == ASSETCODE).ToListAsync();

        if (assetcode == null || !assetcode.Any()){
            return NotFound();
        }
        return Ok(assetcode);
    }

    [HttpPost]
    public async Task<ActionResult<TRNASSETHISTORYMODEL>> PostAssetHistory(TRNASSETHISTORYMODEL assetHistory){
        _context.TRN_HIST_ASSET.Add(assetHistory);
        await _context.SaveChangesAsync();

        return CreatedAtAction("GetAssetHistory", new { id = assetHistory.IDASSETHISTORY }, assetHistory);
    }
    
    [HttpPut("{IDASSETHISTORY}")]
    public async Task<IActionResult> PutAssetHistory(int IDASSETHISTORY, TRNASSETHISTORYMODEL assetHistory){
        if (IDASSETHISTORY != assetHistory.IDASSETHISTORY){
            return BadRequest();
        }

        _context.Entry(assetHistory).State = EntityState.Modified;

        try{
            await _context.SaveChangesAsync();
        }
        catch (DbUpdateConcurrencyException){
            if (!AssetHistoryExists(IDASSETHISTORY)){
                return NotFound();
            }
            else{
                throw;
            }
        }

        return NoContent();
    }
    private bool AssetHistoryExists(int IDASSETHISTORY){
        return _context.TRN_HIST_ASSET.Any(e => e.IDASSETHISTORY == IDASSETHISTORY);
    }

}