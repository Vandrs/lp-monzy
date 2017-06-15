<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="robots" content="index, follow">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="content-type" content="text/html;charset=utf-8">
    <title>{{ config('app.name') }} | O Maior time de Experts em Jogos</title>
    <link rel="manifest" href="/manifest.json">
    @include('partials.favicon')
    <meta name="description" content="Monzy, o maior time de Experts em Jogos. Jogue, Ensine e receba por isso.">
    @if(config('app.env') == 'production')
    <link rel="canonical" href="https://play.monzy.com.br">
    @endif
        <meta property="og:title" content="Monzy, o maior time de Experts em Jogos.">
        <meta property="og:description" content="Você já imaginou ganhar dinheiro jogando online ou até mesmo melhorar sua performance com jogadores experientes a qualquer momento? A nova plataforma Monzy oferece essa oportunidade única para quem é apaixonado pelo mundo dos jogos.">
        <meta property="og:site_name" content="Monzy">
        <meta property="og:type" content="website">
        <meta property="og:locale" content="pt_BR">
        <meta property="og:url" content="{{url('')}}">
        <meta property="og:image" content="{{url('/images/logo-share.png')}}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Styles -->
    <link href="{{ asset('css/site.css') }}" rel="stylesheet">
    @if(config('app.env') == 'production')
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-100347442-2', 'auto');
        ga('send', 'pageview');

    </script>
    @endif
</head>
<body id="home">
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
                <span class="sr-only">Menu</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{url('/')}}"><img src="{{url('/images/logo-header.png')}}" title="Monzy" alt="Logo Monzy"></a>
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
            <div class="col-xs-12 col-md-10">
                <div class="title-area left">
                    <h1>ESTAMOS CONSTRUINDO <br /> O <strong>MAIOR TIME DE EXPERTS</strong> EM JOGOS</h1>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container section-content" id="about">
        <div class="row">
            <div class="col-xs-12 col-md-8 col-md-offset-2 text-center">
                <h2>JOGUE ENSINE E <strong>RECEBA</strong> POR ISSO</h2>
            </div>
            <div class="col-xs-12 col-md-8 col-md-offset-2 text-center text-about">
                Você já imaginou <strong>ganhar dinheiro jogando online</strong> ou até mesmo melhorar sua performance com 
                <strong>jogadores experientes</strong> a qualquer momento? A nova plataforma <storng>Monzy</storng> oferece essa oportunidade 
                única para quem é apaixonado pelo mundo dos jogos. A plataforma <strong>conecta jogadores de alto, médio e 
                baixo nível</strong>, possibilitando um treinamento para <strong>melhorar o seu nível de habilidade</strong>
                 e fazer com que o cenário do e-Sports cresça cada vez mais.
            </div>
            <div class="col-xs-12 col-md-10 col-md-offset-1 hidden-xs hidden-sm">
                <div class="game-cover">
                </div>
            </div>
        </div>
    </div>
    <div class="bg-form-content">
    
    <div class="container section-form" id="contact">
        <div class='row'>
            <div class="col-xs-12 col-md-4 col-md-offset-4 text-center">
                <h2>Deixe o seu contato <strong>contato</strong> para ser <strong>um dos primeiros</strong> a fazer parte do time <strong>Monzy</strong>.</h2>
            </div>
        </div>
        <div class='row'>
            <div class="col-xs-12 col-md-4 col-md-offset-4">
                <div class="leadFormArea">
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
    </div>
    </div>
    
    
    <div class="container section-footer text-center">
        <div class="row">
            <div class="col-xs-12 footer">
                <ul class="footer-menu">
                    <li><a href="#home">HOME</a></li>
                    <li><a href="#about">SOBRE</a></li>
                    <li><a href="#contact">CONTATO</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                MONZY © COPYRIGHT 2017. TODOS OS DIREITOS RESERVADOR
            </div>
        </div>
    </div>
    
     
    <!-- Scripts -->
    <script src="{{ asset('js/site.js') }}"></script>
</body>
</html>
