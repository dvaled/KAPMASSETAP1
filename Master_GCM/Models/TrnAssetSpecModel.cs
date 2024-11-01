using System.ComponentModel.DataAnnotations.Schema;

public class TRNASSETSPECMODEL{
    public int IDASSETSPEC { get; set; }
    public required string ASSETCODE { get; set; }
    public string? PROCESSORBRAND { get; set; }
    public string? PROCESSORMODEL { get; set; }
    public string? PROCESSORSERIES { get; set; }
    public string? MEMORYTYPE { get; set; }
    public string? MEMORYBRAND { get; set; }
    public string? MEMORYMODEL { get; set; }
    public string? MEMORYSERIES { get; set; }
    public string? MEMORYCAPACITY { get; set; }
    public string? STORAGETYPE { get; set; }
    public string? STORAGEBRAND { get; set; }
    public string? STORAGEMODEL { get; set; }
    public string? STORAGECAPACITY { get; set; }
    public string? GRAPHICSTYPE1 { get; set; }
    public string? GRAPHICSBRAND1 { get; set; }
    public string? GRAPHICSMODEL1 { get; set; }
    public string? GRAPHICSSERIES1 { get; set; }
    public string? GRAPHICSCAPACITY1 { get; set; }
    public string? GRAPHICSTYPE2 { get; set; }
    public string? GRAPHICSBRAND2 { get; set; }
    public string? GRAPHICSMODEL2 { get; set; }
    public string? GRAPHICSSERIES2 { get; set; }
    public string? GRAPHICSCAPACITY2 { get; set; }
    public string? SCREENRESOLUTION { get; set; }
    public bool? TOUCHSCREEN { get; set; }
    public bool? BACKLIGHTKEYBOARD { get; set; }
    public bool? CONVERTIBLE { get; set; }
    public bool? WEBCAMERA { get; set; }
    public bool? SPEAKER { get; set; }
    public bool? MICROPHONE { get; set; }
    public bool? WIFI { get; set; }
    public bool? BLUETOOTH { get; set; }
    public required string PICADDED { get; set; }
    public string? PICUPDATED { get; set; }
    public DateOnly DATEADDED { get; set; }
    public DateOnly? DATEUPDATED { get; set; }
    
    [ForeignKey("ASSETCODE")]
    public TRNASSETMODEL? TRNASSET { get; set; }
}


