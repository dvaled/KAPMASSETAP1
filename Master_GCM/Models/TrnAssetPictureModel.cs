using System.ComponentModel.DataAnnotations.Schema;

public class TRNASSETPICTUREMODEL{
    public int IDASSETPIC { get; set; }
    public required string ASSETCODE { get; set; }
    public required string ASSETPIC { get; set; }
    public required string ACTIVE { get; set; }
    public required string PICADDED { get; set; }
    public DateOnly DATEADDED { get; set; }
    public string? PICUPDATED { get; set; }
    public DateOnly? DATEUPDATED { get; set; }
    [NotMapped]  // This ensures that the image data is not mapped directly to the database
    public IFormFile? ASSETIMG { get; set; }  // To handle image uploads from the form

    [ForeignKey("ASSETCODE")]
    public TRNASSETMODEL? TRNASSET { get; set; }
}
