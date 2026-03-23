jQuery(function ($) {
	function toggleMenu() {
		const menu_toggles = document.querySelectorAll('.toggle-menu'),
			view_menu = document.querySelector('.menu-mobile'),
			body = document.querySelector('body');

		// ✅ Thêm overlay nếu chưa có
		let overlay = document.querySelector('.menu-overlay');
		if (!overlay) {
			overlay = document.createElement('div');
			overlay.className = 'menu-overlay';
			document.body.appendChild(overlay);
		}

		menu_toggles.forEach(toggle => {
			toggle.addEventListener('click', () => {
				const isOpen = view_menu.classList.toggle('open');
				body.classList.toggle('menu-open', isOpen);
				overlay.classList.toggle('active', isOpen);
				toggle.setAttribute('aria-expanded', isOpen);
			});
		});

		// ✅ Click overlay => đóng menu
		overlay.addEventListener('click', () => {
			view_menu.classList.remove('open');
			body.classList.remove('menu-open');
			overlay.classList.remove('active');
			menu_toggles.forEach(t => t.setAttribute('aria-expanded', 'false'));
		});

		// ✅ Click bên ngoài menu => đóng (vẫn giữ logic gốc)
		document.addEventListener('click', (event) => {
			const isClickInsideMenu = view_menu.contains(event.target);
			const isClickInsideToggle = [...menu_toggles].some(t => t.contains(event.target));
			if (!isClickInsideMenu && !isClickInsideToggle) {
				view_menu.classList.remove('open');
				body.classList.remove('menu-open');
				overlay.classList.remove('active');
				menu_toggles.forEach(t => t.setAttribute('aria-expanded', 'false'));
			}
		});
	}

	function toggleSubmenu() {
		const nav = document.querySelector('.nav');
		if (!nav) return;

		const buttons = [...nav.querySelectorAll('.sub-menu-toggle')];

		buttons.forEach(button => {
			button.addEventListener('click', e => {
				e.preventDefault();
				const a = button.previousElementSibling,
					li = a.closest('li');
				const isOpen = li.classList.toggle('is-open');
				button.setAttribute('aria-expanded', isOpen);
				a.setAttribute('aria-expanded', isOpen);
			});
		});
	}

	new WOW({
		boxClass: 'wow',
		animateClass: 'animate__animated',
		offset: 100,
		mobile: true,
		live: true,
		resetAnimation: false,
	}).init();

	function popupBooking() {
		const popup = document.getElementById("popup-booking");
		if (!popup) return;

		const btns = document.querySelectorAll(".btn-call");
		const closeBtn = popup.querySelector(".close-popup");

		btns.forEach(btn => {
			btn.addEventListener("click", function (e) {
			e.preventDefault();

			const view_menu = document.querySelector(".menu-mobile");
			const body = document.querySelector("body");
			const overlay = document.querySelector(".menu-overlay");

			if (view_menu && view_menu.classList.contains("open")) {
				view_menu.classList.remove("open");
				body.classList.remove("menu-open");
				if (overlay) overlay.classList.remove("active");
			}

			popup.classList.remove("hidden");
			popup.classList.add("flex");
			});
		});

		closeBtn.addEventListener("click", function () {
			popup.classList.add("hidden");
			popup.classList.remove("flex");
		});

		popup.addEventListener("click", function (e) {
			if (e.target === popup) {
			popup.classList.add("hidden");
			popup.classList.remove("flex");
			}
		});
	}

	toggleMenu();
	toggleSubmenu();
	popupBooking()
});
