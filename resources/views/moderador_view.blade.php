@extends('dashboard')
<nav class="navbar navbar-expand-lg navbar-dark bg-dark menu">
  <div class="container">
    <a class="navbar-brand" href="#">Logo</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="{{url('area_moderador/listar_financas')}}">Gerenciar finanças</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('/sair')}}">Sair</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="tabela-content">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-8">
            <table class="table table-striped">
              <thead>
                <tr>
                    <th>Financas</th>
                    <th>Valor</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($financas as $financa)
                  <tr>
                    <td>{{ $financa->descricao }}</td>
                    <td>{{ $financa->valor }}</td>
                    <td>
                      <a href="#" onclick="editarFinanca(event, '{{ $financa->id_financeiro }}','{{ $financa->descricao }}','{{ $financa->valor }}')", class="btn btn-primary">Editar</a>
                    </td>
                    <td>
                      <a href="#" onclick="excluirFinanca(event, {{ $financa->id_financeiro }})" class="btn btn-danger">Excluir</a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>                            
  </div>
  <div class="modal fade" id="modalEditarFinanca" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Finança</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="POST" action="{{ route('editarFinanca') }}" data-parsley-validate="">
              @csrf
              <div class="form-group">
                  <input type="hidden" name="area" value="area_moderador" class="form-control" required="">
              </div>
              <div class="form-group">
                  <input type="hidden" name="id_financa" id="id_financa" class="form-control" required="">
              </div>
              <div class="form-group">
                  <label for="email">Finanças:</label>
                  <input type="text" placeholder="Finanças" name="financa" id="financa_input" class="form-control" required="">
              </div>
              <div class="form-group" id="email-required" style="display:none">
                  <p class="text text-danger">*Email obrigatório</p>
              </div>
              <div class="form-group">
                  <label for="password">Valor:</label>
                  <input type="text" placeholder="senha" name="valor_financa" id="valor_input" class="form-control" required="">
              </div>
              <div class="form-group" id="senha-required" style="display:none">
                  <p class="text text-danger">*Senha obrigatória</p>
              </div>
              <br>
              <div class="d-grid gap-2">
                <button class="btn btn-success" type="submit" id="btnLogar">Salvar</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script>
    function excluirFinanca(event, id_financeiro) {
      event.preventDefault();
      if (confirm('Realmente deseja excluir esse registro?')) {
        axios.delete('{{ route('excluirFinanca', '') }}/' + id_financeiro,{userTipo:'moderador'})
        .then(response => {
            // Handle success response
            if(response.data == 1){
              alert("Finança excluida com sucesso!");
              window.location.href="../../public/area_moderador/listar_financas";
            }else{
              alert("Erro ao excluir finança!");
            }
            // Optionally, update the table or perform other actions
        })
        .catch(error => {
            // Handle error response
            alert("Erro ao excluir finança!");
        });
      }
    }
    function editarFinanca(event, id_financeiro,descricao,valor) {
      var campo_id_financa = document.getElementById("id_financa").value = id_financeiro;
      var campo_financa = document.getElementById("financa_input").value = descricao;
      var campo_financa_valor = document.getElementById("valor_input").value = valor;
      $("#modalEditarFinanca").modal('show');
    }
  </script>