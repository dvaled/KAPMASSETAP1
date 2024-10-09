using System.ComponentModel.DataAnnotations;
using System.ComponentModel.DataAnnotations.Schema;

public class TRNASSETMODEL{
    [Key]
    [DatabaseGenerated(DatabaseGeneratedOption.Identity)] // Auto-increment
    public int IDASSET { get; set; }
    public required string ASSETCODE { get; set; }
    public int? NIPP {get; set;}
    public required string ASSETTYPE {get; set;}
    public required string ASSETCATEGORY {get; set;}
    public required string ASSETBRAND {get; set;}
    public required string ASSETMODEL {get; set;}
    public required string ASSETSERIES {get; set;}
    public required string ASSETSERIALNUMBER {get; set;}
    public DateOnly ADDEDDATE {get; set;}
    public required string ACTIVE {get; set;}

    [ForeignKey("NIPP")]
    public required MSTEMPLOYEEMODEL EMPLOYEE { get; set; } 
}