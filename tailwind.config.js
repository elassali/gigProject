const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        

        // -------------------->
        './resources/views/**/*.blade.php',
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            spacing: {
                '17rem': '17rem',
              },
              inset: {
                '16%': '16%',
                '16%': '37%',
              },
              colors: {
                primary:'#07689F',
                secondary:'#A2D5F2',
                font:'#0F1528',
              },
              translate: {
                '-50': '-50%',
              },
              height: {
                '400px': '400px',
                '76' : '19rem',
                '84' : '21rem',
                '140' : '35rem',
                '80vh' : '80vh'
              },
              colors : {
                gray : {
                  400 : '#969798',
                  500 : '#666666',
                  700 : '#353535',
                  800 : '#262626',
                  900 : '#171818',
                }
              },
              visibility: ["group-hover"],
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
