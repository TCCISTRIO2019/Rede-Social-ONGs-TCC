<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <!-- Procurar maneira de verificar se a pessoa esta logada ou não para mudar o header -->

        <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button> -->

        <div class="collapse navbar-collapse" id="navbarsExample07">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url('iniciar') ?>">TCC Rede Social <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="<?php echo base_url('home') ?>">Home </a>
            </li>

            <!-- <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown07" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
              <div class="dropdown-menu" aria-labelledby="dropdown07">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </li> -->
          </ul>

          <!-- Ajustar tamanho dos campos -->
          <form class="form-inline my-2 my-md-0" method="POST" action="">
            <label class="sr-only" for="inlineFormInputName2">Email</label>
            <input type="email" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Email">

            <label class="sr-only" for="inlineFormInputGroupUsername2">Senha</label>
            <div class="input-group mb-2 mr-sm-2">
              <input type="password" class="form-control" id="inlineFormInputGroupUsername2" placeholder="Senha">
            </div>

            <button type="submit" class="btn btn-primary mb-2">Login</button>
          </form>

        </div>
      </div>
    </nav>
</header>