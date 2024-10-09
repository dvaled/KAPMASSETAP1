using System.ComponentModel.DataAnnotations.Schema;

public class TRNASSETHISTORYMODEL{
    public int IDASSETHISTORY { get; set; }
    public required string ASSETCODE { get; set; }
    public int NIPP { get; set; }
    public required string NAME { get; set; }
    public required string POSITION { get; set; }
    public required string UNIT { get; set; }
    public required string DEPARTMENT { get; set; }
    public required string DIRECTORATE { get; set; }
    public required string PICADDED { get; set; }
    public DateOnly DATEADDED { get; set; }
    public DateOnly DATEUPDATED { get; set; }

    [ForeignKey("NIPP")]
    public required MSTEMPLOYEEMODEL EMPLOYEE { get; set; }

    [ForeignKey("ASSETCODE")]
    public required TRNASSETMODEL TRNASSET { get; set; }
}