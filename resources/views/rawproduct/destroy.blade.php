<div id="deleteRawPro" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title">Comfirmation</h4>
            </div>
            <div class="modal-body" class="text-center">
                <p>Are you sure you want to delete this Raw Product?</p>
                <form class="form-horizontal" action="{{url('/rawproduct/destroy')}}" method="post">
                    <div class="form-group">
                        <div class="col-sm-10">
                            {{ csrf_field() }}
                            <input type="hidden" class="form-control" id="identityDelete" name="rp_id" id="identityDelete" >
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-danger delete" value="Ok">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>