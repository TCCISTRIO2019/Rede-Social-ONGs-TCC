<div class="row justify-content-md-center">
    <h4 class="col-md-auto">Conversas</h4>
</div>

<main class="row justify-content-md-center container">
    <div class="container-fluid col-md-12 card-deck mt-3 row row-cols-1 row-cols-md-3">
        <!-- Instituicoes -->
        <?php
        foreach ($conversas as $conversa){
        ?>
        <div class="col mb-4">
            <nav class="shadow nav card border-secondary rounded">
                <!-- Link Instituicao -->
                <a class="text-reset nav-link p-0 mb-6" href="<?php echo base_url('/conversa/id_'.$conversa->id_conversa); ?>">
                    <div class="card-active-listener mb-3">
                        <div class="card-body">
                            <div class="media">
                                <div class="avatar mr-5">
                                    <img class="avatar-img rounded-circle" src="<?php echo base_url($conversa->foto_perfil); ?>" alt="..." style="max-width: 5rem;  max-height: 5rem; object-fit: cover;">
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
        </div>
        <?php
        }
        ?>
        <!-- Instituicoes -->

    </div>

<!--    <section class="col-md-3">-->
<!--    </section>-->
</main>