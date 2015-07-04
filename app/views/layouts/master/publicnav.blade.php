@include('layouts.master.topcarousel')
<nav class="navbar navbar-default">
  <div class="container-fluid"  style="background-color:#000;">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#" style=""><img height="130%" src="https://www.eternallynocturnal.com/images/mainenheader.png"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-left">
        <li class="btn btn-lg mobile-nav-button-etnoc"><i class="fa fa-twitter"></i></li>
        <li class="btn btn-lg mobile-nav-button-etnoc"><i class="fa fa-facebook-official"></i></li>
        <li class="btn btn-lg mobile-nav-button-etnoc"><i class="fa fa-instagram"></i></li>
        <li class="btn btn-lg mobile-nav-button-etnoc"></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li >
          <button style="background-color:#000" id="dLabel" type="button" class="dropdown nav-button-etnoc btn btn-lg" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Shop
            <span class="caret"></span>
          </button>
          <ul class="dropdown-menu" style="background-color:#000;" aria-labelledby="dLabel">
            @foreach(ProductCategory::all() as $sizes)
            <li style="color:#fff;font-size:18px" class="btn btn-sm">{{link_to_route('productsort', $sizes->name, $sizes->name, array('style' => 'color:#fff'))}}</li>
            @endforeach
          </ul>
        </li>
        <li class="btn btn-lg nav-button-etnoc hidden-xs"></li>
        <li class="btn btn-lg nav-button-etnoc hidden-xs hidden">Shows</li>
        <li class="btn btn-lg nav-button-etnoc hidden-xs hidden">Bands</li>
        <li class="btn btn-lg nav-button-etnoc hidden-xs" data-toggle="modal" data-target="#Feedback">Contact</li>
        <li><button style="background-color:#000;" class='nav-button-etnoc btn btn-lg hidden-xs'>{{link_to_route('carts.index', 'Cart')}}</button></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="Feedback" tabindex="-1" role="dialog" aria-labelledby="FeedbackLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header"  style="background-color:#000">
        <button type="button" class="btn btn-danger pull-right" data-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></button></button>
        <h4 class="modal-title" id="FeedbackLabel">Send us a message!</h4>
      </div>
      <div class="modal-body" style="background-color:#000">
         {{Form::open(array('route' => 'products.store', 'method' => 'post'))}}
         <div class="row">
            <div class="small-12 large-12 columns">
              {{Form::text('name', '', array('placeholder' => 'Your Name'))}}
            </div>
            
            <div class="small-12 large-12 columns">
              {{Form::text('email', '', array('placeholder' => 'An email we can reply to'))}}
            </div>

            <div class="small-12 large-12 columns">
              {{Form::textarea('message', '', array('placeholder' => 'Message', 'style' => 'color:#000000;max-height:150px;'))}}
            </div>
          </div>
      </div>
      <div class="modal-footer" style="background-color:#000">
        <button type="button" class="btn btn-warning">Send Feedback</button>
            {{Form::close()}}
      </div>
    </div>
  </div>
</div>

