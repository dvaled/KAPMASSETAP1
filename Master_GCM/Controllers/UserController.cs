using Microsoft.AspNetCore.Mvc;
using Microsoft.EntityFrameworkCore;

[ApiController]
[Route("api/[controller]")]

public class UserController : ControllerBase
{
    private readonly AppDbContext _context;
    public UserController(AppDbContext context)
    {
        _context = context;
    }

    [HttpGet]
    public async Task<ActionResult<IEnumerable<UserModel>>> GetUser(){
    return await _context.Users.ToListAsync();
    }

    [HttpGet("{active}")]
    public async Task<ActionResult<List<UserModel>>> GetUserStatus(string active)
    {
        var user = await _context.Users.Where(e => e.Active == active).ToListAsync();

        if (user == null)
        {
            return NotFound();
        }
        return user;
    }

    [HttpPut("{nipp}")]
    public async Task<ActionResult<UserModel>> PutUser(string nipp, UserModel user)
    {
        if (nipp != user.NIPP)
        {
            return BadRequest();
        }

        _context.Entry(user).State = EntityState.Modified;

        try
        {
            await _context.SaveChangesAsync();
        }
        catch (DbUpdateConcurrencyException)
        {
            if (!UserExists(nipp))
            {
                return NotFound();
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
        return _context.Users.Any(e => e.NIPP == nipp);
    }
    
}