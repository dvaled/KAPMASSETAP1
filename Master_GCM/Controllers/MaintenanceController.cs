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

    [HttpPost("{ASSETCODE}")]
    public async Task<ActionResult<TRNMAINTENANCEMODEL>> PostMaintenance(string ASSETCODE, [FromBody] TRNMAINTENANCEMODEL maintenance)
    {
        // Check if the asset code exists
        var asset = await _context.TRN_ASSET.FirstOrDefaultAsync(a => a.ASSETCODE == ASSETCODE);
        if (asset == null)
        {
            return NotFound("Asset not found");
        }

        // Assign the asset code to the maintenance record
        maintenance.ASSETCODE = ASSETCODE;

        // Check if the maintenance ID already exists
        if (await _context.TRN_HIST_MAINTENANCE.AnyAsync(e => e.MAINTENANCEID == maintenance.MAINTENANCEID))
        {
            return Conflict("This Device is already in maintenance");
        }
        
        // Add value to db
        _context.TRN_HIST_MAINTENANCE.Add(maintenance);
        await _context.SaveChangesAsync();

        // Return response
        return CreatedAtAction(nameof(GetMaintenanceDataByAssetCode), new { id = maintenance.MAINTENANCEID }, maintenance); 
    }

}