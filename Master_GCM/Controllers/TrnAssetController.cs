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

    // Get hardware by IdAsset and include the employee information
    [HttpGet("{IDASSET}")]
    public async Task<ActionResult<List<object>>> GetTrnHardware(string IDASSET)
    {
        // Fetch hardware along with the associated employee details
        var trnassetemployee = await _context.TRN_ASSET
            .Where(x => x.IDASSET == IDASSET) // Compare using the string IDASSET
            .Include(e => e.EMPLOYEE) // Include Employee details
            .Select(h => new
            {
                // Select specific fields
                h.IDASSET,
                h.NIPP,
                EmployeeName = h.EMPLOYEE.NAME,
                EmployeePosition = h.EMPLOYEE.POSITION,
                EmployeeUnit = h.EMPLOYEE.UNIT,
            })
            .ToListAsync();

        if (trnassetemployee == null || !trnassetemployee.Any())
        {
            return NotFound();
        }

        return Ok(trnassetemployee);
    }

    [HttpPost]
    public async Task<ActionResult<TRNASSETMODEL>> PostTrnHardware(TRNASSETMODEL trnAsset)
    {
        _context.TRN_ASSET.Add(trnAsset);
        await _context.SaveChangesAsync();

        return CreatedAtAction("GetTrnHardware", new { id = trnAsset.IDASSET }, trnAsset);
    }
    
    // Get all hardware
    [HttpGet("all")]
    public async Task<ActionResult<List<TRNASSETMODEL>>> GetAllHardware()
    {
        var transHardware = await _context.TRN_ASSET.ToListAsync();
        if (transHardware == null || !transHardware.Any())
        {
            return NotFound("List is empty");
        }
        return Ok(transHardware);
    }
}