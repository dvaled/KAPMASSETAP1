using System.ComponentModel.DataAnnotations.Schema;

public class USERMODEL{
    public required string NIPP { get; set; }
    public required string ROLE { get; set; }
    public required string USER_PICTURE { get; set; }
    public required string NAME { get; set; }
    public required string POSITION { get; set; }
    public required string UNIT { get; set; }
    public required string DEPARTMENT { get; set; }
    public required string DIRECTORATE { get; set; }
    public required string PASSWORD { get; set; }
    public required string ACTIVE { get; set; }
}