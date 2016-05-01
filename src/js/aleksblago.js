(function() {
	
	var menuBtn = document.querySelector('.js-mobile-menu'),
		navigation = document.querySelector('.js-primary-nav');
		
	if (menuBtn === null || navigation === null) {
		return;
	}
	
	menuBtn.addEventListener('click', function() {
		
		navigation.classList.toggle('active');
		
	}, false);
	
})();
