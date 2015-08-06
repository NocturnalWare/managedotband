@foreach($products as $product)
<a href="{{route('products.show', $product->id)}}">
	<div class="col-xs-6 col-md-4" >
		<img class="img-responsive" src="https://www.eternallynocturnal.com/store/public/images/products/{{$product->main_image}}" />
		<div class="row">
			<div class="col-xs-12" style="font-size:10px;height:35px">
				<i>{{Str::title($product->name)}}</i>
			</div>
			<div class="col-xs-12">
			${{$product->price}}
			</div>
		</div>
	</div>
</a>	
@endforeach


