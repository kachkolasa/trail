/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
  ],
  theme: {
    extend: {
      colors: {
        'primary': "#15A800",
        "primary-dark": "#148f01",
      }
    },
  },
  plugins: [],
}

