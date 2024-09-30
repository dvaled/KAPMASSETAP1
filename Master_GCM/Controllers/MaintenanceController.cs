using Microsoft.AspNetCore.Mvc;
using Microsoft.EntityFrameworkCore;



[Route("api/[controller]")]

public class MaintenanceController : ControllerBase{
    private readonly AppDbContext _context;
    public MaintenanceController(AppDbContext context){
        _context = context;
    }
//Get value from db
    [HttpGet]
    public async Task<ActionResult<List<MaintenanceModel>>> GetMaintenanceData(){
        return await _context.MaintenanceModels.ToListAsync();
    }

    [HttpPost]
    public async Task<ActionResult<List<MaintenanceModel>>> PostMaintenance(MaintenanceModel model){

         //Check if value is exist
        if (await _context.MaintenanceModels.AnyAsync(e => e.MaintenanceID == model.MaintenanceID)){
            return Conflict("This Device is already in maintenance");
        }
        _context.MaintenanceModels.Add(model);
        await _context.SaveChangesAsync();
        return CreatedAtAction("Now is under Maintenance", new { id = model.MaintenanceID }, model); 
    }
}