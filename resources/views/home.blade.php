@extends('layout/app')

@section('content')
@include('layout/navbar')

<div class="norm-stree">
  <div>
    <h2>Overview Data</h2>
  </div>
  <div>
    <button type="button" class="btn btn-outline-info" style="margin-left: 5px">
      Go to Statistical Module View
    </button>
    <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#moduleModal">
      Add module
    </button>
  </div>
</div>
@if(session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif
@error('picture')
<div class="alert alert-danger">{{ $message }}</div>
@enderror
  <div class="container-chart">
    <div class="barcanva-container">
      <canvas id="barCanvas" aria-label="chart" role="img" style="height:90vh; width:40vw">
    </div>
    <div class="linecanva-container">
      <canvas id="lineCanvas" aria-label="chart" role="img" style="height:90vh; width:40vw">
    </div>
    <div class="piecanva-container">
      <canvas id="pieCanvas" aria-label="chart" role="img" style="height:90vh; width:40vw">
    </div>
    <div>
      <canvas id="radarCanvas" aria-label="chart" role="img" style="height:90vh; width:40vw">
    </div>
  </div>

</canvas>
  <div class="modal fade" id="moduleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add module</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{ route('module.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form_module">
                    <div class="form-group">
                        <label for="name">Module Name </label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nom du module">
                        @error('name')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">ModuleDescription :</label>
                        <textarea class="form-control" id="description" name="description" placeholder="Description du module"></textarea>
                        @error('description')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="picture">Module Picture  :</label>
                        <input type="file" class="form-control" id="picture" name="picture" >
                        @error('picture')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="modal-footer d-grid gap-2 d-md-block">
                      <button type="submit" class="btn btn-outline-primary" style="width: 100%">Save</button>
                    </div>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
@endsection