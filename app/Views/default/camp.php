<?php $this->layout('layout', ['title' => 'Camp']) ?>

<?php $this->start('main_content') ?>
<?php if ( !empty($alert) ): ?>
    <script type="text/javascript">
        alert("<?=$alert?>");
    </script>

<?php endif; ?>
<div class="container" id="game-board">
    <h1 class="text-center">Campement</h1>
    <!--<div class="row">
        <div class="col-md-12">
            <h1 class="text-center">Campement</h1>
            <img class="d-flex img-responsive mr-3" src="" alt="Generic placeholder image" id="camp">
            <div>
                <a class="btn btn-primary btn-block" href="<?=$this->url('default_building',['idBuilding'=>1])?>">Voir</a>
                <a class="btn btn-success btn-block" href="<?=$this->url('default_upgrade',['idBuilding'=>1])?>">Construire</a>
            </div>
        </div>
    </div>-->
        <!--batiment 1-->
    </br>
    <div class="row">
        <div class="col-md-4">
            <div class="media">
            <img class="d-flex mr-3" src="assets/img/LOGO_Campeurs_VS_Zombies.png" alt="Generic placeholder image">
            <div class="media-body">
                <h5 class="mt-0 text-left"><strong>Camp de bûcheron</strong> Niveau : <?php echo $_SESSION["buildings"]->wood_farm; ?></h5>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                <p>Prix : <?php echo $bucheron->GetPrixBois(); ?> bois</p>
                <a class="btn btn-primary btn-block" href="<?=$this->url('default_building',['idBuilding'=>2])?>">Voir</a>

                <?php if(empty($_SESSION["construct"]->wood_farm)):?>
                    <?php if($bucheron->action == 1): ?>
                        <a class='btn btn-success btn-block' href='<?=$this->url('default_upgrade',['idBuilding'=>2])?>'>Construire</a>
                    <?php endif ?>
                <?php else:?>
                    <div><?php echo $bucheron->barre ?></div>
                        <div class="compteur" id="time<?php echo $bucheron->id ?>"></div>
                <?php endif ?>
            </div>
            </div>
        </div>
        <!--batiment 2-->
        <div class="col-md-4">
            <div class="media">
            <img class="d-flex mr-3" src="assets/img/LOGO_Campeurs_VS_Zombies.png" alt="Generic placeholder image">
            <div class="media-body">
                <h5 class="mt-0 text-left"><strong>Ferme</strong> Niveau : <?php echo $_SESSION["buildings"]->food_farm; ?></h5>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.

                <p>Prix : <?php echo $ferme->GetPrixBois(); ?> Bois <?php echo $ferme->GetPrixNourriture(); ?> nourriture</p>

                <a class="btn btn-primary btn-block" href="<?=$this->url('default_building',['idBuilding'=>3])?>">Voir</a>

                <?php if(empty($_SESSION["construct"]->food_farm)):?>
                    <?php if($ferme->action == 1): ?>
                        <a class='btn btn-success btn-block' href='<?=$this->url('default_upgrade',['idBuilding'=>3])?>'>Construire</a>
                    <?php endif ?>
                <?php else:?>
                    <div><?php echo $ferme->barre ?></div>
                        <div class="compteur" id="time<?php echo $ferme->id ?>"></div>
                <?php endif ?>

            </div>
            </div>
        </div>
        <!--batiment 3-->
        <div class="col-md-4">
            <div class="media">
                <img class="d-flex mr-3" src="assets/img/LOGO_Campeurs_VS_Zombies.png" alt="Generic placeholder image">
                <div class="media-body">
                    <h5 class="mt-0 text-left"><strong>Puit</strong> Niveau : <?php echo $_SESSION["buildings"]->water_farm; ?></h5>
                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.

                    <p>Prix : <?php echo $puit->GetPrixBois(); ?> bois <?php echo $puit->GetPrixNourriture(); ?> nourriture <?php echo $puit->GetPrixEau(); ?> eau</p>


                    <a class="btn btn-primary btn-block" href="<?=$this->url('default_building',['idBuilding'=>4])?>">Voir</a>

                    <?php if(empty($_SESSION["construct"]->water_farm)):?>
                        <?php if($puit->action == 1): ?>
                            <a class='btn btn-success btn-block' href='<?=$this->url('default_upgrade',['idBuilding'=>4])?>'>Construire</a>
                        <?php endif ?>
                    <?php else:?>
                        <div><?php echo $puit->barre ?></div>
                        <div class="compteur" id="time<?php echo $puit->id ?>"></div>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>
        <!--batiment 4-->
    <div class="row">
        </br>
        <div class="col-md-4">
            <div class="media">
            <img class="d-flex mr-3" src="assets/img/LOGO_Campeurs_VS_Zombies.png" alt="Generic placeholder image">
            <div class="media-body">
                <h5 class="mt-0 text-left"><strong>Hangar</strong> Niveau : <?php echo $_SESSION["buildings"]->wood_stock; ?></h5>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.

                <p>Prix : <?php echo $hangar->GetPrixBois(); ?> bois</p>


                <a class="btn btn-primary btn-block" href="<?=$this->url('default_building',['idBuilding'=>5])?>">Voir</a>

                <?php if(empty($_SESSION["construct"]->wood_stock)):?>
                    <?php if($hangar->action == 1): ?>
                        <a class='btn btn-success btn-block' href='<?=$this->url('default_upgrade',['idBuilding'=>5])?>'>Construire</a>
                    <?php endif ?>
                <?php else:?>
                    <div>
                        <?php echo $hangar->barre ?>
                        <div class="compteur" id="time<?php echo $hangar->id ?>"></div>
                    </div>
                <?php endif ?>

                <div></div>
            </div>
            </div>
        </div>
        <!--batiment 5-->
        <div class="col-md-4">
            <div class="media">
            <img class="d-flex mr-3" src="assets/img/LOGO_Campeurs_VS_Zombies.png" alt="Generic placeholder image">
            <div class="media-body">
                <h5 class="mt-0 text-left"><strong>Garde manger</strong> Niveau : <?php echo $_SESSION["buildings"]->food_stock; ?></h5>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.

                <p>Prix : <?php echo $garde_manger->GetPrixBois(); ?> Bois <?php echo $garde_manger->GetPrixNourriture(); ?> nourriture</p>

                <a class="btn btn-primary btn-block" href="<?=$this->url('default_building',['idBuilding'=>6])?>">Voir</a>

                <?php if(empty($_SESSION["construct"]->food_stock)):?>
                    <?php if($garde_manger->action == 1): ?>
                        <a class='btn btn-success btn-block' href='<?=$this->url('default_upgrade',['idBuilding'=>6])?>'>Construire</a>
                    <?php endif ?>
                <?php else:?>
                    <div><?php echo $garde_manger->barre ?></div>
                        <div class="compteur" id="time<?php echo $garde_manger->id ?>"></div>
                <?php endif ?>

                <div ></div>
            </div>
            </div>
        </div>
        <!--batiment 6-->
        <div class="col-md-4">
            <div class="media">
            <img class="d-flex mr-3" src="assets/img/LOGO_Campeurs_VS_Zombies.png" alt="Generic placeholder image">
            <div class="media-body">
                <h5 class="mt-0 text-left"><strong>Citerne</strong> Niveau : <?php echo $_SESSION["buildings"]->water_stock; ?></h5>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.

                <p>Prix : <?php echo $citerne->GetPrixBois(); ?> bois <?php echo $citerne->GetPrixNourriture(); ?> nourriture <?php echo $citerne->GetPrixEau(); ?> eau</p>


                <a class="btn btn-primary btn-block" href="<?=$this->url('default_building',['idBuilding'=>7])?>">Voir</a>

                    <?php if(empty($_SESSION["construct"]->water_stock)):?>
                        <?php if($citerne->action == 1): ?>
                            <a class='btn btn-success btn-block' href='<?=$this->url('default_upgrade',['idBuilding'=>7])?>'>Construire</a>
                        <?php endif ?>
                    <?php else:?>
                        <div class="compteurdiv"><?php echo $citerne->barre ?>
                            <div class="compteur" id="time<?php echo $citerne->id ?>"></div>
                        </div>
                    <?php endif ?>
                <div ></div>
            </div>
            </div>
        </div>
    </div>
        <!--batiment 7 -->
    </br>
    <div class="row">
        <div class="col-md-4">
            <div class="media">
            <img class="d-flex mr-3" src="assets/img/LOGO_Campeurs_VS_Zombies.png" alt="Generic placeholder image">
            <div class="media-body">
                <h5 class="mt-0 text-left"><strong>Cabanon</strong> Niveau : <?php echo $_SESSION["buildings"]->cabanon; ?></h5>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.

                <p>Prix : <?php echo $cabane->GetPrixBois(); ?> bois <?php echo $cabane->GetPrixNourriture(); ?> nourriture <?php echo $cabane->GetPrixEau(); ?> eau</p>


                <a class="btn btn-primary btn-block" href="<?=$this->url('default_building',['idBuilding'=>8])?>">Voir</a>

                <?php if(empty($_SESSION["construct"]->cabanon)):?>
                    <?php if($cabane->action == 1): ?>
                        <a class='btn btn-success btn-block' href='<?=$this->url('default_upgrade',['idBuilding'=>8])?>'>Construire</a>
                    <?php endif ?>
                <?php else:?>
                    <div><?php echo $cabane->barre ?></div>
                        <div class="compteur" id="time<?php echo $cabane->id ?>"></div>
                <?php endif ?>

                <div ></div>
            </div>
            </div>
        </div>
        <!--batiment 8-->
        <div class="col-md-4">
            <div class="media">
            <img class="d-flex mr-3" src="assets/img/LOGO_Campeurs_VS_Zombies.png" alt="Generic placeholder image">
            <div class="media-body">
                <h5 class="mt-0 text-left"><strong>Station de radio</strong> Niveau : <?php echo $_SESSION["buildings"]->radio; ?></h5>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.

                <p>Prix : <?php echo $radio->GetPrixBois(); ?> bois <?php echo $radio->GetPrixNourriture(); ?> nourriture <?php echo $radio->GetPrixEau(); ?> eau</p>


                <a class="btn btn-primary btn-block" href="<?=$this->url('default_building',['idBuilding'=>9])?>">Voir</a>

                <?php if(empty($_SESSION["construct"]->radio)):?>
                    <?php if($radio->action == 1): ?>
                        <a class='btn btn-success btn-block' href='<?=$this->url('default_upgrade',['idBuilding'=>9])?>'>Construire</a>
                    <?php endif ?>
                <?php else:?>
                    <div><?php echo $radio->barre ?></div>
                        <div class="compteur" id="time<?php echo $radio->id ?>"></div>
                <?php endif ?>

                <div></div>
            </div>
            </div>
        </div>
        <!--batiment 9-->
        <div class="col-md-4">
            <div class="media">
            <img class="d-flex mr-3" src="assets/img/LOGO_Campeurs_VS_Zombies.png" alt="Generic placeholder image">
            <div class="media-body">
                <h5 class="mt-0 text-left"><strong>Mur de defense</strong> Niveau : <?php echo $_SESSION["buildings"]->wall; ?></h5>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.

                <p>Prix : <?php echo $mur->GetPrixBois(); ?> bois <?php echo $mur->GetPrixNourriture(); ?> nourriture <?php echo $mur->GetPrixEau(); ?> eau</p>


                <a class="btn btn-primary btn-block" href="<?=$this->url('default_building',['idBuilding'=>10])?>">Voir</a>

                <?php if(empty($_SESSION["construct"]->wall)):?>
                    <?php if($mur->action == 1): ?>
                        <a class='btn btn-success btn-block' href='<?=$this->url('default_upgrade',['idBuilding'=>10])?>'>Construire</a>
                    <?php endif ?>
                <?php else:?>
                    <div><?php echo $mur->barre ?></div>
                        <div class="compteur" id="time<?php echo $mur->id ?>"></div>
                <?php endif ?>

                <div></div>
            </div>
            </div>
        </div>
    </div>
</div>


<?php $this->stop('main_content') ?>
