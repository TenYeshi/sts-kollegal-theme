/**
 * STS Kollegal Theme Navigation & Interactive UI
 * Vanilla JavaScript (Zero jQuery dependency)
 */
(function () {
	'use strict';

	document.addEventListener('DOMContentLoaded', function () {
		// --- Mobile Navigation Toggle ---
		var navToggle = document.getElementById('sts-nav-toggle');
		var primaryNav = document.getElementById('sts-primary-nav');

		if (navToggle && primaryNav) {
			navToggle.addEventListener('click', function () {
				var isExpanded = navToggle.getAttribute('aria-expanded') === 'true';
				navToggle.setAttribute('aria-expanded', !isExpanded);
				navToggle.classList.toggle('is-active', !isExpanded);
				primaryNav.classList.toggle('is-open', !isExpanded);
				document.body.classList.toggle('sts-nav-open', !isExpanded);

				if (!isExpanded) {
					// Focus first menu item for keyboard accessibility
					var firstLink = primaryNav.querySelector('a');
					if (firstLink) firstLink.focus();
				}
			});

			// Close on Escape key
			document.addEventListener('keydown', function (e) {
				if (e.key === 'Escape' && primaryNav.classList.contains('is-open')) {
					navToggle.setAttribute('aria-expanded', 'false');
					navToggle.classList.remove('is-active');
					primaryNav.classList.remove('is-open');
					document.body.classList.remove('sts-nav-open');
					navToggle.focus();
				}
			});

			// Close when clicking outside on mobile
			document.addEventListener('click', function (e) {
				if (
					primaryNav.classList.contains('is-open') &&
					!primaryNav.contains(e.target) &&
					!navToggle.contains(e.target)
				) {
					navToggle.setAttribute('aria-expanded', 'false');
					navToggle.classList.remove('is-active');
					primaryNav.classList.remove('is-open');
					document.body.classList.remove('sts-nav-open');
				}
			});
		}

		// --- Scroll to Top Button ---
		var scrollTopBtn = document.getElementById('sts-scroll-top');
		if (scrollTopBtn) {
			window.addEventListener('scroll', function () {
				if (window.scrollY > 400) {
					scrollTopBtn.classList.add('is-visible');
				} else {
					scrollTopBtn.classList.remove('is-visible');
				}
			}, { passive: true });

			scrollTopBtn.addEventListener('click', function () {
				window.scrollTo({
					top: 0,
					behavior: 'smooth'
				});
			});
		}
	});
})();
