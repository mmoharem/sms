@extends('layouts.secure')

{{-- Web site Title --}}
@section('title')
    {{ $title }}
@stop

{{-- Content --}}
@section('content')
    <link rel="stylesheet" href="{{ asset('css/c3.min.css') }}">
    <script type="text/javascript" src="{{ asset('js/d3.v3.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/d3.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/c3.min.js')}}"></script>
    <div class="row">
        <div class="col-sm-6">
            @include('charts.departments_students')
        </div>
        <div class="col-sm-6">
            @include('charts.student_gender')
        </div>
    </div>
    <div class=" clearfix">
        @if($user->authorized($type.'.create'))
            <div class="pull-right">
                <a href="{{ url($type.'/create') }}" class="btn btn-sm btn-primary">
                    <i class="fa fa-plus-circle"></i> {{ trans('table.new') }}</a>
                <a href="{{ url($type.'/import') }}" class="btn btn-sm btn-success">
                    <i class="fa fa-upload"></i> {{trans('student.import_student')}}
                </a>
                <a href="{{ url($type.'/export') }}" class="btn btn-sm btn-warning">
                    <i class="fa fa-download"></i> {{trans('dashboard.export')}}
                </a>
            </div>
        @endif
    </div>
    @include('student.filter')
    <div class="row showajax">
        <table id="data" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>{{ trans('visitor_student_card.student_no') }}</th>
                <th>{{ trans('student.full_name') }}</th>
                <th>{{ trans('student.email') }}</th>
                <th>{{ trans('student.session') }}</th>
                <th>{{ trans('student.order') }}</th>
                <th>{{ trans('table.actions') }}</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
@stop
@section('scripts')
    <script>
        $('.filter').click(function (e) {
            e.stopPropagation();
            let first_name = ($('#first_name').val() == '') ? '*' : $('#first_name').val();
            let last_name = ($('#last_name').val() == '') ? '*' : $('#last_name').val();
            let student_no = ($('#student_no').val() == '') ? '*' : $('#student_no').val();
            let country_id = ($('#country_id').val() == '') ? '*' : $('#country_id').val();
            let session_id = ($('#session_id').val() == '') ? '*' : $('#session_id').val();
            let section_id = ($('#section_id').val() == '') ? '*' : $('#section_id').val();
            let level_id = ($('#level_id').val() == '') ? '*' : $('#level_id').val();
            let entry_mode_id = ($('#entry_mode_id').val() == '') ? '*' : $('#entry_mode_id').val();
            let gender = ($('#gender').val() == '') ? '*' : $('#gender').val();
            let marital_status_id =($('#marital_status_id').val() == '') ? '*' :  $('#marital_status_id').val();
            let dormitory_id = ($('#dormitory_id').val() == '') ? '*' : $('#dormitory_id').val();
            $('#data').DataTable().ajax.url('{!! url($type.'/data') !!}/' + first_name + '/' + last_name + '/' +
                student_no + '/' + country_id + '/' + session_id + '/' + section_id + '/' + level_id + '/' +
                entry_mode_id + '/' + gender + '/' + marital_status_id + '/' + dormitory_id);
            $('#data').DataTable().ajax.reload(null, false);

            return false;
        });
    </script>
@stop
