namespace Master_GCM.ViewModels  // Change 'YourNamespace' to your actual project namespace
{
    public class AssetViewModel
    {
        public string ASSETCODE { get; set; }    
        public string ACTIVE { get; set; }  // From user input
        public string PICADDED { get; set; }  // From user input (e.g., the name of the user adding the picture)
        public List<IFormFile> ASSETIMG { get; set; }  // Uploaded image(s)
    }
}
