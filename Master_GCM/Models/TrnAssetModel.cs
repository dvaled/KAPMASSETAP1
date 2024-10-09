using System.ComponentModel.DataAnnotations.Schema;

public class TRNASSETMODEL{
    public required string IDASSET { get; set; }
    public int? NIPP {get; set;}
    public required string ASSETBRAND {get; set;}
    public required string ASSETMODEL {get; set;}
    public required string ASSETSERIES {get; set;}
    public required string ASSETSERIALNUMBER {get; set;}
    public required string ACTIVE {get; set;}
    
    [ForeignKey("NIPP")]
    public required MSTEMPLOYEEMODEL EMPLOYEE { get; set; } 
}