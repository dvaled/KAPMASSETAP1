using Microsoft.AspNetCore.Mvc;
using Microsoft.EntityFrameworkCore;

[ApiController]
[Route("api/[controller]")]
public class LogController : ControllerBase{
    private readonly AppDbContext _context;
    public LogController(AppDbContext context){
        _context = context;
    }
    
    [HttpGet]
    public async Task<ActionResult<IEnumerable<LOGMODEL>>> GetLog(){
        return await _context.TRN_LOG.ToListAsync();
    }
    [HttpPost]
    [HttpPost] 
    public async Task<ActionResult<LOGMODEL>> PostLog(LOGMODEL log){
        _context.TRN_LOG.Add(log);
        await _context.SaveChangesAsync();
        return CreatedAtAction("PostL   og", new { id = log.LogID }, log);
    }
}
