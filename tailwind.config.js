/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./app/Filament/**/*.php",
        "./app/Livewire/**/*.php",
    ],
    theme: {
        extend: {
            maxWidth: {
                '7xl': '1400px',
            },
            colors: {
                primary: {
                    DEFAULT: '#02bbff',
                    dark: '#0099d6',
                    light: '#e0f8ff',
                },
                secondary: '#0099d6',
                neutral: {
                    light: '#F8FAFC',
                    dark: '#1E293B',
                },
                surface: {
                    DEFAULT: '#FFFFFF',
                    alt: '#F1F5F9',
                },
                border: '#E2E8F0',
            },
            fontFamily: {
                sans: ['Inter', 'ui-sans-serif', 'system-ui', 'sans-serif'],
                heading: ['Plus Jakarta Sans', 'Inter', 'ui-sans-serif', 'system-ui', 'sans-serif'],
            },
        },
    },
    plugins: [
        require('@tailwindcss/typography'),
        require('@tailwindcss/forms'),
    ],
}
