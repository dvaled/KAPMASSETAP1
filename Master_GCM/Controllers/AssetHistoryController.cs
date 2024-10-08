using Microsoft.AspNetCore.Mvc;
using Microsoft.EntityFrameworkCore;

[ApiController]
[Route("api/[controller]")]

public class AssetHistoryController : ControllerBase{
    private readonly AppDbContext _context;

    public AssetHistoryController(AppDbContext context){
        _context = context;
    }

    [HttpGet("{IDASSET}")]
    public async Task<ActionResult<List<TRNASSETHISTORYMODEL>>> GetAssetHistory(string IDASSET){
        var idasset = await _context.TRN_HIST_ASSET.Where(x => x.IDASSET == IDASSET).ToListAsync();

        if (idasset == null || !idasset.Any()){
            return NotFound();
        }
        return idasset;
    }

    [HttpPost]
    public async Task<ActionResult<TRNASSETHISTORYMODEL>> PostAssetHistory(TRNASSETHISTORYMODEL assetHistory){
        _context.TRN_HIST_ASSET.Add(assetHistory);
        await _context.SaveChangesAsync();

        return CreatedAtAction("GetAssetHistory", new { id = assetHistory.IDASSETHISTORY }, assetHistory);
    }
}