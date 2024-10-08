using Microsoft.EntityFrameworkCore;

public class AppDbContext : DbContext
{
    public AppDbContext(DbContextOptions<AppDbContext> options) : base(options) { }

    public DbSet<MASTERMODEL> MST_GCM { get; set; }
    public DbSet<LOGMODEL> TRN_LOG { get; set; }
    public DbSet<USERMODEL> MST_USER {get; set;}
    public DbSet<MSTEMPLOYEEMODEL> MST_EMPLOYEE {get; set;}
    public DbSet<TRNSOFTWAREMODEL> TRN_DTL_SOFTWARE {get; set;}
    public DbSet<TRNASSETMODEL> TRN_ASSET {get; set;}
    public DbSet<TRNASSETSPECMODEL> TRN_DTL_SPEC {get; set;}
    public DbSet<TRNMAINTENANCEMODEL> TRN_HIST_MAINTENANCE{get; set;}
    public DbSet<TRNASSETHISTORYMODEL> TRN_HIST_ASSET {get; set;}
    public DbSet<TRNASSETPICTUREMODEL> TRN_DTL_PICTURE {get; set;}


    protected override void OnModelCreating(ModelBuilder modelBuilder)
    {
        modelBuilder.Entity<MASTERMODEL>().HasKey(e => e.MASTERID);
        modelBuilder.Entity<LOGMODEL>().HasKey(e => e.LOGID);
        modelBuilder.Entity<USERMODEL>().HasKey(e => e.NIPP);
        modelBuilder.Entity<MSTEMPLOYEEMODEL>().HasKey(e => e.NIPP);
        modelBuilder.Entity<TRNSOFTWAREMODEL>().HasKey(e => new {e.IDASSETSOFTWARE, e.IDASSET});
        modelBuilder.Entity<TRNASSETSPECMODEL>().HasKey(e => new {e.IDASSETSPEC, e.IDASSET});
        modelBuilder.Entity<TRNASSETMODEL>().HasKey(e => e.IDASSET);
        modelBuilder.Entity<TRNMAINTENANCEMODEL>().HasKey(e => new {e.MAINTENANCEID, e.IDASSET});
        modelBuilder.Entity<TRNASSETHISTORYMODEL>().HasKey(e => new {e.IDASSETHISTORY, e.IDASSET});
        modelBuilder.Entity<TRNASSETPICTUREMODEL>().HasKey(e => new {e.IDASSETPIC, e.IDASSET});
        modelBuilder.Entity<TRNASSETMODEL>()
            .HasOne(h => h.EMPLOYEE) // Navigation property
            .WithMany()
            .HasForeignKey(h => h.NIPP); // Foreign key relationship
        modelBuilder.Entity<TRNASSETHISTORYMODEL>()
            .HasOne(h => h.EMPLOYEE) // Navigation property
            .WithMany()
            .HasForeignKey(h => h.NIPP); // Foreign key relationship
        modelBuilder.Entity<LOGMODEL>()
            .HasOne(h => h.TRNASSET) // Navigation property
            .WithOne()
            .HasForeignKey<LOGMODEL>(h => h.IDASSET); // Foreign key relationship
    }
}