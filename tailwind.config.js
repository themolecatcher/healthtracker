/** @type {import('tailwindcss').Config} */
export default {
  content: ["./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",],
  theme: {
    extend: {
      fontFamily: {
        'gtwalsheim-bold': ['GT-Walsheim-Bold', 'sans-serif'],
        'gtwalsheim-regular': ['GT-Walsheim-Regular'],
      }
    },
  },
  plugins: [],
}

