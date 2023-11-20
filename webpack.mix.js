const mix = require("laravel-mix");

  ;
/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js(
    "resources/assets/adminlte/js/AdminLTE.js",
    "public/admin-assets/js/adminlte.js"
    )
    .sass(
        "resources/assets/adminlte/sass-ltr/adminlte.scss",
        "public/admin-assets/css/adminlte-ltr.min.css"
        )
        .options({
            processCssUrls: false,
        });
        
mix.sass(
    "resources/assets/adminlte/sass-rtl/adminlte.scss",
    "public/admin-assets/css/adminlte-rtl.min.css"
).options({
    processCssUrls: false,
});

mix.css(
    "resources/assets/adminlte/css/adminlte.min.css",
    "public/admin-assets/css/adminlte.min.css"
);
mix.css(
    "resources/assets/custom/css/bootstrap-datetimepicker.css",
    "public/admin-assets/css/bootstrap-datetimepicker.css"
);

mix.copy(
    "node_modules/@fortawesome/fontawesome-free/webfonts",
    "public/admin-assets/webfonts"
);
mix.copy("node_modules/flag-icon-css/flags", "public/admin-assets/flags");


mix.js(
    "resources/assets/calendars/js/calendars",
    "public/calendars/js/calendars.js"
    )

mix.js(
"resources/assets/dropzone/dropzone.js",
"public/dropzone/js/dropzone.js"
)
    
mix.styles(
    ["resources/assets/calendars/css/*"],
    "public/calendars/css/calendars.css"
);
mix.styles(
    ["resources/assets/dropzone/css/*"],
    "public/dropzone/css/dropzone.css"
);
mix.js(
    "resources/assets/datatables/js/documentFileContentTrackingDatatable.js",
    "public/admin-assets/datatables/documentFileContentTrackingDatatable.js"
    );
mix.js(
    "resources/assets/datatables/js/documentFileLogsTrackingDatatable.js",
    "public/admin-assets/datatables/documentFileLogsTrackingDatatable.js"
    );
mix.js(
    "resources/assets/datatables/js/documentFileTrackingDatatable.js",
    "public/admin-assets/datatables/documentFileTrackingDatatable.js"
    );
    
    
    
    // custom css in rtl , ltr
    
    mix.css(
        "resources/assets/custom/css/custom-ltr.css",
        "public/admin-assets/css/custom-ltr.css"
    );
    mix.css(
        "resources/assets/custom/css/custom-rtl.css",
        "public/admin-assets/css/custom-rtl.css"
    );
