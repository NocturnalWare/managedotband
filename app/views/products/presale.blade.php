@section('content')
<hr>
  {{Form::open(array('route' => 'processPayment', 'method' => 'post'))}}
	{{Form::hidden('data-description', '2')}}
  <script
    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
    data-key="pk_live_wnPUnS7F4EcVpHtFBkkdPwz6"
    data-amount="2"
    data-name="Eternally Nocturnal"
    data-description= "Presale Blackout Hat"
    data-image="https://www.eternallynocturnal.com/images/blackskull.jpg">
  </script>
  	{{Form::close()}}


@stop