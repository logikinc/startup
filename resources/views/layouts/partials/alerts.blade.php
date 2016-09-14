@if ( session()->has('info'))
    <div class="alert autoclose alert-info" role-"alert">
        <button type="button" class="close" data-dismiss="alert">x</button>
        {{ session()->get('info') }}
    </div>
@endif

@if ( session()->has('danger'))
    <div class="alert autoclose alert-danger" role-"alert">
        <button type="button" class="close" data-dismiss="alert">x</button>
        {{ session()->get('danger') }}
    </div>
@endif

@if ( session()->has('success'))
	<div class="alert autoclose alert-success">
		<button type="button" class="close" data-dismiss="alert">x</button>
		{{ session()->get('success') }}
	</div>
@endif

@if ( session()->has('warning'))
	<div class="alert autoclose alert-warning">
		<button type="button" class="close" data-dismiss="alert">x</button>
		{{ session()->get('warning') }}
	</div>
	@endif