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

    [HttpPost("{ASSETCODE}")]
    public async Task<ActionResult<TRNMAINTENANCEMODEL>> PostMaintenance(string ASSETCODE, TRNMAINTENANCEMODEL maintenance)
    {
        // Fetch the asset based on the provided asset code
        var asset = await _context.TRN_ASSET.FirstOrDefaultAsync(a => a.ASSETCODE == ASSETCODE);

        // If asset is not found, return a 404 error
        if (asset == null)
        {
            return Ok("Asset not found.");
        }

        // Set the foreign key relationship
        maintenance.ASSETCODE = asset.ASSETCODE;

        // Check if the maintenance ID already exists
        if (await _context.TRN_HIST_MAINTENANCE.AnyAsync(e => e.MAINTENANCEID == maintenance.MAINTENANCEID))
        {
            return Conflict("This Device is already in maintenance.");
        }

        // Add maintenance record
    // Post value to db
    [HttpPost]
    public async Task<ActionResult<TRNMAINTENANCEMODEL>> PostMaintenanceData(TRNMAINTENANCEMODEL maintenance){
        _context.TRN_HIST_MAINTENANCE.Add(maintenance);
        await _context.SaveChangesAsync();

        return CreatedAtAction(nameof(PostMaintenance), new { id = maintenance.MAINTENANCEID }, maintenance);

        return CreatedAtAction("GetMaintenanceData", new { id = maintenance.MAINTENANCEID }, maintenance);
    }


}