using Microsoft.AspNetCore.Mvc;
using Microsoft.EntityFrameworkCore;



[Route("api/[controller]")]
public class TrnHistMaintenanceController : ControllerBase{
    private readonly AppDbContext _context;
    public TrnHistMaintenanceController(AppDbContext context){
        _context = context;
    }

    // Get value from db
    [HttpGet]
    public async Task<ActionResult<List<TRNMAINTENANCEMODEL>>> GetMaintenanceData(){
        return await _context.TRN_HIST_MAINTENANCE.ToListAsync();
    }

    // Get value by assetcode from db
    [HttpGet("{ASSETCODE}")]
    public async Task<ActionResult<List<TRNMAINTENANCEMODEL>>> GetMaintenanceDataByAssetCode(string ASSETCODE){
        var trngetmaintenancebyac = await _context.TRN_HIST_MAINTENANCE.Where(e => e.ASSETCODE == ASSETCODE).ToListAsync();
        if (trngetmaintenancebyac == null || !trngetmaintenancebyac.Any())
        {
            return NotFound("Maintenance not found");
        }

        return Ok(trngetmaintenancebyac);
    }

    // Post value to db
    [HttpPost]
    public async Task<ActionResult<List<TRNMAINTENANCEMODEL>>> PostMaintenance(TRNMAINTENANCEMODEL maintenance){

        // Check if value exists
        if (await _context.TRN_HIST_MAINTENANCE.AnyAsync(e => e.MAINTENANCEID == maintenance.MAINTENANCEID)){
            return Conflict("This Device is already in maintenance");
        }
        _context.TRN_HIST_MAINTENANCE.Add(maintenance);
        await _context.SaveChangesAsync();
        return CreatedAtAction("Now is under Maintenance", new { id = maintenance.MAINTENANCEID }, maintenance); 
    }
}