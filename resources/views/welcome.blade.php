<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="robots" content="index, follow">
    <title>{{ config('app.name') }} | O Maior time de Experts em Jogos</title>
    <meta name="description" content="Monzy, o maior time de Experts em Jogos. Jogue, Ensine e receba por isso.">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="content-type" content="text/html;charset=utf-8">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="canonical" href="https://www.hagah.com.br/">

    <!-- Styles -->
    <link href="{{ asset('css/site.css') }}" rel="stylesheet">
</head>
<body>
    
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">Monzy</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse navbar-right">
          <ul class="nav navbar-nav">
            <li><a href="#home">HOME</a></li>
            <li><a href="#about">SOBRE</a></li>
            <li><a href="#contact">CONTATO</a></li>
          </ul>
        </div>
      </div>
    </nav>
    
        <div class="container">
            <div class='row'>
                <div class="col-xs-12 col-md-4 col-md-offset-4 leadFormArea">
                    <form id="leadForm" action="#" method="POST">
                        <div class="row">
                            <div class="col-xs-12 alert-container">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="name" class="control-label">Nome</label>
                                    <input type="text" name="name" id="name" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="email" class="control-label">E-mail</label>
                                    <input type="text" name="email" id="email" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="phone" class="control-label">Telefone</label>
                                    <input type="text" name="phone" id="phone" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="profile" class="control-label">Gostaria de ser um</label>
                                    <select name="profile" id="profile" class="form-control">
                                        <option value="">Selecione</option>
                                        <option value="student">Aluno</option>
                                        <option value="teacher">Treinador</option>
                                        <option value="both">Ambos</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <button type="submit" id="submitForm" class="btn btn-default">Play</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <!-- Scripts -->
    <script src="{{ asset('js/site.js') }}"></script>
</body>
</html>
