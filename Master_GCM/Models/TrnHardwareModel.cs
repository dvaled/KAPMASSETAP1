using System.ComponentModel.DataAnnotations.Schema;

public class TrnHardwareModel{
    public int IdAsset { get; set; }
    public int NIPP {get; set;}
    public required string ProcessorBrand{ get; set; }
    public required string ProcessorModel { get; set; }
    public required string ProcessorSeries{get; set;}
    public required string MemoryType{get; set;}
    public required string MemoryBrand{get; set;}
    public required string MemoryModel{get; set;}
    public required string MemorySeries{get; set;}
    public required string MemoryCapacity{get; set;}
    public required string StorageType{get; set;}
    public required string StorageBrand{get; set;}
    public required string StorageModel{get; set;}
    public required string StorageCapacity{get; set;}
    public required string GraphicsType{get; set;}
    public required string GraphicsBrand{get; set;}
    public required string GraphicsModel{get; set;}
    public required string GraphicsSeries{get; set;}
    public required string GraphicsCapacity{get; set;}
    public required string ScreenResolution{get; set;}
    public required bool Touchscreen {get; set;}
    public required bool BacklightKeyboard{get; set;}
    public required bool Convertible{get; set;}
    public required bool Webcamera {get; set;}
    public required bool Speaker {get; set;}
    public required bool Microphone {get; set;}
    public required bool Wifi {get; set;}
    public required bool Bluetooth {get; set;}

    // Navigation property
    [ForeignKey("NIPP")]
    public required EmployeeModel Employee { get; set; } 
}