<!-- 
<link rel="stylesheet" href="{{public_path()}}/assets/bootstrap.min.css">
<link rel="stylesheet" href="{{public_path()}}/assets/fontawesome/css/font-awesome.min.css">
<link rel="stylesheet" href="{{public_path()}}/assets/etnoc.css">
<link rel="stylesheet" href="{{public_path()}}/assets/bootstrap-theme.min.css"> -->
<link rel="stylesheet" href="http://localhost/managedotband/public/assets/bootstrap.min.css">
<link rel="stylesheet" href="http://localhost/managedotband/public/assets/fontawesome/css/font-awesome.min.css">
<link rel="stylesheet" href="http://localhost/managedotband/public/assets/etnoc.css">
<link rel="stylesheet" href="http://localhost/managedotband/public/assets/bootstrap-theme.min.css">
<style>
    body {
      margin:0;
      width: 100%;
      font-family:'Lato', sans-serif;
      text-align:center;
      color: #ffffff;
        background: -webkit-gradient(radial, top center, 0px, top center, 100%, , color-stop(0%, rgba(99,3,35,1)), color-stop(100%, rgba(41,8,20,1)));
        background: -webkit-radial-gradient(top center, ellipse cover, rgba(99,3,35,1) 0%, rgba(41,8,20,1) 100%);
        background: rgba(99,3,35,1);
        background: -moz-radial-gradient(top center, ellipse cover, rgba(99,3,35,1) 0%, rgba(7,0,16,1) 100%);
        background: -webkit-gradient(radial, top center, 0px, top center, 100%, , color-stop(0%, rgba(99,3,35,1)), color-stop(100%, rgba(7,0,16,1)));
        background: -webkit-radial-gradient(top center, ellipse cover, rgba(99,3,35,1) 0%, rgba(7,0,16,1) 100%);
        background: -o-radial-gradient(top center, ellipse cover, rgba(99,3,35,1) 0%, rgba(7,0,16,1) 100%);
        background: -ms-radial-gradient(top center, ellipse cover, rgba(99,3,35,1) 0%, rgba(7,0,16,1) 100%);
        background: radial-gradient(ellipse at top center, rgba(99,3,35,1) 0%, rgba(7,0,16,1) 100%);
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#036323', endColorstr='#072110', GradientType=1 );
        background-repeat: no-repeat;
        background-attachment: fixed;
    }
    a{
    	text-decoration:none;
    	color:#fff;
    }
</style>

<body>
<div style="overflow-x:hidden">
@include('layouts.master.publicnav')

<!-- Latest compiled and minified JavaScript -->
<script src="http://localhost/managedotband/public/assets/jquery/1.11.3/jquery.min.js"></script>
<!-- <script src="{{public_path()}}/assets/jquery/1.11.3/jquery.min.js"></script> -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

@yield('content')
</div>
</body>