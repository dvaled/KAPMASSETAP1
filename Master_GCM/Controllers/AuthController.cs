using Microsoft.AspNetCore.Mvc;
using Microsoft.EntityFrameworkCore;

[Route("api/[auth]")]

public class AuthController(AppDbContext context) : ControllerBase{

        private readonly AppDbContext _context = context;

    [HttpPost("register")]
    public async Task<ActionResult<UserModel>> RegisterUser(UserModel user){
        // Validate the user
        if (_context.Users.Any(u => u.NIPP == user.NIPP)){
            return BadRequest("User with this NIPP already exists");
        }
        _context.Users.Add(user);
        await _context.SaveChangesAsync(); // Save the changes
        return Ok("User Registered Successfully");
    }
    
    [HttpPost("login")]
    public async Task<ActionResult<UserModel>> LoginUser(string nipp, string password){

    // Find the user by NIPP and password in the database
    var user = await _context.Users.FirstOrDefaultAsync(u => u.NIPP == nipp && u.Password == password);
    if (user == null){
        return Unauthorized("Invalid NIPP or Name");    
    }
    
    return Ok($"Welcome, {user.Name}");
    }
}