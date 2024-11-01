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
        if (trngetmaintenancebyac == null)
        {
            return Ok("No Maintenance Data Available");
        }

        return Ok(trngetmaintenancebyac);
    }

    // Post value to db
    [HttpPost]
    public async Task<ActionResult<TRNMAINTENANCEMODEL>> PostMaintenanceData(TRNMAINTENANCEMODEL maintenance){
        _context.TRN_HIST_MAINTENANCE.Add(maintenance);
        await _context.SaveChangesAsync();

        return CreatedAtAction("GetMaintenanceData", new { id = maintenance.MAINTENANCEID }, maintenance);
    }
}