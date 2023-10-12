/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./vue/*.{html,js,php}",
    "./*{html,js,php}",
  ],
  theme: {
    extend: {
      colors: {
        'text': '#050316',
        'background': '#fbfbfe',
        'primary': '#9e1f1f',
        'secondary': '#a8a3a3',
        'accent': '#bd7575',
      },
      padding:{
        p7_5 : [30],
      },
      fontFamily:{
        NotoSans: ['Noto Sans SC', 'sans-serif'],
        Roboto: ['Roboto', 'sans-serif;']
      },       
    },
  },
  plugins: [],
}
