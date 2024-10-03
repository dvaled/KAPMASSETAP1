using Microsoft.AspNetCore.Mvc;
using Microsoft.EntityFrameworkCore;

[ApiController]
[Route("api/[controller]")]

public class TrnSoftwareController : ControllerBase{
    private readonly AppDbContext _context;
    public TrnSoftwareController(AppDbContext context){
        _context = context;
    }

    [HttpGet("{IDASSET}")]
    public async Task<ActionResult<List<TRNSOFTWAREMODEL>>> GetTrnSoftware(int IDASSET){
        var trnSoftware = await _context.TRN_DTL_SOFTWARE.Where(e => e.IDASSET == IDASSET).ToListAsync();

        if (trnSoftware == null || !trnSoftware.Any()){
            return NotFound();
        }

        return trnSoftware;
    }

    [HttpPost]
    public async Task<ActionResult<TRNSOFTWAREMODEL>> PostTrnSoftware(TRNSOFTWAREMODEL trnSoftware){
        _context.TRN_DTL_SOFTWARE.Add(trnSoftware);
        await _context.SaveChangesAsync();

        return CreatedAtAction("GetTrnSoftware", new { id = trnSoftware.IDASSETSOFTWARE }, trnSoftware);
    }
}       