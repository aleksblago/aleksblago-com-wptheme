(function() {
	
	var menuBtn = document.querySelector('.nav-MobileMenu'),
		navigation = document.querySelector('.nav-Primary');
	
	menuBtn.addEventListener('click', function() {
		
		navigation.classList.toggle('active');
		
	}, false);
	
})();
