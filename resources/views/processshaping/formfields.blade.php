<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
<input type ="hidden" value="{{ Auth::user()->id }}"  name="user_id">

<div class="col-xs-12 col-sm-12 col-md-12 form-group">
    <div class="form-group row">
        <label for="staff" class="col-md-4 control-label"><strong>Staff:<span class="required" aria-required="true">* </span></strong></label>
        <div class="col-md-7">
            <select style="width:350px;"  class="chzn-select chzn-rtl" tabindex="10" name="staff_id"  id="staff">
                @foreach ($staffs as $staff) 
                    <option value="{{$staff->staff_id}}">{{$staff->first_name}}  {{$staff->middle_name}}{{$staff->last_name}}</option>
                @endforeach
            </select> 
        </div>

    </div>
</div>

<div class="col-md-12 form-group">
    <div class="form-group row">
        <label for="processMaterial" class="col-md-4 control-label"><strong>Process material:<span class="required" aria-required="true">* </span></strong></label>
        <div class="col-md-7">
            <select style="width:350px;"  class="chzn-select chzn-rtl" tabindex="10" name="pm_id"  id="processMaterial">
                @foreach ($processMaterails as $processMaterail) 
                    <option value="{{$processMaterail->pm_id}}">{{$processMaterail->pm_name}}</option>
                @endforeach
            </select> 
        </div>
    </div>
</div> 

<div class="col-xs-12 col-sm-12 col-md-12 form-group">
    <div class="form-group row">
        <label for="grade" class="col-md-4 control-label"><strong>Grade:<span class="required" aria-required="true">* </span></strong></label>
        <div class="col-md-7">
            <select  name="grade_id"  id="grade" class="chzn-select chzn-rtl" tabindex="10">
                @foreach ($grades as $grade) 
                    <option value="{{$grade->grade_id}}" selected="">{{$grade->grade_name}}</option>
                @endforeach
            </select>  
        </div>
    </div>
</div>

<div class="col-md-12 form-group">
    <div class="form-group row">
        <label for="shapProduct" class="col-md-4 control-label"><strong> Shap product name:<span class="required" aria-required="true">* </span></strong></label>
        <div class="col-md-7">
            {!! Form::text('sp_name', null, array('placeholder' => 'Shap product name','class' => 'form-control', 'id' => 'shapProduct')) !!}
            <span class="error">{{ $errors->first('sp_name') }}</span>
        </div>  
    </div>
</div>

<div class="col-md-12 form-group">
    <div class="form-group row">
        <label for="qty" class="col-md-4 control-label"><strong>Quantity:<span class="required" aria-required="true">* </span></strong></label>
        <div class="col-md-7">
            {!! Form::text('qty', null, array('placeholder' => 'Quantity','class' => 'form-control', 'id' => 'qty')) !!}
            <span class="error">{{ $errors->first('qty') }}</span>
        </div>
    </div>
</div>

<div class="col-md-12 form-group">
    <div class="form-group row">
        <label for="cost" class="col-md-4 control-label"><strong>Cost:<span class="required" aria-required="true">* </span></strong></label>
        <div class="col-md-7">
            {!! Form::text('cost', null, array('placeholder' => 'Cost','class' => 'form-control', 'id' => 'cost')) !!}
            <span class="error">{{ $errors->first('cost') }}</span>
        </div>
    </div>
</div>