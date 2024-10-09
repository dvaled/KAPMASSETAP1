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
        var user = await _context.MST_USER.FirstOrDefaultAsync(u => u.NIPP == nipp && u.PASSWORD == password);
        if (user == null){
            return Unauthorized("Invalid NIPP or Password");
        }

        return Ok(new { message = $"Welcome, {user.NAME}"});
        }

    //  private string GexnerateToken(USERMODEL usr){
    //     // Generate a JWT token with the user's details
    //     string secret = "KAIPropertiManajer123";
    //     var handler = new JwtSecurityTokenHandler();
    //     var key = Encoding.ASCII.GetBytes(secret);

    //     var descriptor = new SecurityTokenDescriptor{
    //         Subject = new ClaimsIdentity(new[]{
    //             new Claim("nipp", usr.NIPP)
    //         }),
    //         Expires = DateTime.UtcNow.AddHours(1), // Set token expiration (optional)
    //         SigningCredentials = new SigningCredentials(new SymmetricSecurityKey(key), SecurityAlgorithms.HmacSha256Signature)
    //     };

    //     var token = handler.CreateToken(descriptor);
    //     return handler.WriteToken(token);
    // }
    
}