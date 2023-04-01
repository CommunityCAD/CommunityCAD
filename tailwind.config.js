/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php'
    ],
    darkMode: 'class',
    theme: {
        extend: {},
    },
    plugins: [],
}
