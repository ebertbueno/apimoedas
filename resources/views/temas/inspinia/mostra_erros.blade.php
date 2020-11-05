@if ($errors->any())
<div class="alert alert-warning">
	@foreach ($errors->all() as $error)
	{!! trataTraducoes($error,'pt-br') !!}
	<br/>
	@endforeach
</div>
@endif