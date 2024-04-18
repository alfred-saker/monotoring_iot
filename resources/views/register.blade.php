@extends('layout/app')

@section('content')
@include('layout/navbar')
<div class="form-register"> 
    <form method="POST" action="{{ route('register.save') }}">
        @csrf
        <div class="form_module">
            <div class="form-group">
                <label for="name">Name </label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter your username">
                @error('name')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email </label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter a valid email">
                @error('email')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Password :</label>
                <input type="password" class="form-control" id="picture" name="password" placeholder="Enter strong password" >
                @error('password')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="d-grid gap-2 d-md-block">
              <button type="submit" class="btn btn-outline-primary" style="width: 100%">Submit</button>
            </div>
            <p>I have already account. <a href="{{ route('login')}}">Sign in </a></p>
        </div>
    </form>
</div>

@endsection