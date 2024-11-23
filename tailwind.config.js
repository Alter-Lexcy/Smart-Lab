import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
        './resources/css/**/*.css',
    ],
    theme: {
        extend: {
            inset: {
                '18': '4.5rem',
              },
            keyframes: {
                tada: {
                    "0%": {
                        transform: "scale3d(1, 1, 1)",
                    },
                    "10%, 20%": {
                        transform: "scale3d(0.9, 0.9, 0.9) rotate3d(0, 0, 1, -3deg)",
                    },
                    "30%, 50%, 70%, 90%": {
                        transform: "scale3d(1.1, 1.1, 1.1) rotate3d(0, 0, 1, 3deg)",
                    },
                    "40%, 60%, 80%": {
                        transform: "scale3d(1.1, 1.1, 1.1) rotate3d(0, 0, 1, -3deg)",
                    },
                    "100%": {
                        transform: "scale3d(1, 1, 1)",
                    },
                },
                shake: {
                    "0%, 100%": {
                        transform: "translateX(0)",
                    },
                    "10%, 30%, 50%, 70%, 90%": {
                        transform: "translateX(-5px)",
                    },
                    "20%, 40%, 60%, 80%": {
                        transform: "translateX(5px)",
                    },
                },
                slideInUp: {
                    '0%': {
                        transform: 'translateY(100%)',
                        backgroundColor: 'gray',
                    },
                    '100%': {
                        transform: 'translateY(0)',
                        backgroundColor: 'transparent',
                    },
                },
                bounce: {
                    '0%, 20%, 50%, 80%, 100%': {
                        transform: 'translateY(0)',
                    },
                    '40%': {
                        transform: 'translateY(-30px)',
                    },
                    '60%': {
                        transform: 'translateY(-15px)',
                    },
                },
            },
            animation: {
                tada: 'tada 1s ease-in-out 0.25s 1',
                shake: 'shake 0.6s ease-in-out 0.25s 1',
                slideInUp: 'slideInUp 0.5s ease-out',
                bounce: 'bounce 1s infinite',
            },
            colors: {
                cornflowerblue: '#6495ED',
            },
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                poppins: ['Poppins', 'sans-serif'], // Tambahkan Poppins sebagai font kustom
            },
        },
    },
    plugins: [],
};
