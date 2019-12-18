
<section class="container col-md-6">
    <div class="row justify-content-md-center">
        <h4 class="col-md-auto">Publicacoes</h4>
    </div>
    <div class="row justify-content-md-center">
        <div class="col-md-auto">
            <ul class="list-unstyled">
                <?php
                foreach ($publicacoes as $publicacao){
                    ?>
                    <li class="card bg-light" style="width: 30rem;">
                        <div class="card-body">
                            <h5 class="card-title">Usuario: <a href="<?php echo base_url('autor/'.$publicacao->id_usuario.'/'.limpar($publicacao->nome)) ?>">
                                    <?php echo $publicacao->nome ?> </a>
                            </h5>
                        </div>
                        <img src="http://s2.glbimg.com/7Et2QlxLzBs1FQ5Z_C-GDSa2DTE=/i.glbimg.com/og/ig/infoglobo1/f/original/2017/01/16/blog_shark.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text"> <?php echo $publicacao->corpo ?> </p>
                        </div>
<!--                        <ul class="list-group list-group-flush">-->
<!--                            <li class="list-group-item">Cras justo odio</li>-->
<!--                            <li class="list-group-item">Dapibus ac facilisis in</li>-->
<!--                            <li class="list-group-item">Vestibulum at eros</li>-->
<!--                        </ul>-->
                        <div class="card-body">
                            <p class="card-text"> Curtidas: <a href="#" class="card-link"><?php echo $publicacao->curtidas ?></a> </p>
                            <p class="card-text"> Postado em: <?php echo postadoem($publicacao->data_criacao) ?></p>
                        </div>
                    </li>
                    <br><br>
<!--                    <li>ID: --><?php //echo $publicacao->id_publicacao ?><!--</li>-->
<!--                    <li>Usuario: <a href="--><?php //echo base_url('autor/'.$publicacao->id_usuario.'/'.limpar($publicacao->nome)) ?><!--">-->
<!--                            --><?php //echo $publicacao->nome ?><!-- </a>-->
<!--                    </li>-->
<!--                    <li>Corpo: --><?php //echo $publicacao->corpo ?><!--</li>-->
<!--                    <li>Curtidas: --><?php //echo $publicacao->curtidas ?><!--</li>-->
<!--                    <li>Imagem: --><?php //echo $publicacao->imagem ?><!--</li>-->
<!--                    <li>Data Publicacao: --><?php //echo postadoem($publicacao->data_criacao) /*Helper*/ ?><!--</li>-->
<!--                    <br><br>-->
                    <?php
                }
                ?>
            </ul>
        </div>
    </div>
</section>

<!--<div class="col-lg-6 col-md-8 no-pd">-->
<!--    <div class="main-ws-sec">-->
<!--        <div class="post-topbar">-->
<!--            <div class="user-picy">-->
<!--                <img src="images/resources/user-pic.png" alt="">-->
<!--            </div>-->
<!--            <div class="post-st">-->
<!--                <ul>-->
<!--                    <li><a class="post_project" href="#" title="">Post a Project</a></li>-->
<!--                    <li><a class="post-jb active" href="#" title="">Post a Job</a></li>-->
<!--                </ul>-->
<!--            </div><!--post-st end-->-->
<!--        </div><!--post-topbar end-->-->
<!--        <div class="posts-section">-->
<!--            <div class="post-bar">-->
<!--                <div class="post_topbar">-->
<!--                    <div class="usy-dt">-->
<!--                        <img src="images/resources/us-pic.png" alt="">-->
<!--                        <div class="usy-name">-->
<!--                            <h3>John Doe</h3>-->
<!--                            <span><img src="images/clock.png" alt="">3 min ago</span>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="ed-opts">-->
<!--                        <a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>-->
<!--                        <ul class="ed-options">-->
<!--                            <li><a href="#" title="">Edit Post</a></li>-->
<!--                            <li><a href="#" title="">Unsaved</a></li>-->
<!--                            <li><a href="#" title="">Unbid</a></li>-->
<!--                            <li><a href="#" title="">Close</a></li>-->
<!--                            <li><a href="#" title="">Hide</a></li>-->
<!--                        </ul>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="epi-sec">-->
<!--                    <ul class="descp">-->
<!--                        <li><img src="images/icon8.png" alt=""><span>Epic Coder</span></li>-->
<!--                        <li><img src="images/icon9.png" alt=""><span>India</span></li>-->
<!--                    </ul>-->
<!--                    <ul class="bk-links">-->
<!--                        <li><a href="#" title=""><i class="la la-bookmark"></i></a></li>-->
<!--                        <li><a href="#" title=""><i class="la la-envelope"></i></a></li>-->
<!--                    </ul>-->
<!--                </div>-->
<!--                <div class="job_descp">-->
<!--                    <h3>Senior Wordpress Developer</h3>-->
<!--                    <ul class="job-dt">-->
<!--                        <li><a href="#" title="">Full Time</a></li>-->
<!--                        <li><span>$30 / hr</span></li>-->
<!--                    </ul>-->
<!--                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam luctus hendrerit metus, ut ullamcorper quam finibus at. Etiam id magna sit amet... <a href="#" title="">view more</a></p>-->
<!--                    <ul class="skill-tags">-->
<!--                        <li><a href="#" title="">HTML</a></li>-->
<!--                        <li><a href="#" title="">PHP</a></li>-->
<!--                        <li><a href="#" title="">CSS</a></li>-->
<!--                        <li><a href="#" title="">Javascript</a></li>-->
<!--                        <li><a href="#" title="">Wordpress</a></li>-->
<!--                    </ul>-->
<!--                </div>-->
<!--                <div class="job-status-bar">-->
<!--                    <ul class="like-com">-->
<!--                        <li>-->
<!--                            <a href="#"><i class="fas fa-heart"></i> Like</a>-->
<!--                            <img src="images/liked-img.png" alt="">-->
<!--                            <span>25</span>-->
<!--                        </li>-->
<!--                        <li><a href="#" class="com"><i class="fas fa-comment-alt"></i> Comment 15</a></li>-->
<!--                    </ul>-->
<!--                    <a href="#"><i class="fas fa-eye"></i>Views 50</a>-->
<!--                </div>-->
<!--            </div><!--post-bar end-->-->
<!--            <div class="top-profiles">-->
<!--                <div class="pf-hd">-->
<!--                    <h3>Top Profiles</h3>-->
<!--                    <i class="la la-ellipsis-v"></i>-->
<!--                </div>-->
<!--                <div class="profiles-slider">-->
<!--                    <div class="user-profy">-->
<!--                        <img src="images/resources/user1.png" alt="">-->
<!--                        <h3>John Doe</h3>-->
<!--                        <span>Graphic Designer</span>-->
<!--                        <ul>-->
<!--                            <li><a href="#" title="" class="followw">Follow</a></li>-->
<!--                            <li><a href="#" title="" class="envlp"><img src="images/envelop.png" alt=""></a></li>-->
<!--                            <li><a href="#" title="" class="hire">hire</a></li>-->
<!--                        </ul>-->
<!--                        <a href="#" title="">View Profile</a>-->
<!--                    </div><!--user-profy end-->-->
<!--                    <div class="user-profy">-->
<!--                        <img src="images/resources/user2.png" alt="">-->
<!--                        <h3>John Doe</h3>-->
<!--                        <span>Graphic Designer</span>-->
<!--                        <ul>-->
<!--                            <li><a href="#" title="" class="followw">Follow</a></li>-->
<!--                            <li><a href="#" title="" class="envlp"><img src="images/envelop.png" alt=""></a></li>-->
<!--                            <li><a href="#" title="" class="hire">hire</a></li>-->
<!--                        </ul>-->
<!--                        <a href="#" title="">View Profile</a>-->
<!--                    </div><!--user-profy end-->-->
<!--                    <div class="user-profy">-->
<!--                        <img src="images/resources/user3.png" alt="">-->
<!--                        <h3>John Doe</h3>-->
<!--                        <span>Graphic Designer</span>-->
<!--                        <ul>-->
<!--                            <li><a href="#" title="" class="followw">Follow</a></li>-->
<!--                            <li><a href="#" title="" class="envlp"><img src="images/envelop.png" alt=""></a></li>-->
<!--                            <li><a href="#" title="" class="hire">hire</a></li>-->
<!--                        </ul>-->
<!--                        <a href="#" title="">View Profile</a>-->
<!--                    </div><!--user-profy end-->-->
<!--                    <div class="user-profy">-->
<!--                        <img src="images/resources/user1.png" alt="">-->
<!--                        <h3>John Doe</h3>-->
<!--                        <span>Graphic Designer</span>-->
<!--                        <ul>-->
<!--                            <li><a href="#" title="" class="followw">Follow</a></li>-->
<!--                            <li><a href="#" title="" class="envlp"><img src="images/envelop.png" alt=""></a></li>-->
<!--                            <li><a href="#" title="" class="hire">hire</a></li>-->
<!--                        </ul>-->
<!--                        <a href="#" title="">View Profile</a>-->
<!--                    </div><!--user-profy end-->-->
<!--                    <div class="user-profy">-->
<!--                        <img src="images/resources/user2.png" alt="">-->
<!--                        <h3>John Doe</h3>-->
<!--                        <span>Graphic Designer</span>-->
<!--                        <ul>-->
<!--                            <li><a href="#" title="" class="followw">Follow</a></li>-->
<!--                            <li><a href="#" title="" class="envlp"><img src="images/envelop.png" alt=""></a></li>-->
<!--                            <li><a href="#" title="" class="hire">hire</a></li>-->
<!--                        </ul>-->
<!--                        <a href="#" title="">View Profile</a>-->
<!--                    </div><!--user-profy end-->-->
<!--                    <div class="user-profy">-->
<!--                        <img src="images/resources/user3.png" alt="">-->
<!--                        <h3>John Doe</h3>-->
<!--                        <span>Graphic Designer</span>-->
<!--                        <ul>-->
<!--                            <li><a href="#" title="" class="followw">Follow</a></li>-->
<!--                            <li><a href="#" title="" class="envlp"><img src="images/envelop.png" alt=""></a></li>-->
<!--                            <li><a href="#" title="" class="hire">hire</a></li>-->
<!--                        </ul>-->
<!--                        <a href="#" title="">View Profile</a>-->
<!--                    </div><!--user-profy end-->-->
<!--                </div><!--profiles-slider end-->-->
<!--            </div><!--top-profiles end-->-->
<!--            <div class="post-bar">-->
<!--                <div class="post_topbar">-->
<!--                    <div class="usy-dt">-->
<!--                        <img src="images/resources/us-pic.png" alt="">-->
<!--                        <div class="usy-name">-->
<!--                            <h3>John Doe</h3>-->
<!--                            <span><img src="images/clock.png" alt="">3 min ago</span>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="ed-opts">-->
<!--                        <a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>-->
<!--                        <ul class="ed-options">-->
<!--                            <li><a href="#" title="">Edit Post</a></li>-->
<!--                            <li><a href="#" title="">Unsaved</a></li>-->
<!--                            <li><a href="#" title="">Unbid</a></li>-->
<!--                            <li><a href="#" title="">Close</a></li>-->
<!--                            <li><a href="#" title="">Hide</a></li>-->
<!--                        </ul>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="epi-sec">-->
<!--                    <ul class="descp">-->
<!--                        <li><img src="images/icon8.png" alt=""><span>Epic Coder</span></li>-->
<!--                        <li><img src="images/icon9.png" alt=""><span>India</span></li>-->
<!--                    </ul>-->
<!--                    <ul class="bk-links">-->
<!--                        <li><a href="#" title=""><i class="la la-bookmark"></i></a></li>-->
<!--                        <li><a href="#" title=""><i class="la la-envelope"></i></a></li>-->
<!--                        <li><a href="#" title="" class="bid_now">Bid Now</a></li>-->
<!--                    </ul>-->
<!--                </div>-->
<!--                <div class="job_descp">-->
<!--                    <h3>Senior Wordpress Developer</h3>-->
<!--                    <ul class="job-dt">-->
<!--                        <li><a href="#" title="">Full Time</a></li>-->
<!--                        <li><span>$30 / hr</span></li>-->
<!--                    </ul>-->
<!--                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam luctus hendrerit metus, ut ullamcorper quam finibus at. Etiam id magna sit amet... <a href="#" title="">view more</a></p>-->
<!--                    <ul class="skill-tags">-->
<!--                        <li><a href="#" title="">HTML</a></li>-->
<!--                        <li><a href="#" title="">PHP</a></li>-->
<!--                        <li><a href="#" title="">CSS</a></li>-->
<!--                        <li><a href="#" title="">Javascript</a></li>-->
<!--                        <li><a href="#" title="">Wordpress</a></li>-->
<!--                    </ul>-->
<!--                </div>-->
<!--                <div class="job-status-bar">-->
<!--                    <ul class="like-com">-->
<!--                        <li>-->
<!--                            <a href="#"><i class="fas fa-heart"></i> Like</a>-->
<!--                            <img src="images/liked-img.png" alt="">-->
<!--                            <span>25</span>-->
<!--                        </li>-->
<!--                        <li><a href="#" class="com"><i class="fas fa-comment-alt"></i> Comment 15</a></li>-->
<!--                    </ul>-->
<!--                    <a href="#"><i class="fas fa-eye"></i>Views 50</a>-->
<!--                </div>-->
<!--            </div><!--post-bar end-->-->
<!--            <div class="posty">-->
<!--                <div class="post-bar no-margin">-->
<!--                    <div class="post_topbar">-->
<!--                        <div class="usy-dt">-->
<!--                            <img src="images/resources/us-pc2.png" alt="">-->
<!--                            <div class="usy-name">-->
<!--                                <h3>John Doe</h3>-->
<!--                                <span><img src="images/clock.png" alt="">3 min ago</span>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="ed-opts">-->
<!--                            <a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>-->
<!--                            <ul class="ed-options">-->
<!--                                <li><a href="#" title="">Edit Post</a></li>-->
<!--                                <li><a href="#" title="">Unsaved</a></li>-->
<!--                                <li><a href="#" title="">Unbid</a></li>-->
<!--                                <li><a href="#" title="">Close</a></li>-->
<!--                                <li><a href="#" title="">Hide</a></li>-->
<!--                            </ul>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="epi-sec">-->
<!--                        <ul class="descp">-->
<!--                            <li><img src="images/icon8.png" alt=""><span>Epic Coder</span></li>-->
<!--                            <li><img src="images/icon9.png" alt=""><span>India</span></li>-->
<!--                        </ul>-->
<!--                        <ul class="bk-links">-->
<!--                            <li><a href="#" title=""><i class="la la-bookmark"></i></a></li>-->
<!--                            <li><a href="#" title=""><i class="la la-envelope"></i></a></li>-->
<!--                        </ul>-->
<!--                    </div>-->
<!--                    <div class="job_descp">-->
<!--                        <h3>Senior Wordpress Developer</h3>-->
<!--                        <ul class="job-dt">-->
<!--                            <li><a href="#" title="">Full Time</a></li>-->
<!--                            <li><span>$30 / hr</span></li>-->
<!--                        </ul>-->
<!--                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam luctus hendrerit metus, ut ullamcorper quam finibus at. Etiam id magna sit amet... <a href="#" title="">view more</a></p>-->
<!--                        <ul class="skill-tags">-->
<!--                            <li><a href="#" title="">HTML</a></li>-->
<!--                            <li><a href="#" title="">PHP</a></li>-->
<!--                            <li><a href="#" title="">CSS</a></li>-->
<!--                            <li><a href="#" title="">Javascript</a></li>-->
<!--                            <li><a href="#" title="">Wordpress</a></li>-->
<!--                        </ul>-->
<!--                    </div>-->
<!--                    <div class="job-status-bar">-->
<!--                        <ul class="like-com">-->
<!--                            <li>-->
<!--                                <a href="#"><i class="fas fa-heart"></i> Like</a>-->
<!--                                <img src="images/liked-img.png" alt="">-->
<!--                                <span>25</span>-->
<!--                            </li>-->
<!--                            <li><a href="#" class="com"><i class="fas fa-comment-alt"></i> Comment 15</a></li>-->
<!--                        </ul>-->
<!--                        <a href="#"><i class="fas fa-eye"></i>Views 50</a>-->
<!--                    </div>-->
<!--                </div><!--post-bar end-->-->
<!--                <div class="comment-section">-->
<!--                    <a href="#" class="plus-ic">-->
<!--                        <i class="la la-plus"></i>-->
<!--                    </a>-->
<!--                    <div class="comment-sec">-->
<!--                        <ul>-->
<!--                            <li>-->
<!--                                <div class="comment-list">-->
<!--                                    <div class="bg-img">-->
<!--                                        <img src="images/resources/bg-img1.png" alt="">-->
<!--                                    </div>-->
<!--                                    <div class="comment">-->
<!--                                        <h3>John Doe</h3>-->
<!--                                        <span><img src="images/clock.png" alt=""> 3 min ago</span>-->
<!--                                        <p>Lorem ipsum dolor sit amet, </p>-->
<!--                                        <a href="#" title="" class="active"><i class="fa fa-reply-all"></i>Reply</a>-->
<!--                                    </div>-->
<!--                                </div><!--comment-list end-->-->
<!--                                <ul>-->
<!--                                    <li>-->
<!--                                        <div class="comment-list">-->
<!--                                            <div class="bg-img">-->
<!--                                                <img src="images/resources/bg-img2.png" alt="">-->
<!--                                            </div>-->
<!--                                            <div class="comment">-->
<!--                                                <h3>John Doe</h3>-->
<!--                                                <span><img src="images/clock.png" alt=""> 3 min ago</span>-->
<!--                                                <p>Hi John </p>-->
<!--                                                <a href="#" title=""><i class="fa fa-reply-all"></i>Reply</a>-->
<!--                                            </div>-->
<!--                                        </div><!--comment-list end-->-->
<!--                                    </li>-->
<!--                                </ul>-->
<!--                            </li>-->
<!--                            <li>-->
<!--                                <div class="comment-list">-->
<!--                                    <div class="bg-img">-->
<!--                                        <img src="images/resources/bg-img3.png" alt="">-->
<!--                                    </div>-->
<!--                                    <div class="comment">-->
<!--                                        <h3>John Doe</h3>-->
<!--                                        <span><img src="images/clock.png" alt=""> 3 min ago</span>-->
<!--                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam luctus hendrerit metus, ut ullamcorper quam finibus at.</p>-->
<!--                                        <a href="#" title=""><i class="fa fa-reply-all"></i>Reply</a>-->
<!--                                    </div>-->
<!--                                </div><!--comment-list end-->-->
<!--                            </li>-->
<!--                        </ul>-->
<!--                    </div><!--comment-sec end-->-->
<!--                    <div class="post-comment">-->
<!--                        <div class="cm_img">-->
<!--                            <img src="images/resources/bg-img4.png" alt="">-->
<!--                        </div>-->
<!--                        <div class="comment_box">-->
<!--                            <form>-->
<!--                                <input type="text" placeholder="Post a comment">-->
<!--                                <button type="submit">Send</button>-->
<!--                            </form>-->
<!--                        </div>-->
<!--                    </div><!--post-comment end-->-->
<!--                </div><!--comment-section end-->-->
<!--            </div><!--posty end-->-->
<!--            <div class="process-comm">-->
<!--                <div class="spinner">-->
<!--                    <div class="bounce1"></div>-->
<!--                    <div class="bounce2"></div>-->
<!--                    <div class="bounce3"></div>-->
<!--                </div>-->
<!--            </div><!--process-comm end-->-->
<!--        </div><!--posts-section end-->-->
<!--    </div><!--main-ws-sec end-->-->
<!--</div>-->

<!--<div class="card bg-light">-->
<!--    <article class="card-body mx-auto" style="max-width: 400px;">-->
<!--        <h4 class="card-title mt-3 text-center">Abra sua conta</h4>-->
<!--        <p class="text-center">Comece com sua conta grátis</p>-->
<!---->
<!--        --><?php
//        echo validation_errors();
//
//        echo form_open('Iniciar/logar');
//        ?>
<!--        --><?php
//        echo form_close();
//        ?>
<!--        <form method="POST" action="">-->
<!--            <div class="form-group input-group">-->
<!--                <div class="input-group-prepend">-->
<!--                    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>-->
<!--                </div>-->
<!--                <input name="" class="form-control" placeholder="Email" type="email">-->
<!--            </div>-->
<!---->
<!--            <div class="form-group input-group">-->
<!--                <div class="input-group-prepend">-->
<!--                    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>-->
<!--                </div>-->
<!--                <input class="form-control" placeholder="Criar senha" type="password">-->
<!--            </div>-->
<!---->
<!--            <div class="form-group input-group">-->
<!--                <div class="input-group-prepend">-->
<!--                    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>-->
<!--                </div>-->
<!--                <input class="form-control" placeholder="Repetir senha" type="password">-->
<!--            </div>  -->
<!---->
<!--			<div class="input-group">-->
<!--				<div class="input-group-prepend">-->
<!--					<div class="input-group-text">-->
<!--						<input type="radio" name="tipo_usuario" value="fisica" aria-label="Radio button para tipo de usuario" checked>-->
<!--					</div>-->
<!--					<div class="input-group-text">-->
<!--						<label class="form-check-label">-->
<!--							Pessoa-->
<!--						</label>-->
<!--					</div>-->
<!--					<div class="input-group-text">-->
<!--						<input type="radio" name="tipo_usuario" value="juridica" aria-label="Radio button para tipo de usuario">-->
<!--					</div>-->
<!--					<div class="input-group-text">-->
<!--						<label class="form-check-label">-->
<!--							Instituição-->
<!--						</label>-->
<!--					</div>-->
<!--				</div>-->
<!--			</div>-->
<!---->
<!--            <div class="form-group">-->
<!--                <button type="submit" class="btn btn-primary btn-block"> Cadastrar-se </button>-->
<!--            </div>-->
<!---->
<!--            <div>-->
<!--                <h4 class="col-md-12">Usuarios</h4>-->
<!--                <div class="row">-->
<!--                    <div class="col-lg-12">-->
<!--                        <ul class="list-unstyled">-->
<!--                            --><?php
//                            foreach ($usuarios as $usuario){
//                            ?>
<!--                                <li>ID: --><?php //echo $usuario->id_usuario ?><!--</li>-->
<!--                                <li>Email: <a href="--><?php //echo base_url('usuario/'.$usuario->id_usuario.'/'.limpar($usuario->email)) ?><!--">-->
<!--                                        --><?php //echo $usuario->email ?><!-- </a>-->
<!--                                </li>-->
<!--                                <li>Senha: --><?php //echo $usuario->senha ?><!--</li>-->
<!--                                <li>Criacao: --><?php //echo $usuario->criacao ?><!--</li>-->
<!--                                <li>Modificacao: --><?php //echo $usuario->modificacao ?><!--</li>-->
<!--                                <li>Foto Perfil: --><?php //echo $usuario->foto_perfil ?><!--</li>-->
<!--                                <li>Tipo Usuario: --><?php //echo $usuario->tipo_usuario ?><!--</li>-->
<!--                            --><?php
//                            }
//                            ?>
<!--                        </ul>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </form>-->
<!--    </article>-->
<!--</div>-->