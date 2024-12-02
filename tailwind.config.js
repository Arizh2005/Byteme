import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            colors: {
                transparent:'transparent',
                current:'currentColor',
                'darkblue' : '#052944',
                'iceblue' : '#88B4D6',
                'creamy' : '#FFF9E3'
            },
            fontFamily: {
                sans: ['Inter', 'Poppins', 'Jua', 'sans-serif'],
                inter: ['Inter', 'sans-serif'],
                jua: ['Jua', 'sans-serif'],
                poppins: ['Poppins, sans-serif'],
            },
        },
    },

    plugins: [forms],
};
