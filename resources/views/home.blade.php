<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title','Sabor do Brasil')</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
  
  <main>
    
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="loginModalLabel">Login</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="modal-body">
              <div class="form-group">
                <input placeholder="Email" type="email" class="form-control" id="email" name="email" required>
              </div>
              <div class="form-group">
                <input placeholder="Senha" type="password" class="form-control" id="senha" name="senha" required>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
              <button type="submit" class="btn btn-primary">Entrar</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <h1 class="text-center navbar-dark bg-primary py-3">Sabor do Brasil</h1>
    <div class="container mt-4">
      <div class="row">

        <div class="col">
          <img class="rounded mx-auto d-block mb-3" src="{{ asset('imagens/logo.png') }}" alt="logo" style="max-width:150px;">
          <h5 class="text-center border-bottom border-dark pb-2">Sabor do Brasil</h5>
          <div class="container mt-3">
            <div class="row">
              <div class="col">
                <h3 class="text-center">0</h3>
                <h6 class="text-center">Quantidade de Likes</h6>
              </div>
              <div class="col">
                <h3 class="text-center">0</h3>
                <h6 class="text-center">Quantidade de Dislikes</h6>
              </div>
            </div>
          </div>
        </div>


        <div class="col-6 border-left border-right border-dark">
          <h5 class="text-center mb-4">Publicações</h5>
          <div class="d-flex flex-column align-items-center">
            @foreach($publicacoes as $publicacao)
              <div class="border border-dark p-3 mb-4 w-75 text-center rounded">
                <h6>{{ $publicacao->titulo_prato }}</h6>
                <img src="{{ asset($publicacao->foto) }}" alt="{{ $publicacao->titulo_prato }}" class="img-fluid mb-2" style="max-height:200px;">
                <div class="row">
                  <p class="col text-left">{{ $publicacao->local }}</p>
                  <p class="col text-right">{{ $publicacao->cidade }}</p>
                </div>
                <button class="btn btn-light">
                  <img src="{{ asset('imagens/flecha_cima_vazia.jpeg') }}" alt="like">
                </button>
                <button class="btn btn-light">
                  <img src="{{ asset('imagens/flecha_baixo_vazia.jpeg') }}" alt="dislike">
                </button>
                <button class="btn btn-light">
                  <img src="{{ asset('imagens/chat.jpeg') }}" alt="chat">
                </button>
              </div>
            @endforeach
          </div>
        </div>


        <div class="col text-center">
          <button type="button" class="btn btn-danger btn-lg text-center mt-4" data-toggle="modal" data-target="#loginModal">
            Entrar
          </button>
        </div>
      </div>
    </div>
  </main>


  <footer class="bg-dark text-white container-fluid mt-5 py-3">
    <div class="container">
      <div class="row align-items-center">
        <div class="col text-center">
          <p class="mb-0">Sabor do Brasil</p>
        </div>
        <div class="col-6">
          <nav class="nav justify-content-center">
            <a class="nav-link text-white" href="#"><img src="{{ asset('imagens/Instagram.svg') }}" alt="Insta"></a>
            <a class="nav-link text-white" href="#"><img src="{{ asset('imagens/Whatsapp.svg') }}" alt="Whats"></a>
            <a class="nav-link text-white" href="#"><img src="{{ asset('imagens/Twitter.svg') }}" alt="Twitter"></a>
            <a class="nav-link text-white" href="#"><img src="{{ asset('imagens/Globe.svg') }}" alt="Google"></a>
          </nav>
        </div>
        <div class="col text-center">
          <p class="mb-0">&copy; Direitos Autorais 2025</p>
        </div>
      </div>
    </div>
  </footer>

  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" crossorigin="anonymous"></script>
</body>
</html>