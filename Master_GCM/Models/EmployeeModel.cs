using System.ComponentModel.DataAnnotations.Schema;
public class MSTEMPLOYEEMODEL{
    public int NIPP { get; set; }
    public required string NAME { get; set; }
    public required string POSITION { get; set; }
    public required string UNIT { get; set; }
    public required string DEPARTMENT { get; set; }
    public required string DIRECTORATE { get; set; }
    public required string ACTIVE { get; set; }
}