/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
  ],
  theme: {
    extend: {
      colors: {
        turmexa: {
          dark: '#1A1A1A',
          gold: '#E28743',
          amber: '#F2A65A',
          light: '#F9F7F2',
        }
      }
    },
  },
  plugins: [],
}