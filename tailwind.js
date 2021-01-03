module.exports = {
  future: {
      removeDeprecatedGapUtilities: true,
      purgeLayersByDefault: true,
  },
  purge: [
      './*.php',
      './templates/**/*.php',
      './build/js/**/*.js',
  ],
  theme: {
      container: {
        padding: '1.5rem',
      },
      extend: {
        colors: {
          primary: '#F37960',
          primaryBg: '#F3F2F0',
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
        lineHeight: {
          tighter: '1.125',
        },
      }
  },
  variants: {
    textColor: ['responsive', 'hover', 'focus', 'visited'],
  },
  plugins: [
    ({addUtilities}) => {
      const utils = {
        '.translate-x-half': {
            transform: 'translateX(50%)',
        },
      };
      addUtilities(utils, ['responsive'])
    }
  ]
};
