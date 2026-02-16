const plugin = require('tailwindcss/plugin')

module.exports = {
  content: [
      './*.php',
      './templates/**/*.php',
      './build/js/**/*.js',
      './assets/scss/**/*.scss',  // @apply 用的 class 也要掃到才會輸出
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
          // Primary (--primary--0 對應 50，符合 Tailwind 慣用階層)
          primary: {
            base: '#73A22E',  // 向後相容，等同 primary-500
            50: '#EBFAD4',
            100: '#DEF6BA',
            200: '#CEEF9E',
            300: '#BCE481',
            400: '#A7D464',
            500: '#8FBE48',
            600: '#73A22E',
            700: '#557E18',
            800: '#365408',
            900: '#182900',
          },
          primaryBg: '#EFEBE7',  // 向後相容，等同 surface-primary (brown-50)
          black: '#1D1C1B',     // 向後相容，等同 gray-950
          brown: {
            100: '#EFEBE7',
            200: '#E8DFD5',
            300: '#D9CBBA',
            400: '#C3AC92',
            500: '#B19472',
            600: '#70593E',
            700: '#4B3B29',
            800: '#1E1811',
            900: '#645330',
            950: '#4C3F24',
          },
          gray: {
            50: '#E9E8E7',
            100: '#D5D4D2',
            200: '#C1C0BD',
            300: '#AEACA8',
            400: '#9A9893',
            500: '#86847E',
            600: '#6C6A65',
            700: '#5C5B56',
            800: '#474643',
            900: '#32312F',
            950: '#1D1C1B',
          },
          // 語意色（對應 :root 變數）
          accent: {
            primary: '#73A22E',   // --primary--600
            secondary: '#8FBE48', // --primary--500
          },
          surface: {
            primary: '#F0EBE1',  // --bg-primary (brown--50)
            secondary: '#E8DFCE', // --bg-secondary (brown--100)
          },
          type: {
            primary: '#32312F',   // --text-primary (gray--900)
            secondary: '#6C6A65', // --text-secondary (gray--600)
          },
          border: {
            DEFAULT: '#DCCFB6',   // --border-default (brown--200)
          },
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
