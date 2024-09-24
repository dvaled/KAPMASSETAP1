using Microsoft.AspNetCore.Mvc;
using Microsoft.EntityFrameworkCore;


// [ApiController]
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
}