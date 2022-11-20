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
        'xs': '.7rem',
        'sm': '.8rem',
        'base': '.95rem',
        'lg': '1.125rem',
        'xl': '1.25rem',
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
            base: '#F37960',
            100: '#FCD9D2',
            200: '#FAC6BB',
            300: '#F69F8D',
            400: '#F58C77',
            600: '#F05B3D',
            700: '#EE3E1A'
          },
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
    plugin(function({ addComponents, theme }) {
      const buttons = {
        '.btn': {
          padding: `${theme('spacing.2')} ${theme('spacing.4')}`,
          borderRadius: theme('borderRadius.none'),
          fontWeight: theme('fontWeight.400'),
          fontSize: theme('fontSize.base'),
          transitionProperty: 'all',
          transitionDuration: '100ms',
          display: 'inline-block'
        },
        '.btn-primary': {
          backgroundColor: theme('colors.primary.base'),
          color: theme('colors.primaryBg')
        },
        '.btn-secondary': {
          backgroundColor: theme('colors.brown.100'),
          color: theme('colors.primary.base'),
          borderColor: theme('colors.primary.base'),
          borderWidth: '1px',
          borderStyle: 'solid',
          padding: `calc(${theme('spacing.2')} - 1px) calc(${theme('spacing.4')} - 1px)`
        }
      }
      addComponents(buttons, ['responsive', 'hover', 'focus', 'visited']) 
    })
  ]
};
