module.exports = function(grunt) {

    // Project configuration.
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        uglify: {
            options: {
                banner: '/*! <%= pkg.name %> <%= grunt.template.today("yyyy-mm-dd") %> */\n'
            },
            build: {
                src: [

                    'assets/inspinia/js/jquery-2.1.1.js',
                    'assets/inspinia/js/bootstrap.min.js',

                    'assets/js/estic/common.js',

                    'assets/js/back/oPageBack.js',
                    'assets/js/back/oCrud.js',
                    'assets/js/back/oGeoLocation.js',
                    'assets/js/back/oDataTables.js',
                    'assets/js/back/oFootable.js',
                    'assets/js/back/oFormAdvanced.js',
                    'assets/js/back/oModal.js',
                    'assets/js/back/oTinyMce.js',
                    'assets/js/back/oUser.js',
                    'assets/js/back/oDropZone.js',
                    'assets/js/back/oFileBox.js',
                    'assets/js/back/oSweetAlert.js',
                    'assets/js/back/oCalendar.js',
                    'assets/js/back/oDateTime.js',

                ],
                dest: 'assets/js/estic-back.min.js'
            }
        },

        concat: {
            options: {
                separator: ';\n',
                stripBanners: true,
                banner: '/*! <%= pkg.name %> - v<%= pkg.version %> - ' +
                    '<%= grunt.template.today("yyyy-mm-dd") %> */',
            },
            dist: {
                src: [
                    'assets/js/estic/common.js',

                    'assets/js/back/oPageBack.js',
                    'assets/js/back/oCrud.js',
                    'assets/js/back/oGeoLocation.js',
                    'assets/js/back/oDataTables.js',
                    'assets/js/back/oFootable.js',
                    'assets/js/back/oFormAdvanced.js',
                    'assets/js/back/oModal.js',
                    'assets/js/back/oTinyMce.js',
                    'assets/js/back/oUser.js',
                    'assets/js/back/oDropZone.js',
                    'assets/js/back/oFileBox.js',
                    'assets/js/back/oSweetAlert.js',
                    'assets/js/back/oCalendar.js',
                    'assets/js/back/oDateTime.js',

                ],
                dest: 'assets/js/estic-back.js',
            },
        },

        cssmin: {
            options: {
                shorthandCompacting: false,
                    roundingPrecision: -1
            },
            target: {
                files: {
                        'assets/css/estic-back.min.css': [
                        'assets/inspinia/css/bootstrap.min.css',
                        'assets/inspinia/css/plugins/toastr/toastr.min.css',
                        'assets/inspinia/js/plugins/gritter/jquery.gritter.css',
                        'assets/inspinia/css/animate.css',
                        'assets/inspinia/css/style.css',
                        'assets/css/estic-back.css'
                    ]
                }
            }
        },
    });

    // Load the plugin that provides the "uglify" task.
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-concat');

    // Default task(s).
    grunt.registerTask('default', ['uglify','cssmin','concat']);

};