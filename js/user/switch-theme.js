$(document).ready(function () {
	const darkTheme = {
		'--bg-color': '#121212',
		'--text-color': '#f5f5f5',
		'--nav-color': '#1e1e1e',
		'--button-color': '#A238FF',
		'--button-border-color': 'rgba(255, 255, 255, 0.4)',
		'--input-color': '#1e1e1e',
		'--input-focus-color': '#303030',
		'--input-border-focus-color': 'rgba(255, 255, 255, 0.5)',
		'--link-color': 'rgba(255, 255, 255, 0.5)',
		'--menu-hover-color': 'rgba(255, 255, 255, 0.9)',
		'--dropdown-color': '#f5f5f5',
		'--dropdown-hover-color': 'rgba(0, 0, 0, 0.1)'
	};

	const lightTheme = {
  '--bg-color': '#dddddd', 
	'--text-color': '#1a1a1a', 
	'--nav-color': '#ffffff', 
	'--button-color': '#4A90E2',
	'--button-border-color': 'rgba(0, 0, 0, 0.1)',
	'--input-color': '#ffffff',
	'--input-focus-color': '#f0f4f8',
	'--input-border-focus-color': '#4A90E2',
	'--link-color': '#3b5998',
	'--menu-hover-color': 'rgba(0, 0, 0, 0.8)',
	'--dropdown-color': 'rgba(0, 0, 0, 0.5)',
	'--dropdown-hover-color': 'rgba(255, 255, 255, 1)'
	};

	function applyTheme(themeObj) {
		const $root = $(document.documentElement);
		$.each(themeObj, function (variable, value) {
			$root.css(variable, value);
		});
	}

	// Lấy chế độ đã lưu trong localStorage
	let currentMode = localStorage.getItem('theme-mode') || 'dark';
	// applyTheme(currentMode === 'dark' ? darkTheme : lightTheme);
  if (currentMode === 'dark') {
    $('.dark-mode').html("<span class=\"fa-solid fa-sun\" style=\"font-size: 25px\"></span>");
  }
  else {
    $('.dark-mode').html("<span class=\"fa-solid fa-moon\" style=\"font-size: 25px\"></span>");
  }
	$('.dark-mode').click(function () {
		if (currentMode === 'dark') {
			applyTheme(lightTheme);
			currentMode = 'light';
      $('.dark-mode').html("<span class=\"fa-solid fa-moon\" style=\"font-size: 25px\"></span>");
		} else {
			applyTheme(darkTheme);
			currentMode = 'dark';
      $('.dark-mode').html("<span class=\"fa-solid fa-sun\" style=\"font-size: 25px\"></span>");
		}
		localStorage.setItem('theme-mode', currentMode);
	});
});