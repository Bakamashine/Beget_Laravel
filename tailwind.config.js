import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                GreatVibes: ['Great_Vibes', "sans-serif"]
            },
	colors: {
		black: '#121212',
		header_color: '#c2c2c2',
        admin_black: "#1e1e1e",
        admin_black_hover: "#0c0c0c",
        admin_svg_hover: "#33f078",
        admin_menu_btn: "#3858e9",
        admin_text_color: "#f8f8f8",
        admin_wallpaper: "#f6f7f7",
        admin_menu_btn2: "#7b90ff",
        admin_text_btn2: "#b0b0b0",
        admin_hover_btn: "#2145e6",
        wp_border: "#ccd0d4"
	},
		screens: {
                "mobile": "675px"
		}
        },
    },
    plugins: [
        function ({ addComponents }) {
            addComponents({
              '.no-spinners': {
                '&::-webkit-inner-spin-button, &::-webkit-outer-spin-button': {
                  '-webkit-appearance': 'none',
                  'margin': '0'
                }
              }
            });
        }
    ],
};
