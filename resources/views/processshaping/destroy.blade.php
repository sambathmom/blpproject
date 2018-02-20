<div id="deleteProcessShaping" class="modal fade" role="dialog">
     <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Confirmation</h4>
            </div>
            <form action="{{url('processshaping/destroy')}}" method="POST">
                <div class="modal-body">
                    {{ csrf_field() }}
                    <input type="hidden" name="ps_id" id="deleteShaping">
                    <p>Are you sure want to delete this Proccess Shaping?</p>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">OK</button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>