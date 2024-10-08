using System.ComponentModel.DataAnnotations.Schema;
public class LOGMODEL{
    public int LOGID { get; set; }
    public required string IDASSET { get; set; }
    public int ROLEID { get; set; }
    public required string ACTIONPERFORMED { get; set; }
    public required string USERADDED { get; set; }
    public DateOnly DATEADDED { get; set; }  

    [ForeignKey("IDASSET")]
    public required TRNASSETMODEL TRNASSET { get; set; }
}