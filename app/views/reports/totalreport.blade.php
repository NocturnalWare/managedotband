@extends('layouts.master.admin')
@include('reports.totalreport')

@section('content')
<?php $counter =0;?>
<?php $sumcounter =0;?>
<?php $pricecounter =0;?>

<div class="col-sm-3">
	Product
</div>
<div class="col-sm-3">
	Total Quantity
</div>
<div class="col-sm-3">
	Price
</div>
<div class="col-sm-3">
	Sum Quantity
</div>
@foreach(Product::with('inventories', 'prices')->get() as $in)
<div class="col-sm-3">
	{{$in->name}} 
</div>
<div class="col-sm-3">
	{{$counter = 
		$in->inventories->xsmall+ 
		$in->inventories->small+ 
		$in->inventories->medium+ 
		$in->inventories->large+ 
		$in->inventories->xlarge+ 
		$in->inventories->xxlarge+ 
		$in->inventories->xxxlarge+
		$in->inventories->onesize}}
</div>
<div class="col-sm-3">
	{{number_format($pricecounter = 
		(($in->prices->small+ $in->prices->onesize/2)/100), 2, '.', '')}}
</div>
<div class="col-sm-3">
{{$sumcounter += $in->inventories->xsmall+ $in->inventories->small+ $in->inventories->medium+ $in->inventories->large+ $in->inventories->xlarge+ $in->inventories->xxlarge+ $in->inventories->xxxlarge+$in->inventories->onesize}}<br>
</div>
@endforeach
	Total: {{$sumcounter*$pricecounter}}<br>



@stop