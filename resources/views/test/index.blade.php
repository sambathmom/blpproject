{{ Form::open(['url' => 'foo/bar', 'method' => 'POST','files' => true]) }}
	@foreach ($use as $use)
	{{  Form::token() }}
	{{	Form::text('text','Input Name',['class' =>'test b'])}} 
	{{  Form::text('email','placeholder','example@gmail.com') }}
	{{  Form::model($use, ['url' => ['test/update', $use->work_type_id]]) }}
	@endforeach
{!! Form::close() !!}
