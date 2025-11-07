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
                'inter': ['Inter', 'sans-serif'],
            },
            colors: {
                dark: {
                    primary: '#0a0a0a',
                  secondary: '#111827',
                   tertiary: '#1f2937',
                  accent: '#1e40af',
                },
                navy: {
                  50: '#f0f4ff',
                  100: '#e0e7ff',
                  200: '#c7d2fe',
                  300: '#a5b4fc',
                  400: '#818cf8',
                  500: '#6366f1',
                  600: '#4f46e5',
                  700: '#4338ca',
                  800: '#3730a3',
                  900: '#312e81',
                }
            },
            animation: {
                'float': 'float 6s ease-in-out infinite',
                'fade-up': 'fadeUp 0.8s ease-out forwards',
                'glow': 'glow 2s ease-in-out infinite alternate',
            },
            keyframes: {
                float: {
                    '0%, 100%': { transform: 'translateY(0px)' },
                    '50%': { transform: 'translateY(-20px)' },
                },
                fadeUp: {
                    'to': { 
                        opacity: '1',
                        transform: 'translateY(0)'
                    },
                },
                glow: {
                    'from': { boxShadow: '0 0 20px -10px #1e40af' },
                    'to': { boxShadow: '0 0 20px -5px #1e40af, 0 0 30px -10px #1e40af' },
                }
            },
            backdropBlur: {
                xs: '2px',
            }
        },
    },
    plugins: [
        require('@tailwindcss/forms'),
    ],
    darkMode: 'class',
};