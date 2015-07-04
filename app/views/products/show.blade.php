@extends('layouts.master.public')
@section('content')
	<legend class="product-header-etnoc">{{$product->name}}</legend>
	<div class="col-xs-12 col-md-4">
		<img class="img-responsive" src="https://www.eternallynocturnal.com/store/public/images/products/{{$product->main_image}}" />
	</div>
	<div class="well-etnoc col-xs-12 col-md-2">
		{{$product->description}}<br>
		{{Form::hidden('product', $product->id, array('class' => 'product'))}}
		@if($product->onesize == 1)One Size Only
			{{Form::hidden('size', 'onesize', array('class' => 'size'))}}
			@else
			<select class="size" name="size" style="color:#000000;max-width:50%">
				@if($product->xsmall == 1 && $product->inventories->xsmall)
					<option value="xsmall">X-Small</option>
				@endif

				@if($product->small == 1 && $product->inventories->small)
					<option value="small">Small</option>
				@endif

				@if($product->medium == "1" && $product->inventories->medium)
					<option value="medium">Medium</option>
				@endif

				@if($product->large == "1" && $product->inventories->large)
					<option value="large">Large</option>
				@endif

				@if($product->xlarge == "1" && $product->inventories->xlarge)
					<option value="xlarge">X-Large</option>
				@endif

				@if($product->xxlarge == "1" && $product->inventories->xxlarge)
					<option value="xxlarge">XX-Large</option>
				@endif

				@if($product->xxxlarge == "1" && $product->inventories->xxxlarge)
					<option value="xxxlarge">XXX-Large</option>
				@endif
			</select>
		@endif	
			<br>
			<br>
			<button id="cart" type="button" class="btn-xs btn-warning">Add to Cart</button>
	</div>

	<script>
		$('#cart').on('click', function(){
			alert()
			var $post = {};
        	var url = "{{route('commerceDirector')}}";

            $post.size = $(this).parent().find('.size').val(); 
            $post.product = $(this).parent().find('.product').val(); 
            $post.commerceType = 'addCart';	
            $.ajax({
            type: "POST",
            url: url,
            data: $post,
            cache: false,
            success: function(data){
               console.log(data);
               return;
            }
            });

            return false;
		});
	</script>
@stop