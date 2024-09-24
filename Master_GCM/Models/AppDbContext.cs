using Microsoft.EntityFrameworkCore;
public class AppDbContext : DbContext
{
    public AppDbContext(DbContextOptions<AppDbContext> options) : base(options) { }

    public DbSet<MasterModel> Masters { get; set; }
    public DbSet<LogModel> Logs { get; set; }
    public DbSet<UserModel> Users {get; set;}
    public DbSet<EmployeeModel> Employee {get; set;}

    protected override void OnModelCreating(ModelBuilder modelBuilder)
    {
        modelBuilder.Entity<MasterModel>().HasKey(e => e.MasterID);
        modelBuilder.Entity<LogModel>().HasKey(e => e.LogID);
        modelBuilder.Entity<UserModel>().HasKey(e => e.NIPP);
        modelBuilder.Entity<EmployeeModel>().HasKey(e => e.NIPP);

    }
}