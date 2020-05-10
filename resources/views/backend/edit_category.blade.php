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
							<form action="{{ route('category.update', $category->id) }}" method="POST" >
								{{ csrf_field() }}
								<input name="_method" type="hidden" value="PATCH">
								<div class="panel-heading">
									<h3 class="panel-title">Editar Categoría</h3>
								</div>
								<div class="panel-body">
									<span>Nombre</span>
									<input class="form-control" name="name" placeholder="Nombre" value=" {{ $category->name }} " type="text">
									<br>
								</div>
								<div class="panel-body">
									<span>Descripción</span>
									<textarea  class="form-control" name="description" rows="3">{{ $category->description }}</textarea>
								</div>
								<div class="panel-body">
									<a href=" {{ route('category.index') }} " class="btn btn-info">Regresar</a>
									<button type="submit" class="btn btn-primary">Actualizar</button>
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
