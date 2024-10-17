using System.ComponentModel.DataAnnotations;
using System.ComponentModel.DataAnnotations.Schema;
 
public class TRNMAINTENANCEMODEL{
    [Key]
    [DatabaseGenerated(DatabaseGeneratedOption.Identity)] // Auto-increment
    public int MAINTENANCEID { get; set; }
    public string? ASSETCODE { get; set; }
    public required string PICADDED { get; set; }
    public required string NOTES { get; set; }
    public DateOnly DATEADDED { get; set; }

    [ForeignKey("ASSETCODE")]
    public required TRNASSETMODEL TRNASSET { get; set; }
}