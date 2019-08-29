<!DOCTYPE html>
<html>
<head>
	<title>
		 Cadastrar Usuários
	</title>
  <meta charset="utf-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script type="text/javascript" src="js/cep.js"></script>
  <link rel="stylesheet" type="text/css" href="css/header.css">
  <link rel="stylesheet" type="text/css" href="../css/header.css"> <!-- css pra /edit nesta página -->
  <link rel="stylesheet" type="text/css" href="css/body.css">
  <link rel="stylesheet" type="text/css" href="../css/body.css"> <!-- css pra /edit nesta página -->
</head>
<body>

<div class="fixed-top">
  <header class="topbar">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <ul class="social-network">
              <li><a class="waves-effect waves-dark" href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a class="waves-effect waves-dark" href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a class="waves-effect waves-dark" href="#"><i class="fa fa-linkedin"></i></a></li>
              <li><a class="waves-effect waves-dark" href="#"><i class="fa fa-pinterest"></i></a></li>
              <li><a class="waves-effect waves-dark" href="#"><i class="fa fa-google-plus"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
  </header>
  <nav class="navbar navbar-expand-lg navbar-dark mx-background-top-linear">
    <div class="container">
      <a class="navbar-brand" href="index" style="text-transform: uppercase;"> DESAFIO-FULLSTACK.COM</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="inicio">Início
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="cadastro">Cadastrar Usuários</a>
            <span class="sr-only">(atual)</span>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</div>

<div class="container"  style="margin-top: 6em;">

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (Session::has('msg_sucesso'))
    <div class="alert alert-success">
        <ul>
                <li>{{ Session::get('msg_sucesso') }}</li>
        </ul>
    </div>
@endif    

@if (!empty($retorna_user->nome))
<form method="get" action="{{url('salvarEdicao')}}">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="nome">Nome<span>*</span></label>
      <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" value="{{$retorna_user->nome}}" required="required" maxlength="32">
    </div>
    <div class="form-group col-md-6">
      <label for="cpf">CPF<span>*</span></label>
      <input type="number" class="form-control" id="cpf" name="cpf" placeholder="CPF" value="{{$retorna_user->cpf}}" required="required" maxlength="11">
    </div>
    <div class="form-group col-md-6">
      <label for="telefone">Telefone<span>*</span></label>
      <input type="number" class="form-control" id="telefone" name="telefone" placeholder="Telefone" value="{{$retorna_user->telefone}}" required="required" maxlength="15">
    </div>
    <div class="form-group col-md-6">
      <label for="nascimento">Data de Nascimento<span>*</span></label>
      <input type="date" class="form-control" id="nascimento" name="nascimento" placeholder="Ex: 25/11/1997" value="{{$retorna_user->nascimento}}" required="required">
    </div>
  </div>

<div class="form-row">
    <div class="form-group col-md-6">
      <label for="cep">CEP<span>*</span></label>
      <input type="text" class="form-control" id="cep" name="cep" placeholder="Ex: 79980000" onblur="pesquisacep(this.value);"value="{{$retorna_user->cep}}" required="required" maxlength="10">
    </div>
    <div class="form-group col-md-6">
      <label for="cep">Estado (UF)<span>*</span></label>
      <input type="text" class="form-control" id="uf" name="uf" placeholder="Estado" value="{{$retorna_user->uf}}" required="required" maxlength="2">
    </div>
    <div class="form-group col-md-6">
      <label for="cep">Cidade<span>*</span></label>
      <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Cidade" value="{{$retorna_user->cidade}}" required="required" maxlength="40"> 
    </div>
    <div class="form-group col-md-6">
      <label for="cep">Bairro<span>*</span></label>
      <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Bairro" value="{{$retorna_user->bairro}}" required="required" maxlength="40">
    </div>
    <div class="form-group col-md-6">
      <label for="cep">Complemento</label>
      <input type="text" class="form-control" id="complemento" name="complemento" placeholder="Algum ponto de referencia" value="{{$retorna_user->complemento}}" maxlength="50">
    </div>
</div>

<button type="submit" class="btn btn-success">Salvar</button>
</form>

@else
<form method="get" action="{{url('criar')}}">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="nome">Nome<span>*</span></label>
      <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" required="required" maxlength="32">
    </div>
    <div class="form-group col-md-6">
      <label for="cpf">CPF<span>*</span></label>
      <input type="number" class="form-control" id="cpf" name="cpf" placeholder="CPF" required="required" maxlength="11">
    </div>
    <div class="form-group col-md-6">
      <label for="telefone">Telefone<span>*</span></label>
      <input type="number" class="form-control" id="telefone" name="telefone" placeholder="Telefone" required="required" maxlength="15">
    </div>
    <div class="form-group col-md-6">
      <label for="nascimento">Data de Nascimento<span>*</span></label>
      <input type="date" class="form-control" id="nascimento" name="nascimento" placeholder="Ex: 25/11/1997" required="required">
    </div>
  </div>
  
<div class="form-row">
    <div class="form-group col-md-6">
      <label for="cep">CEP<span>*</span></label>
      <input type="text" class="form-control" id="cep" name="cep" placeholder="Ex: 79980000" onblur="pesquisacep(this.value);" required="required" maxlength="10">
    </div>
    <div class="form-group col-md-6">
      <label for="cep">Estado (UF)<span>*</span></label>
      <input type="text" class="form-control" id="uf" name="uf" placeholder="Estado" required="required" maxlength="2">
    </div>
    <div class="form-group col-md-6">
      <label for="cep">Cidade<span>*</span></label>
      <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Cidade" required="required" maxlength="40">
    </div>
    <div class="form-group col-md-6">
      <label for="cep">Bairro<span>*</span></label>
      <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Bairro" required="required" maxlength="40">
    </div>

    <div class="form-group col-md-6">
      <label for="cep">Complemento</label>
      <input type="text" class="form-control" id="complemento" name="complemento" placeholder="Algum ponto de referencia" maxlength="50">
    </div>
</div>
     <button type="submit" class="btn btn-success">Enviar e Cadastrar</button>
</form>
@endif
</div>

</body>
</html>