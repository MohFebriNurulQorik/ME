@if ( count($errors) > 0 || session()->has('errormsg') || !empty($errormsg) || !empty($errormsgs) )
<div class="alert alert-danger alert-dismissible fade show" role="alert">
@endif

@if ( session()->has('warningmsg') || !empty($warningmsg) || !empty($warningmsgs) )
<div class="alert alert-warning alert-dismissible fade show" role="alert">
@endif

@if ( session()->has('successmsg') || !empty($successmsg) || !empty($successmsgs) )
<div class="alert alert-success alert-dismissible fade show" role="alert">
@endif

	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>

	<h4 class="alert-heading">
	@if ( count($errors) > 0 || session()->has('errormsg') || !empty($errormsg) || !empty($errormsgs) )
	Error!
	@endif

	@if ( session()->has('warningmsg') || !empty($warningmsg) || !empty($warningmsgs) )
	Warning!
	@endif

	@if ( session()->has('successmsg') || !empty($successmsg) || !empty($successmsgs) )
	Well done!
	@endif
	</h4>

	@if (count($errors) > 0)
	<ul>
    	@foreach ($errors->all() as $error)
    	<li>{!! $error !!}</li>
    	@endforeach
    </ul>
	@endif

	@if (session()->has('errormsg'))
	<p>{!! session()->get('errormsg') !!}</p>
	@endif

	@if (!empty($errormsg))
	<p>{{ $errormsg }}</p>
	@endif

	@if (!empty($errormsgs))
	<ul>
		@foreach ($errormsgs as $msg)
		<li>{!! $msg !!}</li>
		@endforeach
	</ul>
	@endif

	@if (session()->has('warningmsg'))
	<p>{!! session()->get('warningmsg') !!}</p>
	@endif

	@if (!empty($warningmsg))
	<p>{!! $warningmsg !!}</p>
	@endif

	@if (!empty($warningmsgs))
	<ul>
		@foreach ($warningmsgs as $msg)
		<li>{!! $msg !!}</li>
		@endforeach
	</ul>
	@endif

	@if (session()->has('successmsg'))
	<p>{!! session()->get('successmsg') !!}</p>
	@endif

	@if (!empty($successmsg))
	<p>{!! $successmsg !!}</p>
	@endif

	@if (!empty($successmsgs))
	<ul>
		@foreach ($successmsgs as $msg)
		<li>{!! $msg !!}</li>
		@endforeach
	</ul>
	@endif

	@if ($msgs = Session::get('msgs'))
    @foreach ($msgs as $msg)
    @if (!empty($msg['successmsgs']))
    <h4 class="alert-heading">Well done!</h4>
	<ul>
		@foreach ($msg['successmsgs'] as $this_msg)
		<li>{!! $this_msg !!}</li>
		@endforeach
	</ul>
    @endif
    @if (!empty($msg['warningmsgs']))
    <h4 class="alert-heading">Warning!</h4>
    <ul>
		@foreach ($msg['warningmsgs'] as $this_msg)
		<li>{!! $this_msg !!}</li>
		@endforeach
	</ul>
    @endif
    @if (!empty($msg['errormsgs']))
    <h4 class="alert-heading">Error!</h4>
    <ul>
		@foreach ($msg['errormsgs'] as $this_msg)
		<li>{!! $this_msg !!}</li>
		@endforeach
	</ul>
    @endif
    @endforeach
    @endif

@if ( count($errors) > 0 || session()->has('errormsg') || !empty($errormsg) || !empty($errormsgs) )
</div>
@endif

@if ( session()->has('warningmsg') || !empty($warningmsg) || !empty($warningmsgs) )
</div>
@endif

@if ( session()->has('successmsg') || !empty($successmsg) || !empty($successmsgs) )
</div>
@endif

                    
@if ($msgs = Session::get('msgs'))
@foreach ($msgs as $msg)
@if (!empty($msg['successmsgs']))
<div class="alert alert-success alert-dismissible fade show" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	<span aria-hidden="true">&times;</span>
</button>
<h4 class="alert-heading">Well done!</h4>
<ul>
	@foreach ($msg['successmsgs'] as $this_msg)
	<li>{!! $this_msg !!}</li>
	@endforeach
</ul>
@endif
@if (!empty($msg['warningmsgs']))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	<span aria-hidden="true">&times;</span>
</button>
<h4 class="alert-heading">Warning!</h4>
<ul>
	@foreach ($msg['warningmsgs'] as $this_msg)
	<li>{!! $this_msg !!}</li>
	@endforeach
</ul>
@endif
@if (!empty($msg['errormsgs']))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	<span aria-hidden="true">&times;</span>
</button>
<h4 class="alert-heading">Error!</h4>
<ul>
	@foreach ($msg['errormsgs'] as $this_msg)
	<li>{!! $this_msg !!}</li>
	@endforeach
</ul>
@endif
@endforeach
@endif

                                