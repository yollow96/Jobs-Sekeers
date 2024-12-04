@extends('employer.layouts.app')
@section('title')
    {{ __('messages.jobs') }}
@endsection
@section('content')
    <div class="d-flex flex-column ">
        @include('flash::message')
        <livewire:employer-job-table/>
    </div>
    {{Form::hidden('indexEmployeeJobsData',true,['id'=>'indexEmployeeJobsData'])}}
    {{Form::hidden('statusArray',json_encode($statusArray),['id'=>'employerJobStatusArray'])}}
@endsection

