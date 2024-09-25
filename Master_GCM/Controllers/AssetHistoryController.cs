using Microsoft.AspNetCore.Mvc;
using Microsoft.EntityFrameworkCore;

[ApiController]
[Route("api/[controller]")]

public class AssetHistoryController : ControllerBase{
    private readonly AppDbContext _context;

    public AssetHistoryController(AppDbContext context){
        _context = context;
    }

    [HttpGet("{IdAsset}")]
    public async Task<ActionResult<List<AssetHistoryModel>>> GetAssetHistory(int IdAsset){
        var idasset = await _context.AssetHistory.Where(e => e.IdAsset == IdAsset).ToListAsync();

        if (idasset == null || !idasset.Any()){
            return NotFound();
        }
        return idasset;
    }

    [HttpPost]
    public async Task<ActionResult<AssetHistoryModel>> PostAssetHistory(AssetHistoryModel assetHistory){
        _context.AssetHistory.Add(assetHistory);
        await _context.SaveChangesAsync();

        return CreatedAtAction("GetAssetHistory", new { id = assetHistory.IdAssetHistory }, assetHistory);
    }
}