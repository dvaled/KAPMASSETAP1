using System.ComponentModel.DataAnnotations.Schema;

public class TRNASSETPICTUREMODEL{
    public int IDASSETPIC { get; set; }
    public required string ASSETCODE { get; set; }
    public required string ASSETPIC { get; set; }
    public required string ACTIVE { get; set; }
    public required string PICADDED { get; set; }
    public DateOnly DATEADDED { get; set; }
    public string? PICUPDATED { get; set; }
    public DateOnly? DATEUPDATED { get; set; }
    
    [ForeignKey("ASSETCODE")]
    public TRNASSETMODEL? TRNASSET { get; set; }
}