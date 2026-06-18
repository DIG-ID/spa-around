// webpack.mix.js

const os = require('os');
const path = require('path');

// Caminho para os certificados do Local by WPEngine
const certPath = path.join(
  os.homedir(),
  os.platform() === 'win32'
    ? 'AppData/Roaming/Local/run/router/nginx/certs'
    : 'Library/Application Support/Local/run/router/nginx/certs'
);

let mix = require('laravel-mix');

mix
  .setPublicPath('dist')
  .setResourceRoot('./')
  .autoload({
    jquery: ['$', 'window.jQuery']
  })
  .js('assets/js/main.js', 'dist')
  .sass('assets/sass/main.sass', 'dist')
  .sass('assets/sass/admin.sass', 'dist')

  .browserSync({
    proxy: "https://spa-around.digid/",
    host: "spa-around.digid",
    open: "external",
    port: 3000,
    ws: true,
    https: {
      key: path.join(certPath, 'spa-around.digid.key'),
      cert: path.join(certPath, 'spa-around.digid.crt'),
    },
    files: ["./**/*.php", "./dist/js/*.js", "./dist/css/*.css"]
  })
  .disableNotifications();

if (!mix.inProduction()) {
  mix
    .webpackConfig({
      devtool: "source-map"
    })
    .sourceMaps();
}

if (mix.inProduction()) {
  mix.version();
}