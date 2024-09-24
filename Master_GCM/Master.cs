public class Master{
    public int MasterID{ get; set; }
    public required string Condition { get; set; }
    public required int NoSr { get; set; }
    public required string Description { get; set; }
    public required int ValueGcm { get; set; }
    public required string TypeGcm { get; set; }
    public bool Active { get; set; }
}