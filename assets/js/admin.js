/**
 * Admin scripts.
 * Enqueued in includes/class-plugin.php on admin_enqueue_scripts.
 *
 * @package WpPluginBoilerplateAi
 */

(function () {
	'use strict';

	document.addEventListener('DOMContentLoaded', function () {
		// Example: run only on our admin pages
		var wrap = document.querySelector('.wp-plugin-boilerplate-ai-wrap');
		if (wrap) {
			// Your admin JS here
		}
	});
})();
