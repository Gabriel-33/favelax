@extends('layouts')
    <div class="login-content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header text-center">LOGIN</div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('users.login') }}">
                                @csrf
                                @if(isset($erroLogin) && $erroLogin === true)
                                    <div class="form-group" id="email-required">
                                        <p class="text text-center text-danger">Email e/ou senha incorreto(s)!</p>
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label for="email">E-mail:</label>
                                    <input type="text" placeholder="email" name="email" id="email" class="form-control">
                                </div>
                                <div class="form-group" id="email-required" style="display:none">
                                    <p class="text text-danger">*Email obrigatório</p>
                                </div>
                                <div class="form-group">
                                    <label for="password">Senha:</label>
                                    <input type="password" placeholder="senha" name="senha" id="senha" class="form-control">
                                </div>
                                <div class="form-group" id="senha-required" style="display:none">
                                    <p class="text text-danger">*Senha obrigatória</p>
                                </div>
                                <br>
                                <div class="d-grid gap-2">
                                    <button class="btn btn-primary" type="submit" id="btnLogar">Entrar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

