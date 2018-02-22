<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
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
                @foreach ($supplier as $supplier) 
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
            <input placeholder="RawMaterialName" class="form-control" id="rawName" name="rm_name"  type="text">
        </div>
    </div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12 form-group">
    <div class="form-group row">
        <label for="rawQty" class="col-md-4 control-label"><strong>Quantity<span class="required" aria-required="true">* </span></strong></label>
        <div class="col-md-7">
            <input placeholder="Quantity" class="form-control" id="proQty" name="qty" type="text">
            <span class="error">{{ $errors->first('qty') }}</span>
        </div>
    </div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12 form-group">
    <div class="form-group row">
        <label for="rawCost" class="col-md-4 control-label"><strong>Cost <span class="required" aria-required="true">* </span></strong></label>
        <div class="col-md-7">
            <input placeholder="Cost" class="form-control" id="proCost" name="cost" type="text">
            <span class="error">{{ $errors->first('cost') }}</span>
        </div>
    </div>
</div>