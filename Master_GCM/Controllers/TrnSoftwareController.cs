using Microsoft.AspNetCore.Mvc;
using Microsoft.EntityFrameworkCore;

[ApiController]
[Route("api/[controller]")]

public class TrnSoftwareController : ControllerBase{
    private readonly AppDbContext _context;
    public TrnSoftwareController(AppDbContext context){
        _context = context;
    }

    [HttpGet("{IdAsset}")]
    public async Task<ActionResult<List<TrnSoftwareModel>>> GetTrnSoftware(int IdAsset){
        var trnSoftware = await _context.TrnSoftwareM.Where(e => e.IdAsset == IdAsset).ToListAsync();

        if (trnSoftware == null || !trnSoftware.Any()){
            return NotFound();
        }

        return trnSoftware;
    }

    [HttpPost]
    public async Task<ActionResult<TrnSoftwareModel>> PostTrnSoftware(TrnSoftwareModel trnSoftware){
        _context.TrnSoftwareM.Add(trnSoftware);
        await _context.SaveChangesAsync();

        return CreatedAtAction("GetTrnSoftware", new { id = trnSoftware.IdSoftware }, trnSoftware);
    }
}       