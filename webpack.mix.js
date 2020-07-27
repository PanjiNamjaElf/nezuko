/*
 * @author    Panji Setya Nur Prawira <kstar.panjinamjaelf@gmail.com>
 * @package   Nezuko - Content Management System
 * @copyright Copyright (c) 2020, Panji Setya Nur Prawira
 */

const mix = require('laravel-mix');

if (!mix.inProduction()) {
  mix.webpackConfig({
    devtool: 'inline-source-map',
  });

  mix.sourceMaps();
}

mix.js('resources/js/app.js', 'public/js')
  .extract([
    'jquery',
    'bootstrap',
    'node-waves',
    'waypoints/lib/jquery.waypoints',
    'quill',
  ]);

mix.sass('resources/sass/bootstrap.scss', 'public/css')
  .sass('resources/sass/plugins.scss', 'public/css')
  .sass('resources/sass/app.scss', 'public/css');

mix.copyDirectory('resources/images', 'public/images');
