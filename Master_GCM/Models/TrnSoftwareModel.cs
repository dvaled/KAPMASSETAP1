using System.ComponentModel.DataAnnotations.Schema;

public class TRNSOFTWAREMODEL{
    public int IDASSETSOFTWARE { get; set; }
    public required string IDASSET { get; set; }
    public required string SOFTWARETYPE { get; set; }
    public required string SOFTWARECATEGORY { get; set; }
    public required string SOFTWARENAME { get; set; }
    public required string SOFTWARELICENSE { get; set; }
    public required string ACTIVE { get; set; }
    public string? PICADDED { get; set; }
    public DateOnly DATEADDED { get; set; }
    public string? PICUPDATED { get; set; }
    public DateOnly DATEUPDATED { get; set; }

    [ForeignKey("IDASSET")]
    public required TRNASSETMODEL TRNASSET { get; set; }
}