<div id="editRawMaterail" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title">Edit raw material</h4>
            </div>
            <div class="modal-body">                                   
                 <form action="{{url('rawmaterial/update/')}}" method="POST" >
                        <div class="row">
                        <input type="hidden" name="rm_id" id="identityEdit" >
                            @include('rawmaterial.formfields')  
                        </div> 
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-success" value="Update"></input>
                            <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
                        </div>
                </form>  
            </div>
        </div>
    </div>
</div>
