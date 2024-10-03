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
    return await _context.MST_GCM.ToListAsync();
    }

    [HttpGet("{ACTIVE}")]
    public async Task<ActionResult<List<MASTERMODEL>>> GetMaster(string active){
        var masters = await _context.MST_GCM
                                    .Where(e =>  e.ACTIVE == active) // Adjust condition based on your model
                                    .ToListAsync(); // Retrieve a list
        if (masters == null || !masters.Any()){
            return NotFound();
        }

        return masters;
    }

//Post master value to db
    [HttpPost]
    public async Task<ActionResult<MASTERMODEL>> PostMaster(MASTERMODEL master){

        //Check if value is exist
        if (await _context.MST_GCM.AnyAsync(e => e.MASTERID == master.MASTERID)){
            return Conflict("This MasterID already exists");
        }

        else if (await _context.MST_GCM.AnyAsync(e => e.CONDITION == master.CONDITION && e.NOSR == master.NOSR)){
        return Conflict("This NoSr already exists");
        }

        _context.MST_GCM.Add(master);
        await _context.SaveChangesAsync();

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