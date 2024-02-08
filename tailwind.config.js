// import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
const defaultTheme = require('tailwindcss/defaultTheme');
const treeView = require("daisyui");
/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                // sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                sans: ['Inter var', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                "primary":"#0092E4",
                "secondary":"#183656"
            },
        },
    },

    plugins: [forms, treeView],
};
