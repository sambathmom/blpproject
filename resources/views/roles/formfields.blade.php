<div class="col-md-12 form-group">
    <div class="form-group row">
        <label class="col-md-4 control-label"><strong>Name: <span class="required" aria-required="true">* </span></strong></label>
        <div class="col-md-7">
            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
        </div>
    </div>
</div>

<div class="col-md-12 form-group">
    <div class="form-group row">
        <label class="col-md-4 control-label"><strong>Display name: <span class="required" aria-required="true">* </span></strong></label>
        <div class="col-md-7">
            {!! Form::text('display_name', null, array('placeholder' => 'Disply name','class' => 'form-control')) !!}
        </div>
    </div>
</div>

<div class="col-md-12 form-group">
    <div class="form-group row">
        <label class="col-md-4 control-label"><strong>Description: <span class="required" aria-required="true">* </span></strong></label>
        <div class="col-md-7">
            {!! Form::textarea('description', null, array('placeholder' => 'Description','class' => 'form-control','style'=>'height:100px')) !!}
        </div>
    </div>
</div>

<div class="col-md-12 form-group">
    <div class="form-group row">
        <label class="col-md-4 control-label"><strong>Permissions: <span class="required" aria-required="true">* </span></strong></label>
        <div class="col-md-7">
            @foreach($permission as $value)
            <div class="col-md-4">{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
            {{ $value->display_name }}</div>
            @endforeach
        </div>
    </div>
</div>