using Microsoft.AspNetCore.Mvc;
using Microsoft.EntityFrameworkCore;

[ApiController]
[Route("api/[controller]")]
public class TrnHardwareController : ControllerBase
{
    private readonly AppDbContext _context;

    public TrnHardwareController(AppDbContext context)
    {
        _context = context;
    }

    // Get hardware by IdAsset and include the employee information
    [HttpGet("{IdAsset}")]
    public async Task<ActionResult<List<object>>> GetTrnHardware(int IdAsset)
    {
        // Fetch hardware along with the associated employee details
        var transHardware = await _context.TrnHardwareM
            .Where(e => e.IdAsset == IdAsset)
            .Include(e => e.Employee) // Include Employee details
            .Select(h => new
            {
                // drop id hardware
                h.IdAsset,
                h.NIPP,
                EmployeeName = h.Employee.Name,
                EmployeePosition = h.Employee.Position,
                EmployeeUnit = h.Employee.Unit
            })
            .ToListAsync();

        if (transHardware == null || !transHardware.Any())
        {
            return NotFound();
        }

        return Ok(transHardware);
    }

    // Post new hardware transaction
    [HttpPost]
    public async Task<ActionResult<TrnHardwareModel>> PostTrnHardware(TrnHardwareModel trnHardware)
    {
        _context.TrnHardwareM.Add(trnHardware);
        await _context.SaveChangesAsync();

        //change IdHardware to IdAsset
        return CreatedAtAction("GetTrnHardware", new { id = trnHardware.IdAsset }, trnHardware);
    }

    // Get all hardware
    [HttpGet("all")]
    public async Task<ActionResult<List<TrnHardwareModel>>> GetAllHardware()
    {
        var transHardware = await _context.TrnHardwareM.ToListAsync();
        if (transHardware == null || !transHardware.Any())
        {
            return NotFound("List is empty");
        }
        return Ok(transHardware);
    }
}