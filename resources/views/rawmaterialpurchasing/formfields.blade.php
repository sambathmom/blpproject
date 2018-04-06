<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
<input type="hidden" name="user_id" class="form-control" id="user" value="{{ Auth::user()->id }}">
<div class="col-md-12 form-group">
    <div class="form-group row">
        <label for="staff" class="col-md-4 control-label"><strong>Staff name: <span class="required" aria-required="true">* </span></strong></label>
        <div class="col-md-7">
            <select name="staff_id"  id="staff" class="chzn-select chzn-rtl" tabindex="10">
                @foreach ($staffs as $staff) 
                    <option value="{{$staff->staff_id}}">{{$staff->first_name}}  {{$staff->middle_name}}{{$staff->last_name}}</option>
                @endforeach
            </select> 
        </div>
    </div>
</div>

<div class="col-md-12 form-group">
    <div class="form-group row">
        <label for="supplierId" class="col-md-4 control-label"><strong>Supplier name: <span class="required" aria-required="true">* </span></strong></label>
        <div class="col-md-7">
            <select name="supplier_id"  id="supplier" class="chzn-select chzn-rtl" tabindex="10">
                @foreach ($suppliers as $supplier) 
                    <option value="{{$supplier->supplier_id}}">{{$supplier->company_name}}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12 form-group">
    <div class="form-group row">
        <label for="rawGrade" class="col-md-4 control-label"><strong>Grade name<span class="required" aria-required="true">* </span></strong></label>
        <div class="col-md-7">
            <select  name="grade_id"  id="rawGrade" class="chzn-select chzn-rtl" tabindex="10">
                @foreach ($grades as $grade) 
                    <option value="{{$grade->grade_id}}" selected="">{{$grade->grade_name}}</option>
                @endforeach
            </select>  
        </div>
    </div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12 form-group">
    <div class="form-group row">
        <label for="rawName" class="col-md-4 control-label"><strong>Raw material name<span class="required" aria-required="true">* </span></strong></label>
        <div class="col-md-7">
            {!! Form::text('rm_name', null, array('placeholder' => 'Raw material name','class' => 'form-control', 'id' => 'rawName')) !!}
            <span class="error">{{ $errors->first('rm_name') }}</span>
        </div>
    </div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12 form-group">
    <div class="form-group row">
        <label for="rawQty" class="col-md-4 control-label"><strong>Quantity<span class="required" aria-required="true">* </span></strong></label>
        <div class="col-md-7">
            {!! Form::text('qty', null, array('placeholder' => 'Quantity','class' => 'form-control', 'id' => 'proQty')) !!}
            <span class="error">{{ $errors->first('qty') }}</span>
        </div>
    </div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12 form-group">
    <div class="form-group row">
        <label for="rawCost" class="col-md-4 control-label"><strong>Cost <span class="required" aria-required="true">* </span></strong></label>
        <div class="col-md-7">
            {!! Form::text('cost', null, array('placeholder' => 'Cost','class' => 'form-control', 'id' => 'proCost')) !!}
            <span class="error">{{ $errors->first('cost') }}</span>
        </div>
    </div>
</div>