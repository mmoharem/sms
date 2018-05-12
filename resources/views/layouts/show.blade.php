@extends('layouts.secure')

{{-- Web site Title --}}
@section('title')

<div class="panel panel-default">
    <div class="panel-heading">
        <h2>Show.blade</h2>
    </div>
</div>

	{{ $title }}
@stop

{{-- Content --}}
@section('content')
<div class="row">
	<div class="col-md-12">
	    <div class="details">
		    @include($type.'/_details')
		</div>
	</div>
</div>
@stop