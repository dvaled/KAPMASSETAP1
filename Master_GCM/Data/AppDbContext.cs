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
        modelBuilder.Entity<TRNASSETMODEL>().HasKey(e => e.IDASSET);
        modelBuilder.Entity<TRNASSETMODEL>().HasAlternateKey(e => e.ASSETCODE);
        modelBuilder.Entity<TRNSOFTWAREMODEL>().HasKey(e => e.IDASSETSOFTWARE);
        modelBuilder.Entity<TRNASSETSPECMODEL>().HasKey(e => e.IDASSETSPEC);
        modelBuilder.Entity<TRNMAINTENANCEMODEL>().HasKey(e => e.MAINTENANCEID);
        modelBuilder.Entity<TRNASSETHISTORYMODEL>().HasKey(e => e.IDASSETHISTORY);
        modelBuilder.Entity<TRNASSETPICTUREMODEL>().HasKey(e =>  e.IDASSETPIC);
        modelBuilder.Entity<TRNASSETMODEL>()
            .HasOne(h => h.EMPLOYEE) // Navigation property
            .WithMany()
            .HasForeignKey(h => h.NIPP) // Foreign key relationship
            .IsRequired(false);
        modelBuilder.Entity<TRNASSETHISTORYMODEL>()
            .HasOne(h => h.EMPLOYEE) // Navigation property
            .WithMany()
            .HasForeignKey(h => h.NIPP) // Foreign key relationship
            .IsRequired(false);
        modelBuilder.Entity<LOGMODEL>()
            .HasOne(h => h.TRNASSET) // Navigation property
            .WithMany()
            .HasForeignKey(h => h.ASSETCODE) // Foreign key relationship
            .HasPrincipalKey(a => a.ASSETCODE); // Link to the alternate key
        modelBuilder.Entity<TRNMAINTENANCEMODEL>()
            .HasOne(h => h.TRNASSET) // Navigation property
            .WithMany()
            .HasForeignKey(h => h.ASSETCODE) // Foreign key relationship
            .HasPrincipalKey(a => a.ASSETCODE); // Link to the alternate key
        modelBuilder.Entity<TRNASSETPICTUREMODEL>()
            .HasOne(h => h.TRNASSET) // Navigation property
            .WithMany()
            .HasForeignKey(h => h.ASSETCODE) // Foreign key relationship
            .HasPrincipalKey(a => a.ASSETCODE); // Link to the alternate key
        modelBuilder.Entity<TRNASSETSPECMODEL>()
            .HasOne(h => h.TRNASSET) // Navigation property
            .WithOne()
            .HasForeignKey<TRNASSETSPECMODEL>(h => h.ASSETCODE) // Foreign key relationship
            .HasPrincipalKey<TRNASSETMODEL>(a => a.ASSETCODE); // Link to the alternate key
        modelBuilder.Entity<TRNSOFTWAREMODEL>()
            .HasOne(s => s.TRNASSET)
            .WithMany() // One-to-one relationship
            .HasForeignKey(s => s.ASSETCODE) // Use ASSETCODE as the foreign key
            .HasPrincipalKey(a => a.ASSETCODE); // Link to the alternate key
        modelBuilder.Entity<TRNASSETHISTORYMODEL>()
            .HasOne(h => h.TRNASSET) // Navigation property
            .WithMany()
            .HasForeignKey(h => h.ASSETCODE) // Foreign key relationship
            .HasPrincipalKey(a => a.ASSETCODE); // Link to the alternate key
    }
}