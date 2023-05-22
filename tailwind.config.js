/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./index.html",
        "./front-end/**/*.{vue,js,ts,jsx,tsx}",
    ],
    theme: {
        extend: {},
    },
    plugins: [
        require('flowbite/plugin')
    ],
}
