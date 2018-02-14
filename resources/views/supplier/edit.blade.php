<div id="editSupplier" class="modal fade" role="dialog">
    <form action="{{url('supplier/update/')}}" method="POST" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title">Edit Supplier</h4>
            </div>
            <div class="modal-body">                                   
                <div class="row">
                        <input type="hidden" name="supplier_id" id="identityEdit" value="" >
                        @include('supplier.formfields')
                </div> 
                <div class="modal-footer">
                    <input type="submit" class="btn btn-success" value="Update"></input>
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
                </div>         
            </div>
        </div>
    </div>
    </form>
</div>
