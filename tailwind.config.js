/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
  ],
  darkMode: 'class',
  theme: {
    extend: {
      keyframes: {
        'slide-in-up': {
            '0%': {
                visibility: 'visible',
                transform: 'translate3d(0, 100%, 0)',
            },
            '100%': {
                transform: 'translate3d(0, 0, 0)',
            },
        },
      },
      animation: {
          'slide-in-up': 'slide-in-up 1s ease-out forwards',
      },
      backgroundImage: {
        'custom-bg': "url('/resources/assets/hello world.png')", // adjust the path to match your image location
      },
      fontFamily: {
        absans: ['Absans', 'sans-serif'],
        geist: ['Geist', 'sans-serif'],
        hkgrotesk: ['HKGrotesk', 'sans-serif'],
        nohemi: ['Nohemi', 'sans-serif'],
      },
      fontWeight: {
        // absans
        'absans-regular': 400,

        // Geist
        'geist-black': 900,
        'geist-ultraBlack': 800,
        'geist-bold': 700,
        'geist-semibold': 600,
        'geist-medium': 500,
        'geist-regular': 400,
        'geist-light': 300,
        'geist-thin': 200,
        'geist-ultralight': 100,

        // HKGrotesk
        'hkgrotesk-black': 900,
        'hkgrotesk-black-italic': 900,
        'hkgrotesk-bold': 700,
        'hkgrotesk-bold-italic': 700,
        'hkgrotesk-light': 300,
        'hkgrotesk-light-italic': 300,
        'hkgrotesk-medium': 500,
        'hkgrotesk-medium-italic': 500,
        'hkgrotesk-semibold': 600,
        'hkgrotesk-semibold-italic': 600,
        'hkgrotesk-extraBold': 800,
        'hkgrotesk-extraBold-italic': 800,
        'hkgrotesk-extraLight': 100,
        'hkgrotesk-extraLight-italic': 100,
        'hkgrotesk-regular': 400,
        'hkgrotesk-italic': 400,

        // Nohemi
        'nohemi-black': 900,
        'nohemi-bold': 700,
        'nohemi-light': 300,
        'nohemi-medium': 500,
        'nohemi-regular': 400,
        'nohemi-thin': 200,
        'nohemi-semibold': 600,
        'nohemi-extraBold': 800,
        'nohemi-extraLight': 100,
      },
    },
  },
  plugins: [],
}

