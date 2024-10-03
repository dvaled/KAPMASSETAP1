using System.ComponentModel.DataAnnotations.Schema;

public class TRNASSETSPECMODEL{
    public int IDASSETSPEC { get; set; }
    public int IDASSET { get; set; }
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
    public string? GRAPHICSTYPE { get; set; }
    public string? GRAPHICSBRAND { get; set; }
    public string? GRAPHICSMODEL { get; set; }
    public string? GRAPHICSSERIES { get; set; }
    public string? GRAPHICSCAPACITY { get; set; }
    public string? SCREENRESOLUTION { get; set; }
    public bool? TOUCHSCREEN { get; set; }
    public bool? BACKLIGHTKEYBOARD { get; set; }
    public bool? CONVERTIBLE { get; set; }
    public bool? WEBCAMERA { get; set; }
    public bool? SPEAKER { get; set; }
    public bool? MICROPHONE { get; set; }
    public bool? WIFI { get; set; }
    public bool? BLUETOOTH { get; set; }

}


