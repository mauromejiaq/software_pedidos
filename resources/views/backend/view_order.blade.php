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
					<!-- OVERVIEW -->
					<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">Resumen</h3>
						</div>
						<div class="panel-body">
							<div class="col-md-12">
								<h3>Ordenen # {{ $id }} </h3>
								<table class="table">
									<thead>
										<tr>
											<th scope="col">Id</th>
											<th scope="col">Nombre producto</th>
											<th scope="col">Cantidad</th>
											<th scope="col">Precio</th>
										</tr>
									</thead>
									<tbody>
										@if($arrayProducts)
										@foreach($arrayProducts as $product)
										<tr>
											<td>{{ $product['id'] }}</td>
											<td>{{ $product['name'] }}</td>
											<td>{{ $product['qty'] }}</td>
											<td>{{ number_format($product['price']) }}</td>
										</tr>
										@endforeach
										@endif
									</tbody>
								</table>

							</div>
						</div>
					</div>
					<!-- END OVERVIEW -->
					<div class="row">
						<div class="col-md-6">

						</div>
						<div class="col-md-6">

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
