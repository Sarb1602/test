<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px;
  border: none;
  cursor: pointer;
  width: 20%;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
</head>
<body>

<h2 class="text-center">Login</h2>

<form method="post" action="{{ route('login.perform') }}">
  @csrf
  @if(session('success'))
     <div class="alert alert-success">
          {{ session('success') }}
    </div>
    @endif
        @if(session('error'))
  <div class="alert alert-danger">
      {{ session('error') }}
  </div>
  @endif
  <!-- <div class="imgcontainer">
    <img src="img_avatar2.png" alt="Avatar" class="avatar">
  </div> -->

  <div class="container">
    <!-- <label for="uname"><b>Username</b></label> -->
    <input type="text" placeholder="Enter Email" name="username" value="{{ old('username') }}" required>
     @if ($errors->has('username'))
                <span class="text-danger text-left">{{ $errors->first('username') }}</span>
            @endif
    <!-- <label for="psw"><b>Password</b></label> -->
    <input type="password" placeholder="Enter Password" name="password" value="{{ old('password') }}" required>
           @if ($errors->has('password'))
                <span class="text-danger text-left">{{ $errors->first('password') }}</span>
            @endif
    <center><button type="submit" name="submit">Login</button></center>
   <!--  <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label> -->
  </div>

 <!--  <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn">Cancel</button>
    <span class="psw">Forgot <a href="#">password?</a></span>
  </div> -->
</form>
@if(isset ($errors) && count($errors) > 0)
    <div class="alert alert-warning" role="alert">
        <ul class="list-unstyled mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(Session::get('success', false))
    <?php $data = Session::get('success'); ?>
    @if (is_array($data))
        @foreach ($data as $msg)
            <div class="alert alert-warning" role="alert">
                <i class="fa fa-check"></i>
                {{ $msg }}
            </div>
        @endforeach
    @else
        <div class="alert alert-warning" role="alert">
            <i class="fa fa-check"></i>
            {{ $data }}
        </div>
    @endif
@endif
</body>
</html>
