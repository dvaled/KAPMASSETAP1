using Microsoft.AspNetCore.Mvc;
using Microsoft.EntityFrameworkCore;


[ApiController]
[Route("api/[controller]")]

public class MasterController : ControllerBase
{
    private readonly AppDbContext _context;
    public MasterController(AppDbContext context)
    {
        _context = context;
    }

    [HttpGet]
    public async Task<ActionResult<IEnumerable<Master>>> GetMaster()
    {
    return await _context.Masters.ToListAsync();
    }

    [HttpGet("active/{active:bool}")] // Ensure the route is defined to accept bool
    public async Task<ActionResult<List<Master>>> GetMasterByStatus([FromQuery]bool active) 
    {
        var masters = await _context.Masters
            .Where(e => e.Active == active)
            .ToListAsync();

        if (masters.Count == 0) 
        {
            return NotFound();
        }

        return masters;
    }

    [HttpPost]
    public async Task<ActionResult<Master>> PostMaster(Master master)
    {
        if (await _context.Masters.AnyAsync(e => e.MasterID == master.MasterID))
        {
            return Conflict("This MasterID already exists");
        }

        else if (await _context.Masters.AnyAsync(e => e.Condition == master.Condition))
        {
            if (await _context.Masters.AnyAsync(e => e.NoSr == master.NoSr))
            {
                return Conflict("This Item ID already exists in this condition");
            }
        }
        _context.Masters.Add(master);
        await _context.SaveChangesAsync();

        return CreatedAtAction("GetMaster", new { id = master.MasterID }, master);
    }
    [HttpPut("{masterID:int}")]
    public async Task<IActionResult> PutMaster(int masterID, Master master)
    {
        if (masterID != master.MasterID)
        {
            return BadRequest();
        }

        _context.Entry(master).State = EntityState.Modified;

        try
        {
            await _context.SaveChangesAsync();
        }
        catch (DbUpdateConcurrencyException)
        {
            if (!MasterExists(masterID))
            {
                return NotFound();
            }
            else
            {
                throw;
            }
        }

        return NoContent();
    }

    private bool MasterExists(int masterID)
    {
        return _context.Masters.Any(e => e.MasterID == masterID);
    }
}