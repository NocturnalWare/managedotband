@extends('layouts.master.public')
@section('content')
	@foreach($carts as $cart)
		<div class="row">
			<div class="col-xs-12 col-md-3">
				<center>
					<img  style="height:40px" class="img-responsive" src="https://www.eternallynocturnal.com/store/public/images/products/{{$cart->findItemProp('main_image')}}" />
				</center>
			</div>
			<div class="col-xs-12 col-md-3">
				{{$cart->findItemProp('Name')}}<br>
			</div>
			<div class="col-xs-4 col-md-2">
				{{$cart->quantity}}
			</div>
			<div class="col-xs-4 col-md-2">
				{{Str::title($cart->size)}}
			</div>
			<div class="col-xs-4 col-md-2">
				${{substr($cart->checkoutPrice(),0, -2)}}.{{substr($cart->checkoutPrice(),-2)}}
			</div>

		</div>
	@endforeach

@stop