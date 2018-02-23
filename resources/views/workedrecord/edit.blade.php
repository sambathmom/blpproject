<div id="editWorkedRecord" class="modal fade" role="dialog">
    <form action="{{url('workedrecord/update/')}}" method="POST" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title">Edit Wroked Record</h4>
                </div>
                <div class="modal-body">                                   
                    <div class="row">
                        <input type="hidden" name="wr_id" id="identityEdit" >
                        @include('workedrecord.formfields')
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
