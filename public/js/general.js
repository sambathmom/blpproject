$(document).ready(function() {	

	// Staff delete and update
	$('.edit-staff').on('click', function() {
		$('#identityEdit').val($(this).data('identity'));
		$('#firstName').val($(this).data('frist-name'));
		$('#middleName').val($(this).data('middle-name'));
		$('#lastName').val($(this).data('last-name'));
		$('#sex').val($(this).data('sex'));
		$('#phone').val($(this).data('phone'));
		$('#email').val($(this).data('email'));

		if ($(this).data('sex') == 'Female') {
			$("#female").attr('checked', true);
		} else {
			$("#male").attr('checked', true);
		}
	});

	$('.destroy-staff').on('click', function() {
		var id = $(this).data('identity');
		$('#identityDestroy').val(id);
	});

	$('#destroyStaff').on('click', function() {
		var id = $('#identityDestroy').val();

		$.ajax({
			url: 'http://localhost:8000/staff/destroy/' + id,
			data: {'id': id},
			type: 'GET',
			dataType: 'json',
			success: function( response ) {
			    if (response.status == 200) {
			    	$('#staffDestroyModal').modal('hide');
			    	location.reload()
			    }
			}
		});
	});

	// Grade edit adn delete
	$('.edit-grade').on('click', function() {
		var id = $(this).data('identity');
		var gradeName = $(this).data('name');
		$('#identityEdit').val(id);
		$('#gradeName').val(gradeName);
	});

	$('.destroy-grade').on('click', function() {
		var id = $(this).data('identity');
		$('#identityDestroy').val(id);
	});

	$('#destroyGrade').on('click', function() {
		var id = $('#identityDestroy').val();

		$.ajax({
			url: 'http://localhost:8000/grade/destroy/' + id,
			data: {'id': id},
			type: 'GET',
			dataType: 'json',
			success: function( response ) {
			    if (response.status == 200) {
			    	$('#gradeDestroyModal').modal('hide');
			    	location.reload()
			    }
			}
		});
	});
});