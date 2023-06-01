@extends('layout.master-mini')
@section('content')
    <div class="container-fluid page-body-wrapper full-page-wrapper">

<div class="content-wrapper auth p-0 theme-two">
  <div class="row d-flex align-items-stretch">
    <div class="col-md-4 banner-section d-none d-md-flex align-items-stretch justify-content-center">
      <img class="slide-content" src="img/login.png" alt="">
    </div>
    <div class="col-12 col-md-8 h-100 bg-white">
      <div class="auto-form-wrapper d-flex align-items-center justify-content-center flex-column">
        <form action="{{ route('login.auth') }}" method="POST">
            {{ csrf_field() }}
          <h3 class="mr-auto">Seja muito bem vindo!</h3>
          <p class="mb-5 mr-auto">Introduza seus dados abaixo para Iniciar.</p>
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="mdi mdi-account-outline"></i>
                </span>
              </div>
              <input type="text" name="email" class="form-control" placeholder="Nome de Usuário">
            </div>
          </div>
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="mdi mdi-lock-outline"></i>
                </span>
              </div>
              <input type="password" name="password" class="form-control" placeholder="Senha">
            </div>
          </div>
          <div class="form-group">
            <button class="btn btn-primary submit-btn">Iniciar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

    </div>
  </div>
@endsection
