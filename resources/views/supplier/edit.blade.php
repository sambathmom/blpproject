<div id="editSupplier" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title">Edit Supplier</h4>
            </div>
            <div class="modal-body">                                   
                 <form action="{{url('supplier/update/')}}" method="POST" >
                        <div class="row">
                                <div class="col-md-12 form-group">
                                    <div class="form-group row">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="supplier_id" id="identityEdit" value="" >
                                        <label for="supplierCompany" class="col-md-3 control-label"><strong>CompanyName: <span class="required" aria-required="true">* </span></strong></label>
                                        <div class="col-md-7">
                                            <input placeholder="CompanyName" class="form-control" id="supplierCompany" name="company_name" type="text" >
                                             <span class="error">{{ $errors->first('company_name') }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                    <div class="form-group row">
                                        <label for="supplierContact" class="col-md-3 control-label"><strong>Contact Person <span class="required" aria-required="true">* </span></strong></label>
                                        <div class="col-md-7">
                                            <input placeholder="Contact Person" class="form-control" id="supplierContact" name="contact_person" type="text" >
                                             <span class="error">{{ $errors->first('contact_person') }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                    <div class="form-group row">
                                        <label for="supplierTitle" class="col-md-3 control-label"><strong>Conatact Title <span class="required" aria-required="true">* </span></strong></label>
                                        <div class="col-md-7">
                                            <input placeholder="Conatact Title" class="form-control" id="supplierTitle" name="contact_title"  type="text">
                                             <span class="error">{{ $errors->first('contact_title') }}</span>
                                        </div>
                                
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                    <div class="form-group row">
                                        <label for="supplierEmail" class="col-md-3 control-label"><strong>Email<span class="required" aria-required="true">* </span></strong></label>
                                        <div class="col-md-7">
                                            <input placeholder="Email" class="form-control" id="supplierEmail" name="email" type="email">
                                             <span class="error">
                                                {{ $errors->first('email') }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                    <div class="form-group row">
                                        <label for="supplierPhone" class="col-md-3 control-label"><strong>Phone <span class="required" aria-required="true">* </span></strong></label>
                                        <div class="col-md-7">
                                            <input placeholder="Phone" class="form-control" id="supplierPhone" name="phone" type="text">
                                            <span class="error">
                                                {{ $errors->first('phone') }}
                                             </span>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-success" value="Update"></input>
                            <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
                        </div>
                </form>  
            </div>
        </div>
    </div>
</div>
