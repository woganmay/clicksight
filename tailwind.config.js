/** @type {import('tailwindcss').Config} */

const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors')
const plugin = require('tailwindcss/plugin')
export default {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue'
    ],
    theme: {
        extend: {}
    },
    plugins: [],
};
