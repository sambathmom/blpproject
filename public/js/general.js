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
    //Worked Record
    $('.delete-worked-record').on('click', function() {
        $('#identityDelete').val($(this).data('id'));
    });
     // edit
    $('.edit-worked-record').on('click',function(){
        $('#identityEdit').val($(this).data('id'));
        $('#laborCost').val($(this).data('laborcost'));
        $('#laborCost').trigger('chosen:updated');
        $('#staff').val($(this).data('staff'));
        $('#staff').trigger('chosen:updated');
        $('#workType').val($(this).data('worktype'));
        $('#workType').trigger('chosen:worktype');
        $('#memo').val($(this).data('memo'));
        $('#qty').val($(this).data('qty'));
        
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
        $('#laborCostGrade').trigger('chosen:updated');
        $('#laborCostWorkType').trigger('chosen:updated');
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
        $('#processMaterial').val($(this).data('proname'));
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
        $('#grade').val($(this).data('grade'));
        $('#grade').trigger('chosen:updated');
        $('#processMaterial').val($(this).data('process-material'));
        $('#processMaterial').trigger('chosen:updated');
        $('#shapProduct').val($(this).data('shaping-name'));
        $('#qty').val($(this).data('sqty'));
        $('#cost').val($(this).data('scost'));
    });

    // Dired Product 

    $('.edit-driedproduct').on('click', function() {
        $('#identityEdit').val($(this).data('identity'));
        $('#driedProductName').val($(this).data('dp-name'));
        $('#processMaterial').val($(this).data('process-materail'));
        $('#processMaterial').trigger('chosen:updated');
        $('#staff').val($(this).data('staff'));
        $('#staff').trigger('chosen:updated');
        $('#grade').val($(this).data('grade'));
        $('#grade').trigger('chosen:updated');
        $('#cost').val($(this).data('cost'));
        $('#qty').val($(this).data('qty'));
    });

    $('.destroy-driedproduct').on('click', function() {
        $('#identityDestroy').val($(this).data('identity'));
    });
});
