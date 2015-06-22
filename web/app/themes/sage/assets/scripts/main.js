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
				 *	this makes the scroll event work
				 */
				function setToWindowHeight(args) {
					var wh = $(window).height();
					$(args).css('height', wh + 'px');
				}

				$(window).bind({
					load: setToWindowHeight('html, body, main, .sidebar'),
					resize: setToWindowHeight('html, body, main, .sidebar')
				});

				// TODO turn this REPL code in functional code
				// Read in vars
				var $pageTitle = $('.main > section > .page-header > h1');
				var pageTitlePos = $pageTitle.offset();

				// Loop through the scroll event
				// $('.main').scroll(function() {
				// 	pageTitlePos = $pageTitle.offset();
				// 	console.log(pageTitlePos);
				// 	// Evaluate the position
				// 	if ((pageTitlePos.top / 1000) > 0) {
				// 		$pageTitle.css('opacity', pageTitlePos / 100); // Put in the new opacity
				// 	}
				// });

			},
			finalize: function() {}
		},
		'home': {
			init: function() {},
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