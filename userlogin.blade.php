<html>
<head>
<title>MULTIGRAPHICS Login
</title>
<style>
.content{
background-image:linear-gradient(to right,#C9D6FF,#E2E2E2);
height:600px;
}
</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
<header>
<nav class="navbar navbar-expand-lg navbar-light" style="background:#D76D77">
<a class="navbar-brand" href="/">RESTO</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
<div class="navbar-nav">
@if(Session::get('user'))
<a class="nav-item nav-link" href="/list">List</a>
<a class="nav-item nav-link" href="/add">Add</a>
@endif
<</div>
<div class="navbar-nav ml-auto">
@if(Session::get('user'))
<a class="nav-item nav-link" href="#">Welcome, {{Session::get('user')}}</a>
<a class="nav-item nav-link" href="/logout">Logout</a>
@else
<a class="nav-item nav-link active" href="/login">Login</a>
<a class="nav-item nav-link active" href="/register">Register</a>
@endif
</div>
</div>
</nav>
</header>
<div class="content d-flex justify-content-center">
@yield('content')
</div>
<footer class="container"></footer>
</body>
</html>
// <registration class="blade php"></registration>


@extends('layout')

@section('content')
<div class="col-sm-8">
<h3>Register User</h3>
@if(Session::get('register_status'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
{{Session::get('register_status')}}
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">×</span>
</button>
</div>
@endif
<form action="registerUser" method="post" return="false">
<div class="form-group">
<label>Name
<input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Enter Name" required>
</div>
@error('name')
<div class="alert alert-danger">{{ $message }}</div>
@enderror
@csrf
<div class="form-group">
<label>Email
<input type="text" name="email" value="{{ old('email') }}" class="form-control" placeholder="Enter Email" required>
</div>
@error('email')
<div class="alert alert-danger">{{ $message }}</div>
@enderror
<div class="form-group">
<label>Password
<input type="password" name="password" value="{{ old('password') }}" class="form-control" placeholder="Enter Password" required>
</div>
@error('password')
<div class="alert alert-danger">{{ $message }}</div>
@enderror
<div class="form-group">
<label>Confirm Password
<input type="password" name="confirm_password" value="{{ old('confirm_password') }}" class="form-control" placeholder="Confirm Password" required>
</div>
@error('confirm_password')
<div class="alert alert-danger">{{ $message }}</div>
@enderror
<div class="form-group">
<label>Mobile</label>
<input type="number" name="mobile" value="{{ old('mobile') }}" class="form-control" placeholder="Enter Mobile Number" required>
</div>
@error('mobile')
<div class="alert alert-danger">{{ $message }}</div>
@enderror
<button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
@endsection
// <login class="blade php"></login>

@extends('layout')

@section('content')
<div class="col-sm-8">
<h3>Login User</h3>
@if(Session::get('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
{{Session::get('error')}}
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">×</span>
</button>
</div>
@endif
<form action="loginUser" method="post">
@csrf
<div class="form-group">
<label>Email</label>
<input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Enter Email" required>
</div>
@error('email')
<div class="alert alert-danger">{{ $message }}</div>
@enderror
<div class="form-group">
<label>Password</label>
<input type="password" name="password" class="form-control" placeholder="Enter Password" required>
</div>
@error('password')
<div class="alert alert-danger">{{ $message }}</div>
@enderror
<button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
@endsection
