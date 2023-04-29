/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.jsx",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        'primary': "#4E2121", 
        'secondary': "#FFC0C0", 
      }, 
      fontFamily: {
        'primary': "'Baloo Bhai 2', cursive", 
      }, 
      boxShadow: {
        'nav': "rgba(0, 0, 0, 0.24) 0px 3px 8px", 
      }
    },
  },
  plugins: [],
}

