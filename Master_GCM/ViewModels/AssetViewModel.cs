namespace Master_GCM.ViewModels  // Change 'YourNamespace' to your actual project namespace
{
    public class AssetViewModel
    {
        public required string ASSETCODE { get; set; }    
        public required string ACTIVE { get; set; }  // From user input
        public required string PICADDED { get; set; }  // From user input (e.g., the name of the user adding the picture)
        public required List<IFormFile> ASSETIMG { get; set; }  // Uploaded image(s)
    }
}
