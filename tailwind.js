const plugin = require('tailwindcss/plugin')

module.exports = {
  content: [
      './*.php',
      './templates/**/*.php',
      './build/js/**/*.js',
  ],
  theme: {
      container: {
        padding: '1.5rem',
      },
      fontSize: {
        'xxs': '10px',
        'xs': '12px',
        'sm': '13px',
        'base': '15px',
        'lg': '1.1rem',
        'xl': '1.3rem',
        '2xl': '1.5rem',
        '3xl': '1.875rem',
        '4xl': '2.25rem',
        '5xl': '3rem',
        '6xl': '4rem',
        '7xl': '5rem',
      },
      extend: {
        colors: {
          primaryBg: '#F3F2F0',
          primary: {
            base: '#84a268',
            100: '#D3DEC5',
            200: '#C4D2B2',
            300: '#B5C79F',
            400: '#A6BC8C',
            600: '#809D5F',
            700: '#667D4B'
          },
          black: '#474945',
          brown: {
            100: '#EFEBE7',
            200: '#E8DFD5',
            300: '#D9CBBA',
            400: '#C3AC92',
            500: '#B19472',
            600: '#70593E',
            700: '#4B3B29',
            800: '#1E1811'
          }
        },
        fontSize: {
          xxs: '0.675rem',
        },
        fontFamily: {
          sans: ['poppins','system-ui', 'apple-system', 'Roboto', '"Noto Sans TC"', 'sans-serif'],
          serif: ['"Playfair Display"', '"Noto Serif TC"', 'serif'],
          mono: ['ui-monospace', 'SFMono-Regular', 'Menlo', 'Monaco', 'Consolas', '"Courier New"', 'monospace']
        },
        lineHeight: {
          tighter: '1.125',
        },
      }
  },
  variants: {
    textColor: ['responsive', 'hover', 'focus', 'visited'],
    customPlugin: ['responsive', 'hover', 'focus', 'visited'],
  },
  plugins: [
    plugin(function({ addComponents, theme }) { })
  ]
};
