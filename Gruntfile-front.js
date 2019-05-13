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
                'assets/js/jquery-3.2.1/jquery-3.2.1.js',
                'assets/canvas/js/jquery.js',
                'assets/canvas/js/plugins.js',
                'assets/js/front/oPageFront.js'
                ],
                dest: 'assets/js/estic-front.min.js'
            }
        },

        concat: {
            options: {
                separator: ';\n',
            },
            dist: {
                src: [
                    'assets/js/front/oPageFront.js',
                ],
                dest: 'assets/js/estic-front.js',
            },
        },

        cssmin: {
            options: {
                shorthandCompacting: false,
                roundingPrecision: -1
            },
            target: {
                files: {
                    'assets/css/estic-front.min.css': [
                    'assets/css/bootstrap-3.0.3/bootstrap.css',
                    'assets/canvas/style.css',
                    'assets/canvas/css/animate.css',
                    'assets/canvas/css/magnific-popup.css',
                    'assets/canvas/css/responsive.css',
                    'assets/css/estic-front.css'
                    ]
                }
            }
        }
    });

    // Load the plugin that provides the "uglify" task.
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-concat');

    // Default task(s).
    grunt.registerTask('default', ['uglify','cssmin','concat']);

};
