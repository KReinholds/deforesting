import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import flowbite from 'flowbite/plugin';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
        './node_modules/flowbite/**/*.js',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Poppins', 'sans-serif'], // override default 'sans'
            },
            colors: {
                degray: '#354650',
                degraylight: '#D0CFD3',
                degreen: '#357952',
                degreenlight: '#09CC5C',
                dered: '#794135',
            },
        },
    },

    plugins: [forms, flowbite],
};
