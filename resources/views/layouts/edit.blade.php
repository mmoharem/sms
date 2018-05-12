@extends('layouts.secure')

{{-- Web site Title --}}
@section('title')

<div class="panel panel-default">
    <div class="panel-heading">
        <h2>Edit.blade</h2>
    </div>
</div>

	{{ $title }}
@stop

{{-- Content --}}
@section('content')
    <!-- ./ notifications -->
	@include($type.'/_form')
@stop

@section('scripts')
<script>
</script>
@endsection