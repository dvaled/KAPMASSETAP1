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
    public async Task<ActionResult<IEnumerable<MasterModel>>> GetMaster(){
    return await _context.Masters.ToListAsync();
    }

    [HttpGet("{active}")]
    public async Task<ActionResult<List<MasterModel>>> GetMaster(string active){
        var masters = await _context.Masters
                                    .Where(e =>  e.Active == active) // Adjust condition based on your model
                                    .ToListAsync(); // Retrieve a list
        if (masters == null || !masters.Any()){
            return NotFound();
        }

        return masters;
    }

//Post master value to db
    [HttpPost]
    public async Task<ActionResult<MasterModel>> PostMaster(MasterModel master){

        //Check if value is exist
        if (await _context.Masters.AnyAsync(e => e.MasterID == master.MasterID)){
            return Conflict("This MasterID already exists");
        }

        else if (await _context.Masters.AnyAsync(e => e.Condition == master.Condition && e.NoSr == master.NoSr)){
        return Conflict("This NoSr already exists");
        }

        _context.Masters.Add(master);
        await _context.SaveChangesAsync();

        return CreatedAtAction("GetMaster", new { id = master.MasterID }, master);
    }

//Update value master to db    
    [HttpPut("{masterID:int}")]
    public async Task<IActionResult> PutMaster(int masterID, MasterModel master){
        if (masterID != master.MasterID){
            return BadRequest();
        }

        //Track the selected data
        _context.Entry(master).State = EntityState.Modified;

        try{
            await _context.SaveChangesAsync();
        }
        catch (DbUpdateConcurrencyException){
            if (!MasterExists(masterID)){
                return NotFound();
            }
            else{throw;}
        }

        return NoContent();
    }

    private bool MasterExists(int masterID){
        return _context.Masters.Any(e => e.MasterID == masterID);
    }
}