module.exports = {
  theme: {
    extend: {}
  },
  variants: {},
  plugins: [
      require('tailwindcss/plugins/container')({
          center: true,
          padding: '1rem',
      }),
  ],
}
