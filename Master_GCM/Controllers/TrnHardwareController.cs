using Microsoft.AspNetCore.Mvc;
using Microsoft.EntityFrameworkCore;

[ApiController]
[Route("api/[controller]")]

public class TrnHardwareController(AppDbContext context) : ControllerBase{
    private readonly AppDbContext _context = context;

    [HttpGet("{IdAsset}")]
    public async Task<ActionResult<List<TrnHardwareModel>>> GetTrnHardware(int IdAsset){
        var transHardware = await _context.TrnHardwareM.Where(e => e.IdAsset == IdAsset).ToListAsync();

        if (transHardware == null || !transHardware.Any()){
            return NotFound();
        }

        return transHardware;
    }

    [HttpPost]
    public async Task<ActionResult<TrnHardwareModel>> PostTrnHardware(TrnHardwareModel trnHardware){
        _context.TrnHardwareM.Add(trnHardware);
        await _context.SaveChangesAsync();

        return CreatedAtAction("GetTrnsHardware", new { id = trnHardware.IdHardware }, trnHardware);
    }
}