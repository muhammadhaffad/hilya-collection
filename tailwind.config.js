module.exports = {
  darkMode: 'class',
  content: [
    "./resources/**/*.blade.php",
    "./resources/views/vendor/pagination/*.blade.php",
  ],
  theme: {
    container: {
      center: true,
      padding: '0px',
    },
    extend: {
      screens: {
        '2xl': '1320px'
      },
      fontFamily: {
        'poppins': 'Mulish',
        'inter': 'Inter'
      }
    },
  },
  plugins: [
    require('flowbite/plugin')
  ],
}
