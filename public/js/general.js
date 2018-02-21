  $(document).ready(function()
  {
  //supplier update and delet
  
    $('.deleteSupplier').on('click',function(){
        $('#identityDelete').val($(this).data('id'));
    });

    $('.edit-supplier').on('click',function(){
        $('#identityEdit').val($(this).data('id'));
        $('#supplierCompany').val($(this).data('company'));
        $('#supplierContact').val($(this).data('contact'));
        $('#supplierTitle').val($(this).data('title'));
        $('#supplierEmail').val($(this).data('email'));
        $('#supplierPhone').val($(this).data('phone'));
    });

    // rawMaterail delete and update
    $('.delete-materail').on('click',function(){
        $('#identityDelete').val($(this).data('id'));
    });
    // edit
    $('.editRawMaterail').on('click',function(){
        $('#identityEdit').val($(this).data('id'));
        $('#supplier').val($(this).data('supplier'));
        $('#supplier').trigger('chosen:updated');
        $('#staff').val($(this).data('staff'));
        $('#staff').trigger('chosen:updated');
        $('#rawGrade').val($(this).data('grade'));
        $('#rawGrade').trigger('chosen:updated');
        $('#rawName').val($(this).data('rawname'));
        $('#proQty').val($(this).data('rawqty'));
        $('#proCost').val($(this).data('rawcost')); 
    });

    // raw Product
    $('.delete-rawproduct').on('click', function() {
        $('#identityDelete').val($(this).data('id'));
    });
     // edit
    $('.editRawPro').on('click',function(){
        $('#identityEdit').val($(this).data('id'));
        $('#rmId').val($(this).data('rmid'));
        $('#rmId').trigger('chosen:updated');
        $('#staff').val($(this).data('staff'));
        $('#staff').trigger('chosen:updated');
        $('#rawGrade').val($(this).data('grade'));
        $('#rawGrade').trigger('chosen:updated');
        $('#rawPro').val($(this).data('name'));
        $('#rawQty').val($(this).data('qty'));
        $('#rawCost').val($(this).data('cost'));
        
    });

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
            url:  'http://localhost:8000/laborcost/destroy/' + id,
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

    // proccessMaterial delete and edit
    $('.delete-proccess').on('click', function() {
        $('#deleteProcessId').val($(this).data('id'));
    });

    $('.editProccess').on('click',function(){
        $('#identityEdit').val($(this).data('id'));
        $('#rpName').val($(this).data('rpname'));
        $('#staff').val($(this).data('staff'));
        $('#staff').trigger('chosen:updated');
        $('#rpName').trigger('chosen:updated');
        $('#proName').val($(this).data('proname'));
        $('#pQty').val($(this).data('proqty'));
        $('#pCost').val($(this).data('procost'));
        
    });

    // processproduct delete and edit
    $('.delete-pproduct').on('click',function() {
        $('#deleteProduct').val($(this).data('id'));
    });

    $('.edit-pproduct').on('click',function(){
        $('#idPro').val($(this).data('id'));
        $('#pmName').val($(this).data('pmname'));
        $('#pmName').trigger('chosen:updated');
        $('#staff').val($(this).data('staff'));
        $('#staff').trigger('chosen:updated');
        $('#ppName').val($(this).data('ppname'));
        $('#ppQty').val($(this).data('ppqty'));
        $('#ppCost').val($(this).data('ppcost'));
    });

    // process Shaping delete and edit
    $('.delete-shaping').on('click',function() {
        $('#deleteShaping').val($(this).data('id'));
    });
    $('.edit-shaping').on('click',function(){
        $('#idShaping').val($(this).data('id'));
        $('#staff').val($(this).data('staff'));
        $('#staff').trigger('chosen:updated');
        $('#pocessProduct').val($(this).data('process-shaping'));
        $('#pocessProduct').trigger('chosen:updated');
        $('#shapingName').val($(this).data('shaping-name'));
        $('#shapingQty').val($(this).data('sqty'));
        $('#shapingCost').val($(this).data('scost'));
    });

    // Process Product edit and destroy
    $('.edit_proccess_cleaning').on('click', function() {
        $('#identityEdit').val($(this).data('identity'));
        $('#processCleaningName').val($(this).data('pc-name'));
        $('#processProduct').val($(this).data('process-product'));
        $('#staff').val($(this).data('staff'));
        $('#staff').trigger('chosen:updated');
        $('#processProduct').trigger('chosen:updated');
        $('#cost').val($(this).data('cost'));
        $('#qty').val($(this).data('qty'));
    });

    $('.delete-proccess-cleaning').on('click', function() {
        $('#identityDestroy').val($(this).data('identity'));
    });

    $('#destroyProcessCleaning').on('click', function() {
        var id = $('#identityDestroy').val();

        $.ajax({
            url:  'http://localhost:8000/processcleaning/destroy/' + id,
            data: {'id': id},
            type: 'GET',
            dataType: 'json',
            success: function( response ) {
              if (response.status == 200) {
                $('#processCleaningDestroyModal').modal('hide');
                location.reload();
              }
            }
        });
    });

});
