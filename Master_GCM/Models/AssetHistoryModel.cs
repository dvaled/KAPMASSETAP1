public class AssetHistoryModel{
    public int IdAssetHistory { get; set; }
    public int IdAsset { get; set; }
    public int NIPP { get; set; }
    public required string Name { get; set; }
    public required string Position { get; set; }
    public required string Unit { get; set; }
    public required string Department { get; set; }
    public required string Directorate { get; set; }
    public required string PICAdded { get; set; }
    public DateOnly DateAdded { get; set; }
    public DateOnly DateUpdated { get; set; }
}