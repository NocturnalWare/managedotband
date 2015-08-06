

<table width="40%" border="2px solid" style="text-align:center">
	<th>REPLY EMAIL</td>
	@if($customer->phone)
		<th>Phone</td><tr>
	@endif

	<td>{{$customer->email}}</td>
	@if($customer->phone)
		<td>{{$customer->phone}}</td>
	@endif
</table>

<table width="40%" border="2px solid" style="text-align:center">
<th>SHIP TO:</th><tr>
<td>{{$customer->ship_f_name}} {{$customer->ship_l_name}}<br>
{{$customer->ship_address1}} {{$customer->ship_address2}}<br>
{{$customer->ship_city}} {{$customer->ship_state}}, {{$customer->ship_zip}}<br><br>
</table>


<table width="40%" border="2px solid" style="text-align:center">

	<th>Item</th>
	<th>Quantity</th>
	<th>Size</th><tr>
@foreach(Cart::where('customer_id', $cart)->get() as $items)

<td>{{$items->findItemProp('Name')}}	
<td>{{$items->quantity}}
<td>{{$items->size}}
<tr>

@endforeach
</table>

<br>
@extends('layouts.navbar')