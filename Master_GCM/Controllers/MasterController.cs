using Microsoft.AspNetCore.Mvc;
using Microsoft.EntityFrameworkCore;

[ApiController]
[Route("api/[controller]")]

public class MasterController : ControllerBase
{
    private readonly AppDbContext _context;
    public MasterController(AppDbContext context){
        _context = context;
    }

//Get value from db
    [HttpGet]
    public async Task<ActionResult<IEnumerable<MASTERMODEL>>> GetMaster(){
    return await _context.MST_GCM.OrderBy(e => e.MASTERID).ToListAsync();
    }

    [HttpGet("{CONDITION}")]
    public async Task<ActionResult<List<MASTERMODEL>>> GetMasterByCondition(string CONDITION){
        var mstcondition = await _context.MST_GCM
            .Where(e =>  e.CONDITION == CONDITION) // Adjust condition based on your model
            .ToListAsync(); // Retrieve a list
        if (mstcondition == null){
            return NotFound();
        }

        return Ok(mstcondition);
    }

//Post master value to db
    [HttpPost("{CONDITION}")]
    public async Task<ActionResult<MASTERMODEL>> PostMaster(string CONDITION, MASTERMODEL master)
    {
       // Set the CONDITION field of the master model to the route parameter value
        master.CONDITION = CONDITION;
        master.ACTIVE = "Y";

        // Auto-increment MasterID by finding the maximum value for the same CONDITION
        var maxMstID = await _context.MST_GCM
            .MaxAsync(e => (int?)e.MASTERID) ?? 0;
        master.MASTERID = maxMstID + 1;

        // Check if the MasterID already exists
        if (await _context.MST_GCM.AnyAsync(e => e.MASTERID == master.MASTERID))
        {
            return Conflict("This MasterID already exists");
        }

        // Auto-increment NoSr by finding the maximum value for the same CONDITION
        var maxNoSr = await _context.MST_GCM
            .Where(e => e.CONDITION == master.CONDITION)
            .MaxAsync(e => (int?)e.NOSR) ?? 0;

        master.NOSR = maxNoSr + 1;
        
        // Check if a record with the same CONDITION and NoSr already exists
        if (await _context.MST_GCM.AnyAsync(e => e.CONDITION == master.CONDITION && e.NOSR == master.NOSR))
        {
            return Conflict("This NoSr already exists");
        }

        // Add the new record to the database
        _context.MST_GCM.Add(master);
        await _context.SaveChangesAsync();

        // Return the created response with a link to the new resource
        return CreatedAtAction("GetMaster", new { id = master.MASTERID }, master);
    }


//Update value master to db    
    [HttpPut("{MASTERID:int}")]
    public async Task<IActionResult> PutMaster(int MASTERID, MASTERMODEL master){
        if (MASTERID != master.MASTERID){
            return BadRequest();
        }

        //Track the selected data
        _context.Entry(master).State = EntityState.Modified;

        try{
            await _context.SaveChangesAsync();
        }
        catch (DbUpdateConcurrencyException){
            if (!MasterExists(MASTERID)){
                return NotFound();
            }
            else{throw;}
        }

        return NoContent();
    } 

    private bool MasterExists(int masterID){
        return _context.MST_GCM.Any(e => e.MASTERID == masterID);
    }
}