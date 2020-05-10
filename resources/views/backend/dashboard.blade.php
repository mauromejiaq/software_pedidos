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
						<div class="panel-body">
							<div class="col-md-12">
								<h3>Ordenes</h3>
								<table class="table">
									<thead>
										<tr>
											<th scope="col">Id</th>
											<th scope="col">Tipo Documento</th>
											<th scope="col">Documento</th>
											<th scope="col">Nombre del Cliente</th>
											<th scope="col">Dirección Cliente</th>
											<th scope="col">Ciudad</th>
											<th scope="col">Correo</th>
											<th scope="col">Fecha Creación</th>
											<th scope="col">Productos</th>
										</tr>
									</thead>
									<tbody>
										@if($arrayOrders)
										@foreach($arrayOrders as $order)
										<tr>
											<td>{{ $order['id'] }}</td>
											<td>{{ $order['document_type'] }}</td>
											<td>{{ $order['document_number'] }}</td>
											<td>{{ $order['customer_firstname'] }} {{ $order['customer_lastname'] }}</td>
											<td>{{ $order['customer_address'] }}</td>
											<td>{{ $order['customer_city'] }}</td>
											<td>{{ $order['customer_email'] }}</td>
											<td>{{ $order['created_at'] }}</td>
											<td><a class="btn btn-primary btn-xs" href="{{action('OrdersController@show', $order['id']) }}" >Ver Productos</a></td>
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
