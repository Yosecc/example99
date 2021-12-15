<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>TODO</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
	<div class="container">
		<h1>TODO EDIT (CRUD)</h1>


		<form action="{{ route('todo.update', $todo) }}" method="post">
			@csrf
			@method('PUT')
			<div class="form-group">
				<label for="">Tarea</label>
				<input type="text" value="{{ $todo->name }}" name="name" placeholder="Escribe aqui tu tarea" class="form-control">
			</div>

			<div class="form-group">
				<label for="">Description</label>
				<input type="text" value="{{ $todo->description }}" name="description"  class="form-control">
			</div>

			<div class="form-group">
				<label for="">Limit Date</label>
				<input type="date" value="{{ \Carbon\Carbon::parse($todo->limit_date)->format('Y-m-d') }}" name="limit_date" class="form-control">
			</div>

			<div class="form-group">
				<label for="">Category</label>
				<select name="category_id" id="" class="form-control">
					<option value="">Seleccionar</option>
					@foreach($categories as $category)
						<option value="{{ $category->id }}" @if( $todo->category_id == $category->id ) selected @endif >{{ $category->name  }}</option>
					@endforeach
				</select>
			</div>

			<div class="form-group mt-3">
				<input type="submit" class="btn btn-primary">
			</div>

		</form>

	</div>

	

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>