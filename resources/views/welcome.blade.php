<!-- <!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
    <body>
      <div id="app">
          <router-view></router-view>
      </div>
      <script src="{{asset('js/app.js')}}"></script>
    </body>
</html> -->


@extends('layouts.app')
@section('content')
    <nav class="navbar-light bg-light">
        <div class="container mx-auto flex-start">
            <router-link to='/' exact>Home</router-link>
            <router-link to='/about'>About</router-link>
            <router-link to='/profile'>Profile</router-link>

            <router-link to='/login'>Login</router-link>
            <router-link to='/register'>Register</router-link>
        </div>
    </nav>
    <div>
        <div class="container mx-auto">
            <router-view></router-view>
        </div>
    </div>
@endsection