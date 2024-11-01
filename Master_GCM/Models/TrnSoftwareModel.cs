using System.ComponentModel.DataAnnotations.Schema;
using System.Text.Json.Serialization;

public class TRNSOFTWAREMODEL{
    public int IDASSETSOFTWARE { get; set; }
    public required string ASSETCODE { get; set; }
    public required string SOFTWARETYPE { get; set; }
    public required string SOFTWARECATEGORY { get; set; }
    public required string SOFTWARENAME { get; set; }
    public required string SOFTWARELICENSE { get; set; }
    public required string SOFTWAREPERIOD { get; set; }
    public required string ACTIVE { get; set; }
    public required string PICADDED { get; set; }
    public DateOnly DATEADDED { get; set; }
    public string? PICUPDATED { get; set; }
    public DateOnly? DATEUPDATED { get; set; }

    [ForeignKey("ASSETCODE")]
    public TRNASSETMODEL? TRNASSET { get; set; }
}