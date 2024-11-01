using Microsoft.AspNetCore.Http.HttpResults;
using Microsoft.AspNetCore.Mvc;
using Microsoft.EntityFrameworkCore;

[ApiController]
[Route("api/[controller]")]

public class TrnSoftwareController : ControllerBase{
    private readonly AppDbContext _context;
    public TrnSoftwareController(AppDbContext context){
        _context = context;
    }

    [HttpGet("{ASSETCODE}")]
    public async Task<ActionResult<List<TRNSOFTWAREMODEL>>> GetTrnSoftware(string ASSETCODE){
        var trnSoftware = await _context.TRN_DTL_SOFTWARE.Where(e => e.ASSETCODE == ASSETCODE).ToListAsync();

        if (trnSoftware == null){
            return Ok("No Software Data Available");
        }

        return Ok(trnSoftware);
    }

    [HttpPost]
    public async Task<ActionResult<TRNSOFTWAREMODEL>> PostTrnSoftware(TRNSOFTWAREMODEL trnSoftware){
        //Auto increment MaxIdAsset 
        var maxIDSoftware = await _context.TRN_DTL_SOFTWARE
            .MaxAsync(e => (int?)e.IDASSETSOFTWARE) ?? 0;
        trnSoftware.IDASSETSOFTWARE = maxIDSoftware + 1;


        trnSoftware.ACTIVE = "y";
        trnSoftware.DATEADDED = DateOnly.FromDateTime(DateTime.Now);
        trnSoftware.DATEUPDATED = null;
        trnSoftware.PICUPDATED = null;
        trnSoftware.TRNASSET = null;

        _context.TRN_DTL_SOFTWARE.Add(trnSoftware);
        await _context.SaveChangesAsync();

        return CreatedAtAction("GetTrnSoftware", new { assetcode = trnSoftware.ASSETCODE }, trnSoftware);
    }

    [HttpPut("{IDASSETSOFTWARE:int}")]
    public async Task<ActionResult<TRNSOFTWAREMODEL>> PutTrnSoftware(int IDASSETSOFTWARE, TRNSOFTWAREMODEL trnSoftware){

        if(IDASSETSOFTWARE != trnSoftware.IDASSETSOFTWARE){
            return BadRequest();
        }

        _context.Entry(trnSoftware).State = EntityState.Modified;

        try
        {
            await _context.SaveChangesAsync();

        }
        catch (DbUpdateConcurrencyException)
        {
             if (!SoftwarerExists(IDASSETSOFTWARE)){
                return Ok();
            }
            else{throw;}
        }
        return NoContent();
    }
    private bool SoftwarerExists(int idAssetSoftware){
        return _context.TRN_DTL_SOFTWARE.Any(e => e.IDASSETSOFTWARE == idAssetSoftware);

    }
}       