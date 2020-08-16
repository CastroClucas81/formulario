@extends('layouts.applogado')

@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-8">

      <button class="btn btn-primary" data-toggle="modal" data-target="#cadastrar">Cadastrar</button>

      <form method="post">
        @csrf
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">First</th>
              <th scope="col">Last</th>
              <th scope="col">Handle</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($usuarios as $key => $value): ?>
             <tr>
              <td>
                <input type="checkbox" name="usuarios[]" value="{{$value->id}}">
              </td>
              <td>
                {{ $value->nome}}
              </td>
              <td>
                <button class="btn btn-info" data-toggle="modal" data-target="#usuario{{ $value->id}}">Editar</button>
              </td>
            </tr>
          <?php endforeach ?>

        </tbody>
      </table>
      <button class="btn btn-info" type="submit" name="transferir">transferir</button>

    </form>
    {{ $usuarios->links()}}
  </div>
  <?php foreach ($usuarios as $key => $value): ?>
    <div class="modal fade" id="usuario{{ $value->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">{{$value->nome}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form method="post" action="/form" class="form container">
            <div class="modal-body row">

              @csrf
              <input class="form-control" type="hidden" value="{{$value->id}}" min="1" name="id">


              <div class="col-4">
                <label>
                  nome: <input class="form-control" type="text" value="{{$value->nome}}" name="nome">
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

                <button class="btn btn-info" type="submit" name="delete">deletar</button>
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" name="cadastrar">Save changes</button>
            </div>
          </form>
        </div>
      </div>
    </div>

  <?php endforeach ?>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="cadastrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Cadastrar formulário</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="/form" class=" form container">
        <div class="modal-body row">

          @csrf

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


        </div>
        <div class="modal-footer">
          <button class="btn btn-info" type="submit" name="cadastrar">Enviar</button>
        </div>
      </form>


    </div>
  </div>

</div>


<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($usuariostransferir as $key => $value): ?>
     <tr>
      <td>
        {{ $value->form->nome}}
      </td>
      <td>
        <a href="/deletelista/{{ $value->id}}" class="btn btn-danger">Excluir</a>
      </td>
    </tr>
  <?php endforeach ?>

</tbody>
</table>



@endsection


