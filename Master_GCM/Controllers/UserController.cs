using Microsoft.AspNetCore.Mvc;
using Microsoft.EntityFrameworkCore;

[ApiController]
[Route("api/[controller]")]
public class UserController : ControllerBase
{
    private readonly AppDbContext _context;
    public UserController(AppDbContext context){
        _context = context;
    }

    [HttpGet]
    public async Task<ActionResult<List<USERMODEL>>> GetUser(){
        return await _context.MST_USER.ToListAsync();
    }

    [HttpGet("{active}")]
    public async Task<ActionResult<List<USERMODEL>>> GetUserStatus(string active){
        var user = await _context.MST_USER.Where(e => e.ACTIVE == active).ToListAsync();

        if (user == null){
            return NotFound();
        }
        return user;
    }

    [HttpPut("{NIPP}")]
    public async Task<ActionResult<USERMODEL>> PutUser(string nipp, USERMODEL user){
        if (nipp != user.NIPP)
        {
            return BadRequest();
        }

        _context.Entry(user).State = EntityState.Modified;

        try{
            await _context.SaveChangesAsync();
        }
        catch (DbUpdateConcurrencyException)
        {
            if (!UserExists(nipp))
            {
                return Ok();
            }
            else
            {
                throw;
            }
        }

        return NoContent();
    }

    private bool UserExists(string nipp)
    {
        return _context.MST_USER.Any(e => e.NIPP == nipp);
    }
}