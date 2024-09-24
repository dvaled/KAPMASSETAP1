using Microsoft.AspNetCore.Mvc;
using Microsoft.EntityFrameworkCore;

[ApiController]
[Route("api/[controller]")]

public class EmployeeController : ControllerBase{
    private readonly AppDbContext _context;
    public EmployeeController(AppDbContext context){
        _context = context;
    }

    [HttpGet]
    public async Task<ActionResult<IEnumerable<EmployeeModel>>> GetEmployee(){
    return await _context.Employee.ToListAsync();
    }
}