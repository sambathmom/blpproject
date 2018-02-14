<div class="col-md-12 form-group">
    <div class="form-group row">
            <label for="pmName" class="col-md-4 control-label"><strong>Process Material Name <span class="required" aria-required="true">* </span></strong></label>
            <div class="col-md-7">
                    <select style="width:350px;"  class="chzn-select chzn-rtl" tabindex="10" name="pm_id"  id="pmName">
                        @foreach ($processMatials as $processMatial) 
                            <option value="{{$processMatial->pm_id}}">{{$processMatial->pm_name}}</option>
                        @endforeach
                    </select> 
                <span class="error">{{ $errors->first('rp_name') }}</span>
            </div>
        </div>
    </div>  
    <div class="col-md-12 form-group">
        <div class="form-group row">
            <label for="ppName" class="col-md-4 control-label"><strong> Process Product Name<span class="required" aria-required="true">* </span></strong></label>
            <div class="col-md-7">
                <input type="text" name="pp_name" class="form-control" id="ppName" >
                <span class="error">{{ $errors->first('pp_name') }}</span>
            </div>
        </div>
    </div>
    <div class="col-md-12 form-group">
        <div class="form-group row">
            <label for="ppQty" class="col-md-4 control-label"><strong>Quantity<span class="required" aria-required="true">* </span></strong></label>
            <div class="col-md-7">
                <input type="text" name="qty" class="form-control" id="ppQty">
                <span class="error">{{ $errors->first('pm_name') }}</span>
            </div>
        </div>
    </div>
    <div class="col-md-12 form-group">
        <div class="form-group row">
            <label for="ppCost" class="col-md-4 control-label"><strong>Cost<span class="required" aria-required="true">* </span></strong></label>
            <div class="col-md-7">
                <input type="text" name="cost" class="form-control" id="ppCost">
                <span class="error">{{ $errors->first('pm_name') }}</span>
            </div>
        </div>
</div>