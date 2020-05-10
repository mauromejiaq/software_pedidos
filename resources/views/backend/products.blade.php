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
					<div class="col-md-5">
						@if(session('success'))
						<div class="alert alert-success alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<i class="fa fa-check-circle"></i>{{session('success')}}
						</div>
						@endif
					</div>
					
					<div class="col-md-12">
						<a href="{{ route('products.create') }}"  type="button" class="btn btn-primary"> Agregar producto </a>
						<div class="panel">
							<div class="panel-heading">
								<h3 class="panel-title">Productos</h3>
							</div>
							<div class="panel-body">
								<table class="table">
									<thead>
										<tr>
											<th>Id</th>
											<th>Nombre</th>
											<th>Descripción</th>
											<th>Categoría</th>
											<th>Precio</th>
											<th>Stock</th>
											<th>Editar</th>
											<th>Eliminar</th>
										</tr>
									</thead>
									<tbody>
										@if(!empty($productsArray))
										@foreach($productsArray as $product)  
										<tr>
											<td>{{$product['id']}}</td>
											<td>{{$product['name']}}</td>
											<td>{{$product['description']}}</td>
											<td>{{$product['category_name']}}</td>
											<td>{{ number_format($product['price'])}}</td>
											<td>{{$product['stock']}}</td>
											<td><a class="btn btn-primary btn-xs" href="{{action('ProductsController@edit', $product['id'])}}" >Editar</a></td>
											<td> 
												<form action="{{action('ProductsController@destroy', $product['id'])}}" method="post">
													{{csrf_field()}}
													<input name="_method" type="hidden" value="DELETE">
													<button class="btn btn-danger btn-xs" type="submit">Eliminar</button>
												</form>
											</td>
										</tr>
										@endforeach
										@endif
									</tbody>
								</table>
							</div>
						</div>
						<!-- END BASIC TABLE -->
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
