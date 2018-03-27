<div id="gradeDestroyModal" class="modal fade" role="dialog">
    <form action="{{route('gradedestroy')}}" method="post">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Confirmation</h4>
                </div>
                <div class="modal-body">
                    {{ csrf_field() }}
                    <input type="hidden" name="grade_id" id="identityDestroy">
                    <p>Are you sure want to delete this grade?</p>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" id="destroyGrade">OK</button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </form>
</div>