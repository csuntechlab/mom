var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | FRONT-END DIRECTIONS:
 |--------------------------------------------------------------------------
 |
 | 1. Run 'npm install' to install Gulp && Elixir
 | 2. Create '.bowerrc' in root directory, see (https://gist.github.com/alexhernandez/c3b0d97538f5869d7f86)
 | 3. Create 'elixir.json' in root directory, see (https://gist.github.com/alexhernandez/963c188f23e14e33929e)
 | 4. Run 'bower init' followed by "bower install {package-name} --save"
 | 5. Run any of the following: 'gulp', 'gulp watch', 'gulp --production'
 |
 */

// Get Bower Directory Path (elixir.json)
var components = elixir.config.bowerDir;

// Get Bower Package Paths
var paths = {
   'jquery': components + '/jquery/dist/',
   'bootstrap': components + '/bootstrap-sass/assets/',
   'fontawesome': components + '/font-awesome/',
   'chosen': components + '/chosen/',
};

// Begin Elixir Project
elixir(function(mix) {

  // Add Styles to project
  mix.copy(paths.bootstrap + 'stylesheets', 'resources/assets/bootstrap-sass')
     .copy(paths.fontawesome + 'css/font-awesome.css', 'resources/css/vendor/font-awesome.css')
     .copy(paths.chosen + 'chosen.css', 'resources/css/chosen.css');

  // Add Fonts to project
  mix.copy(paths.fontawesome + 'fonts', 'public/fonts');

  // Add Scripts to project
  mix.copy(paths.jquery + 'jquery.js', 'resources/js/jquery/jquery.js')
     .copy(paths.bootstrap + 'javascripts/bootstrap.js', 'resources/js/bootstrap-js/bootstrap.js')
     .copy(paths.chosen + 'chosen.jquery.js', 'resources/js/chosen/chosen.js');

  // Merge Styles
  mix.styles([
    'font-awesome.css',
    'chosen.css'
  ],'public/css/components.css', 'resources/css');

  // Merge Scripts
  mix.scripts([
    'jquery/jquery.js', 
    'bootstrap-js/bootstrap.js',
    'chosen/chosen.js',
    'project/create.js',
    'app.js'
  ],'public/js/app.js', 'resources/js');

  // Compile SASS
  mix.sass('app.scss');

});