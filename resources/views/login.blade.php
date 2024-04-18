@extends('layout/app')

@section('content')
@include('layout/navbar')
<div class="form-register"> 
    @if(session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    @error('errors')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <form method="POST" action="{{ route('login.save') }}">
        @csrf
        <div class="form_module">
            <div class="form-group">
                <label for="email">Email </label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
                @error('email')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Password :</label>
                <input type="password" class="form-control" id="picture" name="password" placeholder="Enter your password" >
                @error('password')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="d-grid gap-2 d-md-block">
              <button type="submit" class="btn btn-outline-primary" style="width: 100%">Save</button>
            </div>
            <p>Not account? <a href="{{ route('register')}}">Sign up </a></p>
        </div>
    </form>
</div>

@endsection