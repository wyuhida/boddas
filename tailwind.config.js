module.exports = {
  content: ['./resources/**/*.blade.php', './resources/**/*.js'],
  theme: {
    extend: {
      margin: {
        '2.45%': '2.45%',
      },
      bottom: {
        '88.96%': '88.96%',
      },
      fontSize: {
        '75': '75px',
      },
      colors: {
        'hero-color': 'rgba(254,234,227,0.4)',
        'pink-aktif': '#E27C82',
        'bg-tombol': '#FF6875',
        'bg-pink': '#FFF7F4',
        'bg-btn': '#FFE9E7',

        'bookmark-star': '#ffc600',
        'bookmark-foot': '#E27C82',
        'bookmark-foot1': 'rgba(185, 101, 106, 0.55)',
        'bookmark-white': '#C1C8CE',
        'bookmark-black': '#262626',
        'bookmark-btn-min-plus': '#FFF0F1',
      },
    },
    minHeight: {
      '663': '500px',
    },
    fontFamily: {
      Inter: ['Inter, sans-serif'],
      Poppins: ['Poppins,sans-serif'],
      Roboto: ['Roboto'],
    },
  },
  container: {
    center: true,
    padding: '1rem',
    screens: {
      lg: '1124px',
      xl: '1124px',
      '2xl': '1124px',
    },
  },
  plugins: [],
}
