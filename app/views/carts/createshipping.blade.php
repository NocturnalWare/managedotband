@extends('layouts.master.public')
@section('content')
<h2>{{$errors->first()}}</h2>
<!-- <div style="background-color:#000000;width:100%;max-width:700px;height:100%;min-height:1000px;">
If you've shopped with us before we can probably find your address by email.
<div class="col-xs-12 large-5">
	{{Form::text('email', '', array('placeholder' => 'Email'))}}
</div>
	
<div class="small-8 large-5">
	{{Form::password('password', '', array('placeholder' => 'Password'))}}
</div>
		<button class="button tiny alert" type="submit">Use Email</button>
	{{Form::close()}}
 -->



{{Form::open(array('route' => 'commerceDirector', 'method' => 'post'))}}
	<div class="col-xs-12 col-lg-12">
		<div class="col-sm-6 col-md-4">
			<div class="col-md-6">
				<label style="color:#ffffff">Email Address*</label>
			</div>
			<div class="col-md-6">
				{{Form::text('email', '', array('placeholder' => 'Email'))}}
			</div>
		</div>
		
		<div class="col-sm-6 col-md-4">
			<div class="col-md-6">
				<label style="color:#ffffff">Password <i style="font-size:10px">for returning visits</i></label>
			</div>
			<div class="col-md-6">
				{{Form::text('password', '', array('placeholder' => 'Password'))}}
			</div>
		</div>



		<div class="col-xs-12 col-md-4">
			<div class="col-md-6">
				<label style="color:#ffffff">Phone</label>
			</div>
			<div class="col-md-6">
				{{Form::text('phone', '', array('placeholder' => 'Phone Number'))}}
			</div>
		</div>


	
	
	<div class="col-xs-12 col-md-4">
		<div class="col-md-6">
			<label style="color:#ffffff">First Name*</label>
		</div>
		<div class="col-md-6">
			{{Form::text('ship_f_name', '', array('placeholder' => 'First Name'))}}
		</div>
	</div>
	<div class="col-xs-12 col-md-4">
		<div class="col-md-6">
			<label style="color:#ffffff">Last Name*</label>
		</div>
		<div class="col-md-6">
			{{Form::text('ship_l_name', '', array('placeholder' => 'Last Name'))}}
		</div>
	</div>

	<div class="col-xs-12 col-md-4">
		<div class="col-md-6">
			<label style="color:#ffffff">Address*</label>
		</div>
		<div class="col-md-6">
			{{Form::text('ship_address1', '', array('placeholder' => 'Address 1'))}}
		</div>
	</div>

	<div class="col-xs-12 col-md-4">
		<div class="col-md-6">
			<label style="color:#ffffff">Address 2</label>
		</div>
		<div class="col-md-6">
			{{Form::text('ship_address2', '', array('placeholder' => 'Address 2'))}}
		</div>
	</div>

	<div class="col-xs-12 col-md-4">
		<div class="col-md-6">
			<label style="color:#ffffff">City*</label>
		</div>
		<div class="col-md-6">
			{{Form::text('ship_city', '', array('placeholder' => 'City'))}}
		</div>
	</div>

	<div class="col-xs-12 col-md-4" style="color:#000000">
		<div class="col-md-6">
			<label style="color:#ffffff">State*</label>
		</div>
		<div class="col-md-6">
			{{Form::text('ship_state', '', array('placeholder' => 'State'))}}
		</div>
	</div>

	<div class="col-xs-12 col-md-4">
		<div class="col-md-6">
			<label style="color:#ffffff">Zip*</label>
		</div>
		<div class="col-md-6">
			{{Form::text('ship_zip', '', array('placeholder' => 'Zip'))}}
		</div>
	</div>
	</div>
<br><br>
<div class="row">
@if(Session::get('checkoutAmt'))
{{Form::hidden('cart_id', Session::get('cart_id'))}}
{{Form::hidden('cart_amt', Session::get('checkoutAmt'))}}
<h2 style="color:#f0f0f0">Total with shipping: ${{substr(Session::get('checkoutAmt'),0,-2)}}.{{substr(Session::get('checkoutAmt'),-2)}}</h2>
@endif

		{{Form::hidden('commerceType', 'checkoutpament')}}
<button type="submit" style="border-radius:45px" class="button alert small">Check Out</button>
{{Form::close()}}

</div>

</center>

@stop