<div class="row" style="padding-left:5%;padding-right:5%;padding-bottom:5%;">
@foreach($products as $product)
<a href="{{route('products.show', $product->id)}}">
	<div class="col-xs-6 col-md-4" >
		<img class="img-responsive" style="max-height:700px;padding-left:5%" src="https://www.eternallynocturnal.com/store/public/images/products/{{$product->main_image}}" />
		<div class="row">
			<div class="col-xs-12" style="font-size:1em;height:60px;text-align:center;">
				<i>{{Str::title($product->name)}} <br>${{$product->price}}</i>
			</div>
		</div>
	</div>
</a>	
@endforeach
</div>

