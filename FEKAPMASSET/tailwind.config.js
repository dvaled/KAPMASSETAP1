/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
  ],
  theme: {
    extend: {
      fontFamily: {
        sans: ["Open Sans"],
        serif: ['SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace', "serif"],
        body: ["Roboto", "sans-serif"],
        awesome: ["FontAwesome"],
        "awesome-5-free": ["Font Awesome\\ 5 Free"],
      },
    },
  },
  plugins: [],
}

