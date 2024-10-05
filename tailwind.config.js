/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors:{
        main : '#B13437',
        main_bg : '#FDEAEA',
        light_main : '#FDEAEA',
        success : '#21725E', 
        success_bg : '#E7FAF5',
        dark : '#323232',
        text_secondary : '#5D5D5D',
        secondary : '#F7F7F7'
      },
      backgroundImage:{
        'login-image': "url('../resources/assets/images/image-hero.png')",
    }
    },
  },
  plugins: [],
}

