@extends('layout.master')

@section('content')
    <div id="acesso">
        <div class="accordion accordion-flush" id="accordionLogin">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                        Acesso ao Logista
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                    data-bs-parent="#accordionLogin">
                    <div class="accordion-body d-flex justify-content-center">
                        <a href="#" class="btn btn-primary button-login">Acesso</a>
                        <a href="#" class="btn btn-primary button-login">Cadastro</a>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Acesso ao Usuario
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                    data-bs-parent="#accordionLogin">
                    <div class="accordion-body d-flex justify-content-center">
                        <a href="#" class="btn btn-primary button-login">Acesso</a>
                        <a href="#" class="btn btn-primary button-login">Cadastro</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
