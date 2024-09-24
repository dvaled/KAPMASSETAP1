public class User
{
    public int NIPPM { get; set; }
    public required string Role { get; set; }
    public required string Name { get; set; }
    public required string Position { get; set; }
    public required string Unit { get; set; }
    public required string Department { get; set; }
    public required string Directorate { get; set; }
    public required string Active { get; set; }
    public required string Password { get; set; }
    public required string Added_by { get; set; }
    public DateOnly Date_added { get; set; }
    public required string Updated_by { get; set; }
    public DateOnly Date_updated { get; set; }
}