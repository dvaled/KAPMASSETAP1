using System.ComponentModel.DataAnnotations.Schema;
public class LOGMODEL{
    public int LOGID { get; set; }
    public string? ASSETCODE { get; set; }
    public required string ROLE { get; set; }
    public required string ACTIONPERFORMED { get; set; }
    public required string USERADDED { get; set; }
    public DateOnly DATEADDED { get; set; }  

    [ForeignKey("ASSETCODE")]
    public TRNASSETMODEL? TRNASSET { get; set; }
}