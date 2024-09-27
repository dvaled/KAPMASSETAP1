using System.Security.Claims;
using System.Security.Cryptography;
using System.Text;
using Microsoft.AspNetCore.Mvc;
using Microsoft.EntityFrameworkCore;
using System.IdentityModel.Tokens.Jwt;
using Microsoft.IdentityModel.Tokens;

[ApiController]
[Route("api/[controller]")]

public class AuthController(AppDbContext context) : ControllerBase{

        private readonly AppDbContext _context = context;
    
    [HttpPost("login")]
    public async Task<ActionResult<string>> LoginUser(string nipp, string password){
        // Find the user by NIPP and password in the database
        var user = await _context.Users.FirstOrDefaultAsync(u => u.NIPP == nipp && u.Password == password);
        if (user == null){
            return Unauthorized("Invalid NIPP or Password");
        }

        // Generate and return the JWT token
        var token = GenerateToken(user);
        return Ok(new { message = $"Welcome, {user.Name}", token });
    }

     private string GenerateToken(UserModel usr)
    {
        // Generate a JWT token with the user's details
        string secret = "Kepinganteng123";
        var handler = new JwtSecurityTokenHandler();
        var key = Encoding.ASCII.GetBytes(secret);

        var descriptor = new SecurityTokenDescriptor
        {
            Subject = new ClaimsIdentity(new[]
            {
                new Claim("nipp", usr.NIPP)
            }),
            Expires = DateTime.UtcNow.AddHours(1), // Set token expiration (optional)
            SigningCredentials = new SigningCredentials(new SymmetricSecurityKey(key), SecurityAlgorithms.HmacSha256Signature)
        };

        var token = handler.CreateToken(descriptor);
        return handler.WriteToken(token);
    }

    // [HttpPost]
    // [ValidateAntiForgeryToken]
    // public async Task<IActionResult> Logout()
    // {
    //     await _signInManager.SignOutAsync();
    //     return RedirectToAction("Index", "Home");
    // }
}