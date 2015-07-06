@extends('layouts.master.admin')
@section('content')
<div class="row" style="padding:30px">
	<div style="border:1px solid #fff;height:300px;" class="col-xs-12 col-md-3">
		<button class="btn btn-lg btn-danger" style="width:100%">Product List</button>
		<button class="btn btn-lg btn-danger" style="width:100%">{{link_to_route('overmind', 'Inventory', 'viewInventory')}}</button>
		<button class="btn btn-lg btn-danger" style="width:100%">Orders</button>
	</div>
	<div style="border:1px solid #fff;height:300px;" class="col-xs-12 col-md-3">
		Contacts
	</div>
	<div style="border:1px solid #fff;height:300px;" class="col-xs-12 col-md-3">
		Shows
	</div>
	<div style="border:1px solid #fff;height:300px;" class="col-xs-12 col-md-3">
		Shipping
	</div>
	<div style="border:1px solid #fff;height:300px;" class="col-xs-12 col-md-3">
		Billing
	</div>
</div>
@foreach($products as $product)
{{$product->name}}<br>
@endforeach
@stop