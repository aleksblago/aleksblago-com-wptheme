(function() {
	
	var menuBtn = document.querySelector('.nav-MobileMenu'),
		navBar = document.querySelector('.nav-Links');
	
	menuBtn.addEventListener('click', function() {
		
		navBar.classList.toggle('active');
		
	}, false);
	
})();
