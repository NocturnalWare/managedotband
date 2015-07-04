<!-- 
<link rel="stylesheet" href="{{public_path()}}/assets/bootstrap.min.css">
<link rel="stylesheet" href="{{public_path()}}/assets/fontawesome/css/font-awesome.min.css">
<link rel="stylesheet" href="{{public_path()}}/assets/etnoc.css">
<link rel="stylesheet" href="{{public_path()}}/assets/bootstrap-theme.min.css"> -->
<link rel="stylesheet" href="http://localhost/managedotband/public/assets/bootstrap.min.css">
<link rel="stylesheet" href="http://localhost/managedotband/public/assets/fontawesome/css/font-awesome.min.css">
<link rel="stylesheet" href="http://localhost/managedotband/public/assets/etnoc.css">
<link rel="stylesheet" href="http://localhost/managedotband/public/assets/bootstrap-theme.min.css">
<div style="overflow-x:hidden">
@include('layouts.master.publicnav')

<!-- Latest compiled and minified JavaScript -->
<script src="http://localhost/managedotband/public/assets/jquery/1.11.3/jquery.min.js"></script>
<!-- <script src="{{public_path()}}/assets/jquery/1.11.3/jquery.min.js"></script> -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

@yield('content')
</div>