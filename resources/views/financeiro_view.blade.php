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
          <a class="nav-link" href="{{url('sair')}}">Sair</a>
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
            </tr>
            </thead>
            <tbody>
            @foreach ($financas as $financa)
                <tr>
                <td>{{ $financa->descricao }}</td>
                <td>{{ $financa->valor }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        </div>
    </div>
    </div>                            
</div>