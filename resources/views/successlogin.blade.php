<!DOCTYPE html>
<html>
 <head>
  <title>Simple Login System in Laravel</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style type="text/css">
   .box{
    width:600px;
    margin:0 auto;
    border:1px solid #ccc;
   }
  </style>
 </head>
 <body>
  <br />
  <div class="container box">
   <h3 align="center">Dental Health Records Management</h3><br />

   @if(isset(Auth::user()->username))
    <div class="alert alert-danger success-block">
     <strong>Welcome {{ Auth::user()->username }}</strong>
     <br />
     <a href="{{ url('/main/logout') }}">Logout</a>
    </div>
   @else
    <script>window.location = "/main";</script>
   @endif
   
   <br />
  </div>
 </body>
</html>