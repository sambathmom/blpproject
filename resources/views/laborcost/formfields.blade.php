<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
<div class="col-md-12 form-group">
    <div class="form-group row">
        <label for="laborCostName" class="col-md-4 control-label"><strong>Labor cost name: <span class="required" aria-required="true">* </span></strong></label>
        <div class="col-md-7">
            <input type="text" name="lc_name" class="form-control" id="laborCostName">
        </div>
    </div>
</div>

<div class="col-md-12 form-group">
    <div class="form-group row">
        <label for="laborCostName" class="col-md-4 control-label"><strong>Grade: <span class="required" aria-required="true">* </span></strong></label>
        <div class="col-md-7">
            <select class="form-control" id="laborCostGrade" name="grade_id">
                @foreach ($grades as $grade)
                    <option value="{{$grade->grade_id}}">{{$grade->grade_name}}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>

<div class="col-md-12 form-group">
    <div class="form-group row">
        <label for="laborCostWorkType" class="col-md-4 control-label"><strong>Work type: <span class="required" aria-required="true">* </span></strong></label>
        <div class="col-md-7">
            <select class="form-control" tabindex="10"  id="laborCostWorkType" name="work_type_id">
                @foreach ($workTypes as $workType)
                    <option value="{{$workType->work_type_id}}">{{$workType->wt_name}}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>

<div class="col-md-12 form-group">
    <div class="form-group row">
        <label for="qty" class="col-md-4 control-label"><strong>Quantity: <span class="required" aria-required="true">* </span></strong></label>
        <div class="col-md-7">
            <input placeholder="Quantity" class="form-control" id="qty" name="qty" type="text">
            <span class="error">{{ $errors->first('qty') }}</span>
        </div>
    </div>
</div>

<div class="col-md-12 form-group">
    <div class="form-group row">
        <label for="cost" class="col-md-4 control-label"><strong>Cost: <span class="required" aria-required="true">* </span></strong></label>
        <div class="col-md-7">
            <input placeholder="cost" class="form-control" id="cost" name="cost" type="text">
            <span class="error">{{ $errors->first('cost') }}</span>
        </div>
    </div>
</div>