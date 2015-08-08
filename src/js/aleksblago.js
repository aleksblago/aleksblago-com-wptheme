(function() {
	
	var menuBtn = document.querySelector('.nav-MobileMenu'),
		navBar = document.querySelector('.nav-Links'),
		navSearch = document.querySelector('.nav-Search'),
		navFooter = document.querySelector('.nav-Footer');
	
	menuBtn.addEventListener('click', function() {
		
		navBar.classList.toggle('active');
		navSearch.classList.toggle('active');
		navFooter.classList.toggle('active');
		
	}, false);
	
})();
