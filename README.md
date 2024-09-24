# Project Resources and Styling

## Accessing Project Resources

### Importing Icons and Logos

To include icons and logos in your project, you can access the Remix Icon library by adding the following code to your HTML header:
html
<link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet"/>

### Importing Fonts
Using the "Poppins" Font
To load the "Poppins" font for your project, include the following CSS code at the top of your CSS file:
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap");
Save to grepper
We use the "Poppins" font to ensure a modern and clean typography style in our project.

### Viewing the Color Palette
Custom Color Variables
In this project, we've defined custom color variables for consistent and efficient styling. Here are the color variables used in this project:
:root {
  --text-dark: #020617;
  --text-light: #64748b;
  --extra-light: #f1f5f9;
  --white: #ffffff;
  --max-width: 1200px;
}

Copy and paste it into your css files like mine
