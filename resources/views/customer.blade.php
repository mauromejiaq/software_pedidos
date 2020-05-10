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
						
						<div class="col-md-9">

							<div class="panel panel-headline">
								<div class="panel-heading">
									<h3 class="panel-title">Productos</h3>
								</div>
								<div class="panel-body">
									@if($products->count())
									@foreach($products as $product)
									<div class="col-md-3">
										<div class="card" style="width: 18rem;">
											<div class="card-body">
												<center>
													<form action="{{ route('cart.store') }}" method="post">
														{{ csrf_field() }}
														<input type="hidden" value="{{ $product->id }}" name="id">
														<h4 class="card-title text-info"> <strong> {{ $product->name }} </strong></h4>
														<p class="card-text">{{ $product->description }} </p>
														<p class="card-text text-info">$ {{ number_format($product->price) }} </p>
														<h5>Cantidad actual</h5>
														<p class="card-text text-info">{{ number_format($product->stock) }} </p>
														Cantidad: 
														<input class="form-control form-control-sm" min="1" max="10" type="number" name="qty" placeholder="" value="1">
														<br>
														<button type="submit" class="btn btn-primary">Agregar al carrito</button>
													</form>
												</center>
											</div>
										</div>
									</div>
									@endforeach
									@endif
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="panel panel-headline">
								<div class="panel-heading">
									<h3 class="panel-title">Carrito de compras</h3>
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
									<a class="btn btn-danger" href=" {{ url('forgetCart') }} ">Vaciar carrito</a>
									<a class="btn btn-primary" href=" {{ url('complete') }} ">Completar Orden</a>

									@endif
									
									
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
