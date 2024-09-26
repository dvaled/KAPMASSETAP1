using Microsoft.AspNetCore.Mvc;
using Microsoft.EntityFrameworkCore;


[ApiController]
[Route("api/[controller]")]

public class LogController : ControllerBase{
    private readonly AppDbContext _context;
    public LogController(AppDbContext context){
        _context = context;
    }
//Get value from db
    [HttpGet]
    public async Task<ActionResult<IEnumerable<LogModel>>> GetLog(){
        return await _context.Logs.ToListAsync();
    }

    public async Task<ActionResult<LogModel>> PostLog(LogModel log){
        _context.Logs.Add(log);
        await _context.SaveChangesAsync();
        return CreatedAtAction("GetTrnSoftware", new { id = log.LogID }, log);
    }
}