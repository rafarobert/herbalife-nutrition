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

                    'assets/js/estic/oPageBack.js',
                    'assets/js/estic/oCrud.js',
                    'assets/js/estic/oGeoLocation.js',
                    'assets/js/estic/oDataTables.js',
                    'assets/js/estic/oFootable.js',
                    'assets/js/estic/oFormAdvanced.js',
                    'assets/js/estic/oModal.js',
                    'assets/js/estic/oTinyMce.js',
                    'assets/js/estic/oUser.js',
                    'assets/js/estic/oDropZone.js',
                    'assets/js/estic/oFileBox.js',
                    'assets/js/estic/oSweetAlert.js',
                    'assets/js/estic/oCalendar.js',
                    'assets/js/estic/oDateTime.js',
                  'assets/js/estic/oTwilio.js',


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

                    'assets/js/estic/oPageBack.js',
                    'assets/js/estic/oCrud.js',
                    'assets/js/estic/oGeoLocation.js',
                    'assets/js/estic/oDataTables.js',
                    'assets/js/estic/oFootable.js',
                    'assets/js/estic/oFormAdvanced.js',
                    'assets/js/estic/oModal.js',
                    'assets/js/estic/oTinyMce.js',
                    'assets/js/estic/oUser.js',
                    'assets/js/estic/oDropZone.js',
                    'assets/js/estic/oFileBox.js',
                    'assets/js/estic/oSweetAlert.js',
                    'assets/js/estic/oCalendar.js',
                    'assets/js/estic/oDateTime.js',
                    'assets/js/estic/oTwilio.js',

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
