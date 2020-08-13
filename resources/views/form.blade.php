@extends('layouts.app')

@section('content')
	<form method="post" class="row form container">
		@csrf
		<div class="col-4">
			<label>
				id: <input class="form-control" type="number" min="1" name="id">
			</label>
		</div>


		<div class="col-4">
			<label>
				nome: <input class="form-control" type="text" name="nome">
			</label>
		</div>

		<div class="col-4">
			<label>
				cidade: <select name="cidade" class="form-control">
							<option value="">Selecione:</option>
							<option>Eunapolis</option>
							<option>Porto seguro</option>
						</select>
			</label>
		</div>

		<div class="col-4">
			<label>
				sexo

			</label>
				<br>
			<label>
				<input type="radio" name="sexo" value="masculino" required> masculino 
			</label>

			<label>
				<input type="radio" name="sexo" value="feminino" required> feminino 
			</label>

		</div>

		<div class="col-4">
			<button class="btn btn-info" type="submit" name="cadastrar">Enviar</button>

			<button class="btn btn-info" type="submit" name="delete">deletar</button>
		</div>
	</form>
@endsection