@extends('layouts.master.public')
@section('content')
@foreach($products as $product)
<a href="{{route('products.show', $product->id)}}">
	<div class="col-xs-6 col-md-4" >
		<img class="img-responsive" style="max-height:500px" src="https://www.eternallynocturnal.com/store/public/images/products/{{$product->main_image}}" />
		<div class="row">
			<div class="col-xs-12" style="font-size:10px;height:45px;">
				<i>{{Str::title($product->name)}}<br>${{$product->price}}</i>
			</div>
		</div>
	</div>
</a>	
@endforeach
@stop