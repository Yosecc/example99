<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>TODO</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
	<div class="container">
		<h1>TODO (CRUD)</h1>
		@if ($errors->any())
		    <div class="alert alert-danger">
		        <ul>
		            @foreach ($errors->all() as $key=> $error)
		                <li>{{ $key }}{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif


		@if(session('mensaje'))
		   <div class="alert alert-success">
		   	{{ session('mensaje') }}
		   </div>
		@endif


		<form action="{{ route('todo.store') }}" method="post">
			@csrf

			<div class="form-group">
				<label for="">Tarea</label>
				<input type="text" name="name" placeholder="Escribe aqui tu tarea" class="form-control">
			</div>

			<div class="form-group">
				<label for="">Description</label>
				<input type="text" name="description"  class="form-control">
			</div>

			<div class="form-group">
				<label for="">Limit Date</label>
				<input type="date" name="limit_date" class="form-control">
			</div>

			<div class="form-group">
				<label for="">Category</label>
				<select name="category_id" id="" class="form-control">
					<option value="">Seleccionar</option>
					@foreach($categories as $category)
						<option value="{{ $category->id }}">{{ $category->name  }}</option>
					@endforeach
				</select>
			</div>

			<div class="form-group mt-3">
				<input type="submit" class="btn btn-primary">
			</div>

		</form>

	</div>

	<div class="container bg-warning p-4 mt-4">
		<table class="table">
			<thead>
				<tr>
					<th>ID</th>
					<th>CATEGORY</th>
					<th>NAME</th>
					<th>LIMIT DATE</th>
					<th>IS COMPLETE</th>
					<th>ACTIONS</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($todo as $key => $value)
					<tr 
						id="tr_register_{{ $value->id }}"
						class="@if($value->is_complete == 1) bg-success @endif "
					>
						<td>{{ $value->id }}</td>
						<td>{{ $value->category->name }}</td>
						<td>{{ $value->name }}</td>
						<td>{{ \Carbon\Carbon::parse($value->limit_date)->format('d-m-Y') }}</td>
						<td class="SINO">{{ $value->is_complete ? 'SI':'NO' }}</td>
						<td>
							<div class="btn-group">
								<button type="button" class="btn btn-success btn-listo" data-name="{{ $value->name }}" data-id="{{ $value->id }}">LISTO</button>

								<a href="{{ route('todo.edit', $value ) }}" class="btn btn-primary">EDITAR</a>

								<form id="delete-form" method="POST" action="{{ route('todo.destroy', $value) }}">
                                   @csrf
                                   @method('DELETE')

                                    <button type="submit" class="btn btn-danger " title="Borrar">
                                     BORRAR 
                                    </button>

                                </form>
							</div>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		{{-- {{ $todo->links() }} --}}
	</div>
	@routes();
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	
	<script>

		var contenido = $('body')
		$(document).on('click','.btn-listo', function(){
			let id = $(this).data('id')
			let name = $(this).data('name')

			$.ajax({
			  url: route('listo', id),
			  cache: false,
			  beforeSend: function( xhr ) {
			    console.log('antes que se envie')
			  }
			}).done(function( response ) {
				var tr = $('#tr_register_'+response.todo.id)
				tr.addClass('bg-success')
				tr.find('.SINO').html('SI')

			    console.log('esta es la respuesta',response)
			});
		})
		// console.log('element', contenido)
	</script>
	
</body>
</html>