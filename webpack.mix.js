const mix = require('laravel-mix');

mix.setPublicPath('./build');

mix.ts('assets/app.ts', 'js');

mix.postCss('assets/app.css', 'css', [
  require('tailwindcss'),
  require('postcss-nested'),

]);
