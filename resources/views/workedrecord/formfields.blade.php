<div class="col-md-12 form-group">
    <div class="form-group row">
        {{ csrf_field() }}
        <label for="laborCost" class="col-md-4 control-label"><strong>LaborCost name: <span class="required" aria-required="true">* </span></strong></label>
        <div class="col-md-7">
            <select name="lc_id"  id="laborCost" class="chzn-select chzn-rtl" tabindex="10">
                @foreach ($laborCosts as $laborCost) 
                <option value="{{$laborCost->lc_id}}">{{$laborCost->lc_name}}</option>
                @endforeach
            </select  class="chzn-select chzn-rtl" tabindex="10"> 
            {{ $errors->first('lc_id') }}
        </span>
        </div>
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 form-group">
    <div class="form-group row">
        <label for="staff" class="col-md-4 control-label"><strong>Staff name: <span class="required" aria-required="true">* </span></strong></label>
        <div class="col-md-7">
            <select style="width:350px;"  class="chzn-select chzn-rtl" tabindex="10" name="staff_id"  id="staff">
                @foreach ($staffs as $staff) 
                <option value="{{$staff->staff_id}}">{{$staff->first_name}}  {{$staff->middle_name}}{{$staff->last_name}}</option>
                @endforeach
            </select> 
            <span class="error">
                {{ $errors->first('staff_id') }}
            </span>
        </div>
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 form-group">
    <div class="form-group row">
        <label for="workType" class="col-md-4 control-label"><strong>Work type <span class="required" aria-required="true">* </span></strong></label>
        <div class="col-md-7">
            <select  name="wt_id"  id="workType" class="chzn-select chzn-rtl" tabindex="10">
                @foreach ($workTypes as $workType) 
                <option value="{{$workType->work_type_id}}" selected="">{{$workType->wt_name}}</option>
                @endforeach
            </select>  
            {{ $errors->first('wt_id') }}
        </div>
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 form-group">
    <div class="form-group row">
        <label for="memo" class="col-md-4 control-label"><strong>Memo<span class="required" aria-required="true">* </span></strong></label>
        <div class="col-md-7">
            <input placeholder="Memo" class="form-control" id="memo" name="memo"  type="text">
            <span class="error">
                 {{ $errors->first('qty') }}
            </span>
        </div>
    </div>   
</div>
<div class="col-xs-12 col-sm-12 col-md-12 form-group">
    <div class="form-group row">
        <label for="qty" class="col-md-4 control-label"><strong>Quantity<span class="required" aria-required="true">* </span></strong></label>
        <div class="col-md-7">
            <input placeholder="Quantity" class="form-control" id="qty" name="qty" type="text">
            <span class="error">
            {{ $errors->first('qty') }}
        </span>
        </div>
    </div>
</div>
