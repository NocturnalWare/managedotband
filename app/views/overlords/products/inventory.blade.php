@extends('layouts.master.admin')

@section('content')
<style>
.quantity{
	width: 30%;
}
</style>
<div class="col-sm-12 col-md-6">
@foreach(Product::all() as $product)
<div class="col-sm-12 col-md-4" >
	<div id="size_{{$product->id}}" class="btn-sm btn-danger">{{$product->name}}</div><br>
<script>
		var oParams = '';
var money = "{{$product->id}}";
</script>


<script>
$('#size_{{$product->id}}').on('click', function(){
	$(this).removeClass('btn-danger').addClass('btn-success');
	$('#quantityButton_{{$product->id}}').toggleClass('hidden');
})
</script>


</div>
@endforeach
</div>

<div class="col-sm-12 col-md-6" style="background-color:#000000">
@foreach(Product::all() as $product)

	<div id="quantityButton_{{$product->id}}" class="hidden">
	<div id="size_{{$product->id}}">
		{{$product->name}}
		<button class="pull-right" onclick="closeInventory('#quantityButton_{{$product->id}}');">
			<i class="fa fa-close"></i>
		</button></div>
	<br>
	<table style="text-align:left;width:100%">
		<th>Size</th>
		<th>QOH</th>
		<th>Actions</th>
		<th>Change</th>
		<tr>

	@foreach(Size::all() as $sizes)

	<td>{{Str::title($sizes->size)}}
	<td>
		<input type="text" onchange="$('#{{$product->id}}_but').removeClass('btn-primary').addClass('btn-warning').html('Update {{$product->name}}')" style="background-color:#000000;width:60px" id="{{$sizes->size}}_{{$product->id}}" name="{{$sizes->size}}_inv" value="{{Inventory::where('product_id', $product->id)->pluck($sizes->size)}}">
		</input>

	<td><button 
			type="button"
			class="btn-lg btn-primary quantity" 
			onclick="addInventory(
				'1', 
				'#{{$sizes->size}}_{{$product->id}}',
				'#{{$sizes->size}}_{{$product->id}}_change')">+
		</button>
		<button 
			class="btn-lg btn-primary quantity"
			type="button"
			onclick="addInventory(
					'-1', 
					'#{{$sizes->size}}_{{$product->id}}',
					'#{{$sizes->size}}_{{$product->id}}_change')"
					id="qbutton_{{$product->id}}">-</button>
	<td><span id="{{$sizes->size}}_{{$product->id}}_change">0</span>
	<tr>
	
	@endforeach
		<td>One Size
	<td>
		<input type="text" onchange="$('#{{$product->id}}_but').removeClass('btn-primary').addClass('btn-warning').html('Update {{$product->name}}')" style="background-color:#000000;width:60px" id="onesize_{{$product->id}}" name="onesize_inv" value="{{Inventory::where('product_id', $product->id)->pluck('onesize')}}">
		</input>

	<td><button 
			type="button"
			class="btn-lg btn-primary quantity" 
			onclick="addInventory(
				'1', 
				'#onesize_{{$product->id}}',
				'#onesize_{{$product->id}}_change')">+
		</button>
		<button 
			class="btn-lg btn-primary quantity"
			type="button"
			onclick="addInventory(
					'-1', 
					'#onesize_{{$product->id}}',
					'#onesize_{{$product->id}}_change')"
					id="qbutton_{{$product->id}}">-</button>
	<td><span id="onesize_{{$product->id}}_change">0</span>
	<tr>
	
	<tr><td colspan="4">
		<center>
			<button class="update btn btn-warning" id="{{$product->id}}_but" value="{{$product->id}}" type="button">Update {{$product->name}}</button>
		</center>

</table>
<br>
<br>
<br>
	</div>

<script>
	$(document).ready(function(){

        $('#{{$product->id}}_but').click(function(e) {
        e.preventDefault();

            var url             = "changeInventory";
            var $post             = {};
            var updID = $(this).val();
            $post.id            = updID;
            $post.xsmall_inv = $("#xsmall_"+updID).val();
            $post.small_inv = $("#small_"+updID).val();
            $post.medium_inv = $("#medium_"+updID).val();
            $post.large_inv = $("#large_"+updID).val();
            $post.xlarge_inv = $("#xlarge_"+updID).val();
            $post.xxlarge_inv = $("#xxlarge_"+updID).val();
            $post.xxxlarge_inv = $("#xxxlarge_"+updID).val();
            $post.onesize_inv = $("#onesize_"+updID).val();
            $.ajax({
            type: "POST",
            url: url,
            data: $post,
            cache: false,
            success: function(data){
            	$('#{{$product->id}}_but').removeClass('btn-warning').addClass('btn-success').html('Updated!');
            	$('#quantityButton_{{$product->id}}').toggleClass('hidden');
            	$('#size_{{$product->id}}').addClass('btn-primary').removeClass('btn-success');

               return data;
            }
            });

            return false;
        });
     });
</script>
@endforeach
</div>

<script>
	function closeInventory(oParams){
		$(oParams).toggleClass('hidden');
	}
	function addInventory(oParams, oDisplay, oChange){
		var newInv = parseFloat($(oChange).html())+parseFloat(oParams);
		var currentInv = $(oDisplay).val();
		var futureView = parseFloat(currentInv)+parseFloat(oParams);
		$(oDisplay).val(futureView);
		$(oChange).html(newInv);
	}
</script>


@stop