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

        if (trnSoftware == null || !trnSoftware.Any()){
            return NotFound();
        }

        return Ok(trnSoftware);
    }

    [HttpPost]
    public async Task<ActionResult<TRNSOFTWAREMODEL>> PostTrnSoftware(TRNSOFTWAREMODEL trnSoftware){
        _context.TRN_DTL_SOFTWARE.Add(trnSoftware);
        await _context.SaveChangesAsync();

        return CreatedAtAction("GetTrnSoftware", new { id = trnSoftware.IDASSETSOFTWARE }, trnSoftware);
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