<header>
    <!-- Modificar para nao ter o login -->
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
          </ul>

        </div>
      </div>
    </nav>
</header>