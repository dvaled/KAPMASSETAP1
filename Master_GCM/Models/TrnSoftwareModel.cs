public class TrnSoftwareModel{
    public int IdSoftware { get; set; }
    public int IdAsset { get; set; }
    public required string SoftwareType { get; set; }
    public required string SoftwareCategory { get; set; }
    public required string SoftwareName { get; set; }
    public required string SoftwareLicense { get; set; }
}