public class LogModel{
    public int LogID{ get; set; }
    public int AssetID { get; set; }
    public int RoleID { get; set; }
    public required string ActionPerformed { get; set; }
    public required string UserAdded { get; set; }
    public DateTime DateAdded { get; set; }
    
}