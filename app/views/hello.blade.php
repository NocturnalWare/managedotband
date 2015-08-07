@extends('layouts.master.public')
@section('content')
<div class="row">

	<div class="col-xs-12">
		<div class="col-xs-12 col-md-8  hidden homepage-main-article">
			<div class="col-xs-12" style="border:4px solid #000;height:300px;width:100%">
				</div>
			</div>
		<div class="col-xs-12 col-md-4 hidden homepage-next-show">
			<div style="border:4px solid #000;height:300px;width:100%">Next Show</div>
		</div>
		<div style="width:90%" class="hidden-lg hidden-sm hidden-md homepage-featured-item-mobile">
				<div style="overflow-y:scroll;max-height:400px;width:120%;max-width:533px;overflow-x:hidden">
					@include('products.index', ['products' => Product::all()])
				</div>
			</div>
		</div>

		<div class="hidden-xs homepage-featured-item" style="width:90%">
				<div style="overflow-y:scroll;height:700px;width:113%;overflow-x:hidden">
					@include('products.index', ['products' => Product::all()])
				</div>
			</div>
		</div>
		
		<div class="col-xs-6 col-md-4 col-lg-3">
			
		</div>
	</div>
</div>

@stop