<!doctype html>
<html lang="en">

@include('includes.head')

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		<!-- END NAVBAR -->
		@include('includes.nav')
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
		@include('includes.sidebar')
		<!-- LEFT SIDEBAR -->
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
						@if(session('error'))
						<div class="alert alert-danger alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<i class="fa fa-check-circle"></i>{{session('error')}}
						</div>
						@endif
					</div>
					<div class="row">
						<div class="col-md-7">
							<div class="panel panel-headline">
								<div class="panel-heading">
									<h3 class="panel-title">Completar Orden</h3>
								</div>
								<div class="panel-body">
									<form action="{{ route('order.store') }}" method="POST" >
										{{ csrf_field() }}
										<div class="col-md-6">
											<div class="panel-body">
												<span>Tipo Documento</span>
												<select class="form-control" name="document_type">
													@if($documents->count())
													@foreach($documents as $document)
													<option value="{{ $document->id }}"> {{ $document->name }} </option>
													@endforeach
													@endif
												</select>
											</div>
										</div>
										<div class="col-md-6">
											<div class="panel-body">
												<span>Tipo Documento</span>
												<input class="form-control" name="document_number" placeholder="Número de documento" type="text" required="required">
											</div>
										</div>

										<div class="col-md-6">
											<div class="panel-body">
												<span>Primer Nombre</span>
												<input class="form-control" name="customer_firstname" placeholder="Primer Nombre" type="text" required="required">
											</div>
										</div>

										<div class="col-md-6">
											<div class="panel-body">
												<span>Segundo Nombre</span>
												<input class="form-control" name="customer_lastname" placeholder="Segundo Nombre" type="text" required="required">
											</div>
										</div>

										<div class="col-md-6">
											<div class="panel-body">
												<span>Direccón</span>
												<input class="form-control" name="customer_address" placeholder="Dirección" type="text" required="required">
											</div>

										</div>
										<div class="col-md-6">
											<div class="panel-body">
												<span>Ciudad</span>
												<select class="form-control" name="customer_city">
													@if($cities->count())
													@foreach($cities as $city)

													<option value=" {{ $city->id }}"> {{ $city->name }} </option>

													@endforeach
													@endif
													
												</select>
											</div>

										</div>
										<div class="col-md-12">
											<div class="panel-body">
												<span>Correo</span>
												<input class="form-control" name="customer_email" placeholder="Correo de cliente" type="text" required="required">
											</div>
										</div>
										<div class="panel-body">
											<button type="submit" class="btn btn-primary">Completar Orden</button>
										</div>

									</form>
								</div>
							</div>
						</div>
						<div class="col-md-5">
							<div class="panel panel-headline">
								<div class="panel-heading">
									<h3 class="panel-title">Productos en carrito</h3>
								</div>
								<div class="panel-body">
									@if(session('cart'))
									<table class="table">
										<thead>
											<tr>
												<th scope="col">Producto</th>
												<th scope="col">Qty</th>
												<th scope="col">Price</th>
											</tr>
										</thead>
										<tbody>
											@foreach(session('cart') as $product)
											<tr>
												<td> {{ $product['name'] }} </td>
												<td>{{ $product['quantity'] }}</td>
												<td>{{ number_format($product['price'])  }}</td>
											</tr>
											@endforeach
										</tbody>
									</table>

									@endif
									<a class="btn btn-primary" href=" {{ url('customer') }} ">Seguir comprando</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<div class="clearfix"></div>
		@include('includes.footer')
	</div>
	@include('includes.js')
</body>
</html>
