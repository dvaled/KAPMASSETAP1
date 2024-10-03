using System.ComponentModel.DataAnnotations.Schema;

public class TRNMAINTENANCEMODEL{
    public int MAINTENANCEID { get; set; }
    public int IDASSET { get; set; }
    public int PICADDED { get; set; }
    public required string NOTES { get; set; }
    public DateOnly DATEADDED { get; set; }

}