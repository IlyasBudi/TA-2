/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./resources/**/*.php",
    "./app/**/*.php",
  ],
  theme: {
    extend: {
      fontFamily: {
        'sans': ['Nunito', 'sans-serif'],
        'body': ['Open Sans', 'sans-serif'],
      },
      colors: {
        primary: {
          50: '#f0f4ff',
          100: '#e0e8ff',
          200: '#c7d2fe',
          300: '#a5b4fc',
          400: '#818cf8',
          500: '#4154f1',
          600: '#3730a3',
          700: '#312e81',
          800: '#1e1b4b',
          900: '#1e1a5c',
        },
      },
      boxShadow: {
        'auth': '0 15px 35px rgba(0, 0, 0, 0.1)',
        'button': '0 8px 25px rgba(65, 84, 241, 0.3)',
      },
      animation: {
        'float': 'float 3s ease-in-out infinite',
      },
      keyframes: {
        float: {
          '0%, 100%': { transform: 'translateY(0px)' },
          '50%': { transform: 'translateY(-10px)' },
        }
      }
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
  ],
}