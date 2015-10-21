$(document).ready(function() {
	$('#new-user').on('click', function() {
		window.location = "edit_user.php?action=add";
	});
	
	var elems = $('.editUser');
	
	for (var i = 0; i < elems.length; i++) {
		$(elems[i]).on('click', function() {
			var url = "edit_user.php?action=edit" + "&id=" + this.id.substr(9);
			window.location = url;
		});
	}	
});
