/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 * ======================================================================== */

(function($) {

	// Use this variable to set up the common and page specific functions. If you
	// rename this variable, you will also need to rename the namespace below.
	var Sage = {
		'common': {
			init: function() {

				/* * 
				 *	Set elements to the window height,
				 * 	there is an overflow:auto on the .main area
				 *	this makes the scroll trick work
				 */
				function setToWindowHeight(args) {
					var wh = $(window).height(),
						ch = $('.main').height();

					if (ch < wh) {
						$(args).css('height', wh + 'px');
					}
				}

				$(window).bind({
					load: setToWindowHeight('html, body, main, .sidebar'),
					resize: setToWindowHeight('html, body, main, .sidebar')
				});

				var $appHeader = $('.app-header'),
					$appSidebar = $('.sidebar'),
					$appContent = $('.content .main');

				// d3.selectAll('.app-header')
				// 	.trigons({
				// 		colors: '#8BC34A, #689F38, #DCEDC8',
				// 		width: 1440,
				// 		height: 164
				// 	})
				// 	.trigonsAnimInit({
				// 		animIn: 'effect1-top',
				// 		durationIn: 2000,
				// 		easyIn: 'cubic-out',
				// 	}).trigonsBackground();

			},
			finalize: function() {
				
				/* * *
				 *	Fade Page Header on Scroll
				 *	@todo turn this REPL code in functional code
				 *	Read in vars
				 */
				// var $pageTitle = $('div.page-header:first-of-type > h1'),
				// 	pageTitleOffset = $pageTitle.offset(),
				// 	originalPosition = pageTitleOffset.top;

				// // Loop through the scroll event
				// $('.main').scroll(function() {
				// 	pageTitleOffset = $pageTitle.offset();
				// 	// Evaluate the position
				// 	if (pageTitleOffset.top / 1000 > 0) {
				// 		var opacity = pageTitleOffset.top * 0.005;
				// 		if (pageTitleOffset.top < originalPosition) {
				// 			$pageTitle.css('opacity', opacity); // Put in the new opacity
				// 		} else {
				// 			$pageTitle.css('opacity', 1);
				// 		}
				// 	}
				// });

			}
		},
		'home': {
			init: function() {

			},
			finalize: function() {}
		}
	};

	// The routing fires all common scripts, followed by the page specific scripts.
	// Add additional events for more control over timing e.g. a finalize event
	var UTIL = {
		fire: function(func, funcname, args) {
			var fire;
			var namespace = Sage;
			funcname = (funcname === undefined) ? 'init' : funcname;
			fire = func !== '';
			fire = fire && namespace[func];
			fire = fire && typeof namespace[func][funcname] === 'function';

			if (fire) {
				namespace[func][funcname](args);
			}
		},
		loadEvents: function() {
			// Fire common init JS
			UTIL.fire('common');

			// Fire page-specific init JS, and then finalize JS
			$.each(document.body.className.replace(/-/g, '_').split(/\s+/), function(i, classnm) {
				UTIL.fire(classnm);
				UTIL.fire(classnm, 'finalize');
			});

			// Fire common finalize JS
			UTIL.fire('common', 'finalize');
		}
	};

	// Load Events
	$(document).ready(UTIL.loadEvents);
	// $.material.init();


})(jQuery); // Fully reference jQuery after this point.


/* * *
 *	Angular
 */
// (function() {
// 	angular
// 		.module('Site', [
// 			'ngRoute'
// 		])
// 		.config(['$routeProvider', '$locationProvider', '$sceProvider', function($routeProvider, $locationProvider, $sceProvider) {
// 			$routeProvider
// 				.when('/:slug', {
// 					templateUrl: sageLocalized.partials + 'content.html',
// 					controller: 'Content'
// 				});

//                      $sceProvider.enabled(false); // global override
// 		}])
// 		.controller('Content', ['$http', '$scope', '$routeParams', function($http, $scope, $routeParams) {
// 			$http.get('posts/?filter[name]=' + $routeParams.slug).success(function(res) {
// 				$scope.post = res[0];
// 			});
// 		}]);
// })();