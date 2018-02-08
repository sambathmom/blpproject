  $(document).ready(function(){

      $('.deletSupplier').on('click',function(){
        $('#identityDelete').val($(this).data('id'));
      });

      $('.editSupplier').on('click',function(){
        $('#identityEdit').val($(this).data('id'));
        $('#supplierCompany').val($(this).data('company'));
        $('#supplierContact').val($(this).data('contact'));
        $('#supplierTitle').val($(this).data('title'));
        $('#supplierEmail').val($(this).data('email'));
        $('#supplierPhone').val($(this).data('phone'));
      });


      // rawMaterail
      $('.delet_supplier').on('click',function(){
        $('#identityDelete').val($(this).data('id'));
      });
      // edit
      $('.editRawMaterail').on('click',function(){
        $('#identityEdit').val($(this).data('id'));
        $('#supplierId').val($(this).data('supplier-id'));
        $('#rawGrade').val($(this).data('grade-id'));
        $('#rawName').val($(this).data('rawname'));
        $('#rawQty').val($(this).data('rawqty'));
        $('#rawCost').val($(this).data('rawcost'));
        
      });



  });