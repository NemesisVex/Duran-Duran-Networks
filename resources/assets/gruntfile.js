module.exports = function(grunt) {

	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		less: {
			production: {
				options: {
					cleancss: true
				},
				files: {
					'../../public/css/style.css': 'less/style.less',
					'../../public/css/skins/ddn/skin.css': 'less/skins/ddn/skin.less'
				}
			},
			development: {
				files: {
					'../../public/css/style.dev.css': 'less/style.less',
					'../../public/css/skins/ddn/skin.dev.css': 'less/skins/ddn/skin.less'
				}
			}
		}
	});

	grunt.loadNpmTasks('grunt-contrib-less');

	grunt.registerTask('default', ['less']);

};