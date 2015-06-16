var elixir = require('laravel-elixir');

elixir(function(mix) {
    var dtPluginsDir = 'bower_components/datatables-plugins/';

    // Copy jquery, bootstrap, and font awesome
    mix.copy(
        'bower_components/jquery/dist/jquery.js',
        'resources/assets/js/jquery.js'
    ).copy(
        'bower_components/bootstrap/less',
        'resources/assets/less/bootstrap'
    ).copy(
        'bower_components/bootstrap/dist/js/bootstrap.js',
        'resources/assets/js/bootstrap.js'
    ).copy(
        'bower_components/bootstrap/dist/fonts',
        'public/assets/fonts'
    ).copy(
        'bower_components/fontawesome/less',
        'resources/assets/less/fontawesome'
    ).copy(
        'bower_components/fontawesome/fonts',
        'public/assets/fonts'
    );

    // Copy datatables
    mix.copy(
        'bower_components/datatables/media/js/jquery.dataTables.js',
        'resources/assets/js/dataTables.js'
    ).copy(
        dtPluginsDir + 'integration/bootstrap/3/dataTables.bootstrap.css',
        'resources/assets/less/dataTables.less'
    ).copy(
        dtPluginsDir + 'integration/bootstrap/3/dataTables.bootstrap.js',
        'resources/assets/js/dataTables.bootstrap.js'
    );

    // Combine scripts
    mix.scripts([
        'js/jquery.js',
        'js/bootstrap.js',
        'js/dataTables.js',
        'js/dataTables.bootstrap.js'

    ], 'public/assets/js/admin.js', 'resources/assets');

    // Compile Less
    mix.less('admin.less', 'public/assets/css');
});
