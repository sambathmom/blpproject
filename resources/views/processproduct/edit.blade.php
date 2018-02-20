<div id="editProccess" class="modal fade" role="dialog">
    <form action="{{url('processproduct/update')}}" method="post">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Edit Process Product</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="pp_id" id="idPro">
                        @include('processproduct.formfields')
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Update</button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>  
    </form>
</div>