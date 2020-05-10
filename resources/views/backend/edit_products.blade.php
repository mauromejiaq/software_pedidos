<!doctype html>
<html lang="en">
@include('backend.includes.head')
<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		@include('backend.includes.nav')
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
		@include('backend.includes.sidebar')
		<!-- END LEFT SIDEBAR -->
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<div class="col-md-12">
						<div class="panel">
							<form action="{{ route('products.update', $product->id) }}" method="POST" >
								{{ csrf_field() }}
								<input name="_method" type="hidden" value="PATCH">
								<div class="panel-heading">
									<h3 class="panel-title">Editar Producto</h3>
								</div>
								<div class="panel-body">
									<span>Nombre</span>
									<input class="form-control" name="name" value=" {{ $product->name }} " placeholder="Nombre" type="text" required="required">
								</div>
								<div class="panel-body">
									<span>Price</span>
									<input class="form-control" name="price" value=" {{ $product->price }} " placeholder="Precio" type="text" required="required">
								</div>
								<div class="panel-body">
									<span>Stock</span>
									<input class="form-control" name="stock" value=" {{ $product->stock }} " placeholder="Stock" type="text" required="required">
								</div>
								<div class="panel-body">
									<span>Categoría</span>
									<select class="form-control" name="category_id"  id="exampleFormControlSelect1">
										@if($categories->count())  
										@foreach($categories as $category)
										@if($category->id == $product->category_id)
										<?php $selected="selected"; ?>
										@else
										<?php $selected=""; ?>
										@endif

										<option value="{{ $category->id }}" <?= $selected; ?>> {{ $category->name }} </option>

										@endforeach 
										@endif

									</select>
								</div>
								<div class="panel-body">
									<span>Descripción</span>
									<textarea  class="form-control" name="description" rows="3"> {{ $product->description }} </textarea>
								</div>
								<div class="panel-body">
									<a href=" {{ route('products.index') }} " class="btn btn-info">Regresar</a>
									<button type="submit" class="btn btn-primary">Enviar</button>
								</div>

							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- END MAIN CONTENT -->
	</div>
	<div class="clearfix"></div>
	@include('backend.includes.footer')
</div>
@include('backend.includes.js')
</body>
</html>
