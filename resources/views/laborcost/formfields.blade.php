<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
<div class="col-md-12 form-group">
    <div class="form-group row">
        <label for="laborCostName" class="col-md-4 control-label"><strong>Labor cost name: <span class="required" aria-required="true">* </span></strong></label>
        <div class="col-md-7">
            {!! Form::text('lc_name', null, array('placeholder' => 'Name','class' => 'form-control', 'id' => 'laborCostName')) !!}
            <span class="error">{{ $errors->first('lc_name') }}</span>
        </div>
    </div>
</div>

<div class="col-md-12 form-group">
    <div class="form-group row">
        <label for="laborCostName" class="col-md-4 control-label"><strong>Grade: <span class="required" aria-required="true">* </span></strong></label>
        <div class="col-md-7">
            <select id="laborCostGrade" name="grade_id" class="chzn-select chzn-rtl" tabindex="10">
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
            <select tabindex="10"  id="laborCostWorkType" name="wt_id" class="chzn-select chzn-rtl">
                @foreach ($workTypes as $workType)
                    <option value="{{$workType->wt_id}}">{{$workType->wt_name}}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>

<div class="col-md-12 form-group">
    <div class="form-group row">
        <label for="qty" class="col-md-4 control-label"><strong>Quantity: <span class="required" aria-required="true">* </span></strong></label>
        <div class="col-md-7">
            {!! Form::text('qty', null, array('placeholder' => 'Quantity','class' => 'form-control', 'id' => 'qty')) !!}
            <span class="error">{{ $errors->first('qty') }}</span>
        </div>
    </div>
</div>

<div class="col-md-12 form-group">
    <div class="form-group row">
        <label for="cost" class="col-md-4 control-label"><strong>Cost: <span class="required" aria-required="true">* </span></strong></label>
        <div class="col-md-7">
            {!! Form::text('cost', null, array('placeholder' => 'cost','class' => 'form-control', 'id' => 'cost')) !!}
            <span class="error">{{ $errors->first('cost') }}</span>
        </div>
    </div>
</div>