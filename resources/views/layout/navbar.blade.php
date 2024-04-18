
<nav class="navbar navbar-dark bg-dark">
    <div class="main">
        <div>
            <a class="navbar-brand" href="{{ route('home')}}">
                <h2>MONOTORING IOT MODULE</h2>
            </a>
        </div>
        <div style="font-size:25px">
            @if(auth()->user())
                Welcome, <span style="color: white;font-size:30px">{{ auth()->user()->name}}</span>
            @endif
        </div>
        <div>
            @if(auth()->user())
                <a href="{{route('logout')}}" class="btn btn-outline-danger">Logout</a>
            @else
                <a href="{{route('login')}}" class="btn btn-outline-danger">Connexion</a>
                <a href="{{route('register')}}" class="btn btn-outline-primary">Register</a>
            @endif
            
        </div>
    </div>
  </nav>