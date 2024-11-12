using System.ComponentModel.DataAnnotations.Schema;

public class TRNASSETHISTORYMODEL{
    public int IDASSETHISTORY { get; set; }
    public required string ASSETCODE { get; set; }
    public int NIPP { get; set; }
    public required string NAME { get; set; }
    public required string PICADDED { get; set; }
    public DateOnly DATEADDED { get; set; }

    [ForeignKey("ASSETCODE")]
    public TRNASSETMODEL? TRNASSET { get; set; }
}