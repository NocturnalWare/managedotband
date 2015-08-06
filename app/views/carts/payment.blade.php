@extends('layouts.master.public')
@section('content')
<?php $checkoutAmt = Session::get('checkoutAmt');?>
<div style="background-color:#000000; min-height:900px">
<div class="col-sm-12 col-md-12">

 <h2 style="color:#ffffff">Please verify the information below is correct before entring your credit card details</h2>
{{Form::close()}}

</div>

<div class="col-sm-12 col-md-12">
<label style="whiteouttext">Email</label>
{{$customer['email']}}
</div>

@if($customer['phone'])
<div class="col-sm-12 col-md-12">
<label style="whiteouttext">Phone</label>
{{$customer['phone']}}
</div>
@endif

<div class="col-sm-12 col-md-12">
<label style="whiteouttext">Name</label>
{{$customer['ship_f_name']}} {{$customer['ship_l_name']}}
</div>

<div class="col-sm-12 col-md-12">
<label style="whiteouttext">Street Address</label>
{{$customer['ship_address1']}} {{$customer['ship_address2']}}
</div>

<div class="col-sm-12 col-md-12">
<label style="whiteouttext">City/State/Zip</label>
{{$customer['ship_city']}} {{$customer['ship_state']}}, {{$customer['ship_zip']}}
</div>

<div class="col-sm-12 col-md-12">
<label style="whiteouttext">Total including shipping</label>
${{substr(Session::get('checkoutAmt'),0,-2)}}.{{substr(Session::get('checkoutAmt'),-2)}}
</div>

<hr>
	{{Form::hidden('data-description', $checkoutAmt)}}
  <script
    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
    data-key="pk_live_wnPUnS7F4EcVpHtFBkkdPwz6"
    data-amount="{{$checkoutAmt}}"
    data-name="Eternally Nocturnal"
    data-description= "${{substr($checkoutAmt,0,-2)}}.{{substr($checkoutAmt,-2)}}"
    data-image="https://www.eternallynocturnal.com/images/blackskull.jpg">
  </script>
  	{{Form::close()}}

    <br><br>

<button type="submit" class="button tiny" style="background-color:#700000;color:#ffffff;border-radius:45px"><b>Edit Shipping Info</b></button>
</div>
@stop