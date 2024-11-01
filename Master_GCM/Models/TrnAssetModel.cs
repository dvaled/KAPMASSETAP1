using System.ComponentModel.DataAnnotations;
using System.ComponentModel.DataAnnotations.Schema;
using System.Text.Json.Serialization;
using DateOnlyTimeOnly.AspNet.Converters;

public class TRNASSETMODEL{
    [Key]
    public int IDASSET { get; set; }
    public required string ASSETCODE { get; set; }
    public int? NIPP {get; set;}
    public required string ASSETTYPE {get; set;}
    public required string ASSETCATEGORY {get; set;}
    public required string ASSETBRAND {get; set;}
    public string? ASSETMODEL {get; set;}
    public string? ASSETSERIES {get; set;}
    public string? ASSETSERIALNUMBER {get; set;}
    public required string CONDITION {get; set;}
    public required string PICADDED {get; set;}
    [JsonConverter(typeof(DateOnlyJsonConverter))]
    public DateOnly ADDEDDATE {get; set;}
    public string? PICUPDATED {get; set;}
    [JsonConverter(typeof(DateOnlyJsonConverter))]
    public DateOnly? DATEUPDATED {get; set;}
    public required string ACTIVE {get; set;}
    
    [ForeignKey("NIPP")]
    public MSTEMPLOYEEMODEL? EMPLOYEE { get; set; } 
}