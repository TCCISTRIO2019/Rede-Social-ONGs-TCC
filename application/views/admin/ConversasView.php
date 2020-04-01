<div class="row justify-content-md-center">
    <h4 class="col-md-auto">Conversas</h4>
</div>

<main class="row justify-content-md-center">
    <div class="container-fluid py-6 col-md-12">
        <!-- Instituicoes -->
        <?php
        foreach ($conversas as $conversa){
        ?>
        <nav class="shadow p-3 nav d-block list-discussions-js mb-n6 col-md-4">
            <!-- Link Instituicao -->
            <a class="text-reset nav-link p-0 mb-6" href="<?php echo base_url('/conversa/id_'.$conversa->id_conversa); ?>">
                <div class="card card-active-listener mb-3">
                    <div class="card-body">

                        <div class="media">

                            <div class="avatar mr-5">
                                <img class="avatar-img rounded-circle" src="<?php echo $conversa->foto_perfil; ?>" alt="..." style="max-width: 5rem; object-fit: cover;">
                            </div>

                            <div class="media-body overflow-hidden">
                                <div class="d-flex align-items-center mb-1">
                                    <h6 class="text-truncate mb-0 mr-auto"><?php echo $conversa->nome; ?></h6>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </a>
            <!-- Link Instituicao -->
        </nav>
            <?php
        }
        ?>
        <!-- Instituicoes -->

    </div>

<!--    <section class="col-md-3">-->
<!--    </section>-->
</main>