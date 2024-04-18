@extends('layout/app')

@section('content')
@include('layout/navbar')
@foreach ($module as $modules)
    
@endforeach
@if(session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif

<div class="form_detail">
    <form action="{{ route('history.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="module">Module:</label>
            <select name="module_id" id="" class="form-control">
                <option value="" selected>Please select module detail</option>
                @foreach ($module as $modules)
                    <option value="{{$modules->id}}" >{{$modules->module_name}}</option>
                @endforeach
            </select>
            @error('state')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="measurement_value">Measurement Value:</label>
            <input type="text" name="measurement_value" class="form-control" id="measurement_value" value="{{$random_measurement_value}}">
            @error('measurement_value')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="state">State:</label>
            <select name="state" id="" class="form-control">
                <option value="In progress" selected>In progress</option>
                <option value="Suspended">Suspended</option>
                <option value="Pending">Pending</option>
            </select>
            @error('state')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="data_sent">Data Sent:</label>
            <input type="text" name="data_sent" class="form-control" id="data_sent" value="{{$random_data_send}}" >
            @error('data_send')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-outline-primary" style="width:100%">Submit</button>
    </form>
</div>
@endsection
