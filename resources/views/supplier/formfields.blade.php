<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
<div class="col-md-12 form-group">
    <div class="form-group row">
        <label for="supplierCompany" class="col-md-4 control-label"><strong>Company name: <span class="required" aria-required="true">* </span></strong></label>
        <div class="col-md-7">
            <input placeholder="CompanyName" class="form-control" id="supplierCompany" name="company_name" type="text" >
            <span class="error">{{ $errors->first('company_name') }}</span>
        </div>
    </div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12 form-group">
    <div class="form-group row">
        <label for="supplierContact" class="col-md-4 control-label"><strong>Contact person <span class="required" aria-required="true">* </span></strong></label>
        <div class="col-md-7">
            <input placeholder="Contact Person" class="form-control" id="supplierContact" name="contact_person" type="text" >
            <span class="error">{{ $errors->first('contact_person') }}</span>
        </div>
    </div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12 form-group">
    <div class="form-group row">
        <label for="supplierTitle" class="col-md-4 control-label"><strong>Conatact title <span class="required" aria-required="true">* </span></strong></label>
        <div class="col-md-7">
            <input placeholder="Conatact Title" class="form-control" id="supplierTitle" name="contact_title"  type="text">
            <span class="error">{{ $errors->first('contact_title') }}</span>
        </div>
    </div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12 form-group">
    <div class="form-group row">
        <label for="supplierEmail" class="col-md-4 control-label"><strong>Email<span class="required" aria-required="true">* </span></strong></label>
        <div class="col-md-7">
            <input placeholder="Email" class="form-control" id="supplierEmail" name="email" type="email">
            <span class="error">{{ $errors->first('email') }}</span>
        </div>
    </div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12 form-group">
    <div class="form-group row">
        <label for="supplierPhone" class="col-md-4 control-label"><strong>Phone <span class="required" aria-required="true">* </span></strong></label>
        <div class="col-md-7">
            <input placeholder="Phone" class="form-control" id="supplierPhone" name="phone" type="text">
            <span class="error">{{ $errors->first('phone') }}</span>
        </div>
    </div>
</div>