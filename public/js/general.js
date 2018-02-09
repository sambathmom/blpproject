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

	// Grade edit and delete
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

	// Work type edit and delete
	$('.edit-worktype').on('click', function() {
		var id = $(this).data('identity');
		var workTypeName = $(this).data('name');
		$('#identityEdit').val(id);
		$('#workTypeName').val(workTypeName);
	});

	$('.destroy-worktype').on('click', function() {
		var id = $(this).data('identity');
		$('#identityDestroy').val(id);
	});

	$('#destroyWorkType').on('click', function() {
		var id = $('#identityDestroy').val();

		$.ajax({
			url: 'http://localhost:8000/worktype/destroy/' + id,
			data: {'id': id},
			type: 'GET',
			dataType: 'json',
			success: function( response ) {
			    if (response.status == 200) {
			    	$('#workTypeDestroyModal').modal('hide');
			    	location.reload();
			    }
			}
		});
	});

	// labor cost edit and delete
	$('.edit-laborcost').on('click', function() {
		$('#identityEdit').val($(this).data('identity'));
		$('#laborCostName').val($(this).data('laborcost-name'));
		$('#laborCostGrade').val($(this).data('grade'));
		$('#laborCostWorkType').val($(this).data('work-type'));
		$('#qty').val($(this).data('qty'));
		$('#cost').val($(this).data('cost'));
	});

	$('.destroy-laborcost').on('click', function() {
		var id = $(this).data('identity');
		$('#identityDestroy').val(id);
	});

	$('#destroyLaborCost').on('click', function() {
		var id = $('#identityDestroy').val();

		$.ajax({
			url: 'http://localhost:8000/laborcost/destroy/' + id,
			data: {'id': id},
			type: 'GET',
			dataType: 'json',
			success: function( response ) {
			    if (response.status == 200) {
			    	$('#laborCostDestroyModal').modal('hide');
			    	location.reload();
			    }
			}
		});
	});

});