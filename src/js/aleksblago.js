(function() {
	
	var menuBtn = document.querySelector('.nav-MobileMenu'),
		navigation = document.querySelector('.nav-Primary');
		
	if (menuBtn === null || navigation === null) {
		return;
	}
	
	menuBtn.addEventListener('click', function() {
		
		navigation.classList.toggle('active');
		
	}, false);
	
})();
