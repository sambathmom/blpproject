<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

<div class="col-md-12 form-group">
    <div class="form-group row">
        <label for="staff" class="col-md-4 control-label"><strong>Staff:<span class="required" aria-required="true">* </span></strong></label>
        <div class="col-md-7">                                      
            <select class="chzn-select chzn-rtl" tabindex="10" name="staff_id"  id="staff">
                @foreach ($staffs as $staff) 
                    <option value="{{$staff->staff_id}}">{{$staff->first_name}} {{$staff->middle_name}} {{$staff->last_name}}</option>
                @endforeach
            </select> 
        </div>
    </div>
</div>

<div class="col-md-12 form-group">
    <div class="form-group row">                             
        <label for="processMaterial" class="col-md-4 control-label"><strong>Process material:<span class="required" aria-required="true">* </span></strong></label>
        <div class="col-md-7">
            <select name="pm_id"  id="processMaterial" class="chzn-select chzn-rtl" tabindex="10">
                @foreach ($processMaterials as $processMaterial) 
                    <option value="{{$processMaterial->pm_id}}">{{$processMaterial->pm_name}}</option>
                @endforeach
            </select> 
        </div>
    </div>
</div>

<div class="col-md-12 form-group">
    <div class="form-group row">                             
        <label for="grade" class="col-md-4 control-label"><strong>Grade:<span class="required" aria-required="true">* </span></strong></label>
        <div class="col-md-7">
            <select name="grade_id"  id="grade" class="chzn-select chzn-rtl" tabindex="10">
                @foreach ($grades as $grade) 
                    <option value="{{$grade->grade_id}}">{{$grade->grade_name}}</option>
                @endforeach
            </select> 
        </div>
    </div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12 form-group">
    <div class="form-group row">
        <label for="qty" class="col-md-4 control-label"><strong>Qauntity:<span class="required" aria-required="true">* </span></strong></label>
        <div class="col-md-7">
            <input placeholder="Qauntity" class="form-control" id="qty" name="qty"  type="text">
        </div>
        <span class="error">{{ $errors->first('qty') }}</span>
    </div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12 form-group">
    <div class="form-group row">
        <label for="cost" class="col-md-4 control-label"><strong>Cost:<span class="required" aria-required="true">* </span></strong></label>
        <div class="col-md-7">
            <input placeholder="Cost" class="form-control" id="cost" name="cost" type="text">
            <span class="error">{{ $errors->first('cost') }}</span>
        </div>
    </div>
</div>