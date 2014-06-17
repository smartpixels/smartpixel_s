module.exports = function(grunt) {
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),

    compass: {
      prod: {
        options: {
          config: 'config.rb',
          force: true
        }
      }
    },
    copy: {
      scripts: {
        expand: true,
        cwd: 'bower_components/',
        src: '**/*.js',
        dest: 'src/js'
      },

      maps: {
        expand: true,
        cwd: 'bower_components/',
        src: '**/*.map',
        dest: 'src/js'
      },
	  
	  styles: {
        expand: true,
        cwd: 'bower_components/',
        src: '**/*.css',
        dest: 'src/css'
      },
	  
	   scss: {
        expand: true,
        cwd: 'bower_components/',
        src: '**/*.scss',
        dest: 'src/scss'
      },
	  
	   foundationsrcscss: {
        expand: true,
        cwd: 'src/scss/foundation/scss/foundation/',
        src: '**/*.scss',
        dest: 'styles/scss/foundation'
      },
    },
	concat: {
      options: {
        separator: ';',
      },
      yetiscripts: {
        src: [
		  'src/js/foundation/js/foundation/foundation.js',
		  'src/js/foundation/js/foundation/foundation.alert.js',
		  'src/js/foundation/js/foundation/foundation.reveal.js',
		  'src/js/foundation/js/foundation/foundation.dropdown.js',
		  'src/js/foundation/js/foundation/foundation.orbit.js',
		  'src/js/foundation/js/foundation/foundation.abide.js',
		  'src/js/foundation/js/foundation/foundation.offcanvas.js',
		  'src/js/foundation/js/foundation/foundation.topbar.js',
          'js/init-foundation.js'
        ],

        dest: 'js/foundation.js',
      },

    },

    uglify: {
      modernizr: {
        files: {
          'src/js/modernizr/modernizr.min.js': ['src/js/modernizr/modernizr.js']
        }
      },
	  foundation: {
        files: {
          'js/foundation.min.js': ['js/foundation.js']
        }
      },
	  fastclick: {
        files: {
          'src/js/fastclick/fastclick.min.js': ['src/js/fastclick/lib/fastclick.js']
        }
      }
    },

    watch: {
      grunt: { files: ['Gruntfile.js'] },

      sass: {
        files: 'styles/scss/**/*.scss',
        tasks: ['compass']
      }
    }
  });

  grunt.loadNpmTasks('grunt-contrib-compass');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-copy');
  grunt.loadNpmTasks('grunt-contrib-uglify');

  grunt.registerTask('compiler', ['compass']);
  grunt.registerTask('default', ['copy', 'uglify', 'concat', 'watch']);

}