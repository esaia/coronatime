/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            flex: {
                2: "2 2 0%",
            },
        },
        fontFamily: {
            inter: "Inter",
        },
    },
    plugins: [],
};
