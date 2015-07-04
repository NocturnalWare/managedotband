@extends('layouts.master.public')
@section('content')

<div class="row">

	<div class="col-xs-12">
		<div class="col-xs-12 col-md-8 hidden homepage-main-article">
			<div class="col-xs-12" style="border:4px solid #000;height:300px;width:100%">
				</div>
			</div>
		<div class="col-xs-12 col-md-4 hidden homepage-next-show">
			<div style="border:4px solid #000;height:300px;width:100%">Next Show</div>
		</div>
		<div style="width:90%" class="hidden-lg hidden-sm hidden-md homepage-featured-item-mobile">
				<div style="overflow-y:scroll;height:300px;width:120%;overflow-x:hidden">
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

<div id="nexpro">

<input type="text" name="dumb" class="category">
<button class="clickrr" type="button">Clickme</button>
</div>
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
  Launch demo modal
</button>
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModalq">
  Launch demo modal
</button>

okgop
@include('wrappers.modal', [
'save' => 'use', 
'content' => 'overlords.layout',
'contentarray' => '"Jesus" => "jos"', 
'target' => 'myModal',
'title' => 'okgo', 
'type' => 'form'
])

@include('wrappers.modal', [
'save' => 'use', 
'content' => 'overlords.layout',
'contentarray' => '"Jesus" => "jos"', 
'target' => 'myModalq',
'title' => 'okgo', 
'type' => 'form'
])
	
<script type="text/javascript">

	$(document).ready(function(){

        $('#nexpro').on('click', '.clickrr', function(e) {
        e.preventDefault();
        	var $post = {};
        	var url = "objectStorage";

            $post.name = $(this).parent().find('.category').val();
            $post.storageType = 'productCategory';	
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
     });

</script>


@stop
@stop