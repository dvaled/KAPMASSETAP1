public class MaintenanceModel{
    public int MaintenanceID{ get; set; }
    public int AssetID { get; set; }
    public int User_Added { get; set; }
    public required string Notes { get; set; }
    public DateOnly Date_Added { get; set; }
}