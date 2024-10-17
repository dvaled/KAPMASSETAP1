using System.ComponentModel.DataAnnotations;
using System.ComponentModel.DataAnnotations.Schema;
public class MASTERMODEL{
    [Key]
    [DatabaseGenerated(DatabaseGeneratedOption.Identity)] // Auto-increment
    public int MASTERID { get; set; }
    public required string SBARCONDITION { get; set; }
    public required string CONDITION { get; set; }
    public required int NOSR { get; set; }
    public required string DESCRIPTION { get; set; }
    public required int VALUEGCM { get; set; }
    public required string TYPEGCM { get; set; }
    public required string ACTIVE { get; set; }
}