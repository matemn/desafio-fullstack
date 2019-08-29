<!DOCTYPE html>
<html>
<head>
	<title>
		Início - Lista de Usuários
	</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/header.css">
	<link rel="stylesheet" type="text/css" href="css/body.css">
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

          <li class="nav-item active">
            <a class="nav-link" href="inicio">Início
              <span class="sr-only">(atual)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="cadastro">Cadastrar Usuários</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</div>

<div class="container" style="margin-top: 6em;">
	<div>
		<div class="botao">
			<a href="cadastro">
				<button type="button" class="btn btn-success">Cadastrar usuário</button>
			</a>
		</div>
		@if (Session::has('msg_delete'))
    		<div class="alert alert-success">
        		<ul>
                	<li>{{ Session::get('msg_delete') }}</li>
        		</ul>
    		</div>
		@elseif (Session::has('msg_update'))
			<div class="alert alert-success" style="height: 30%!important;">
        		<ul>
                	<li>{{ Session::get('msg_update') }}</li>
        		</ul>
    		</div>
		@endif   
	</div>

	<table class="table">
	  <thead>
	    <tr>
	      <th scope="col">Nome</th>
	      <th scope="col">Telefone</th>
	      <th scope="col">CPF</th>
	      <th scope="col">Data</th>
	      <th scope="col">Ação</th>
	    </tr>
	  </thead>
	  <tbody>
		@foreach ($lista_usuarios as $linha)
		    <tr>
		      <td>{{$linha->nome}}</td>
		      <td>{{$linha->telefone}}</td>
		      <td>
		      	{{substr($linha->cpf, 0, 3).'.'.substr($linha->cpf, 3, 3).'.'.substr($linha->cpf, 6, 3).'-'.substr($linha->cpf, 9, 2)}}
		      </td>
		      <td>{{$linha->created_at}}</td>
		      <td>
			      	<a href="editar/{{$linha->id}}"><i class="fa fa-pencil"></i></a> 

			      	<a href="deletar/{{$linha->id}}"><i class="fa fa-trash"></i></a>
		      </td>
		    </tr>
		@endforeach
	  </tbody>
	</table>
{{$paginate_links->links()}}
</div>

</body>
</html>