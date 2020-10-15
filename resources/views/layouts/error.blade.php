@if (count($errors) > 0)
	<div class="alert alert-danger">
	    <ul>
	        @foreach ($errors->all() as $error)
	            <li><i class="fa fa-exclamation-triangle"></i> {{ $error }}</li>
	        @endforeach
	    </ul>
	</div>
@endif
