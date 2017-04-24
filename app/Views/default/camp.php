<?php $this->layout('layout', ['title' => 'Camp']) ?>

<?php $this->start('main_content') ?>

<div class="container" id="game-board">
    <div class="row">
        <!--Camp -->
        <div class="col-md-12">
            <h1 class="text-center">Campement</h1>
            <img class="img-responsive" src="..." alt="Generic placeholder image">
        </div>
    </div>
        <!--batiment 1-->
    </br>
    <div class="row">
        <div class="col-md-4">
            <div class="media">
            <img class="d-flex mr-3" src="..." alt="Generic placeholder image">
            <div class="media-body">
                <h5 class="mt-0 text-left"><strong>Camp de bûcheron</strong> Niveau : <?php echo $_SESSION["buildings"]->wood_farm; ?></h5>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                <p>Cout en ressources : <?php echo $bucheron->GetPrixBois(); ?> bois</p>
                <a class="btn btn-primary btn-block" href="<?=$this->url('default_building',['idBuilding'=>1])?>">Voir</a>
                <button class="btn btn-success btn-block">Construire</button>
            </div>
            </div>
        </div>
        <!--batiment 2-->
        <div class="col-md-4">
            <div class="media">
            <img class="d-flex mr-3" src="..." alt="Generic placeholder image">
            <div class="media-body">
                <h5 class="mt-0 text-left"><strong>Ferme</strong> Niveau : <?php echo $_SESSION["buildings"]->food_farm; ?></h5>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.

                <p>Cout en ressources : <?php echo $ferme->GetPrixBois(); ?> Bois <?php echo $ferme->GetPrixNourriture(); ?> nourriture</p>

               
                <a class="btn btn-primary btn-block" href="<?=$this->url('default_building',['idBuilding'=>2])?>">Voir</a>

                <button class="btn btn-success btn-block">Construire</button>
            </div>
            </div>
        </div>
        <!--batiment 3-->
        <div class="col-md-4">
            <div class="media">
            <img class="d-flex mr-3" src="..." alt="Generic placeholder image">
            <div class="media-body">
                <h5 class="mt-0 text-left"><strong>Puit</strong> Niveau : <?php echo $_SESSION["buildings"]->water_farm; ?></h5>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.

                <p>Cout en ressources : <?php echo $puit->GetPrixBois(); ?> bois <?php echo $puit->GetPrixNourriture(); ?> nourriture <?php echo $puit->GetPrixEau(); ?> eau</p>

                
                <a class="btn btn-primary btn-block" href="<?=$this->url('default_building',['idBuilding'=>3])?>">Voir</a>

                <button class="btn btn-success btn-block">Construire</button>
            </div>
            </div>
        </div>
    </div>
        <!--batiment 4-->
    <div class="row">
        </br>
        <div class="col-md-4">
            <div class="media">
            <img class="d-flex mr-3" src="..." alt="Generic placeholder image">
            <div class="media-body">
                <h5 class="mt-0 text-left"><strong>Hangar</strong> Niveau : <?php echo $_SESSION["buildings"]->wood_stock; ?></h5>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.

                <p>Cout en ressources : <?php echo $hangar->GetPrixBois(); ?></p>

               
                <a class="btn btn-primary btn-block" href="<?=$this->url('default_building',['idBuilding'=>6])?>">Voir</a>

                <button class="btn btn-success btn-block">Construire</button>
            </div>
            </div>
        </div>
        <!--batiment 5-->
        <div class="col-md-4">
            <div class="media">
            <img class="d-flex mr-3" src="..." alt="Generic placeholder image">
            <div class="media-body">
                <h5 class="mt-0 text-left"><strong>Garde manger</strong> Niveau : <?php echo $_SESSION["buildings"]->food_stock; ?></h5>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.

                <p>Cout en ressources : <?php echo $garde_manger->GetPrixBois(); ?> Bois <?php echo $garde_manger->GetPrixNourriture(); ?> nourriture</p>

                <a class="btn btn-primary btn-block" href="<?=$this->url('default_building',['idBuilding'=>5])?>">Voir</a>

                <button class="btn btn-success btn-block">Construire</button>
            </div>
            </div>
        </div>
        <!--batiment 6-->
        <div class="col-md-4">
            <div class="media">
            <img class="d-flex mr-3" src="..." alt="Generic placeholder image">
            <div class="media-body">
                <h5 class="mt-0 text-left"><strong>Citerne</strong> Niveau : <?php echo $_SESSION["buildings"]->water_stock; ?></h5>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.

                <p>Cout en ressources : <?php echo $citerne->GetPrixBois(); ?> bois <?php echo $citerne->GetPrixNourriture(); ?> nourriture <?php echo $citerne->GetPrixEau(); ?> eau</p>


                <a class="btn btn-primary btn-block" href="<?=$this->url('default_building',['idBuilding'=>7])?>">Voir</a>

                <button class="btn btn-success btn-block">Construire</button>
            </div>
            </div>
        </div>
    </div>
        <!--batiment 7 -->
    </br>
    <div class="row">
        <div class="col-md-4">
            <div class="media">
            <img class="d-flex mr-3" src="..." alt="Generic placeholder image">
            <div class="media-body">
                <h5 class="mt-0 text-left"><strong>Cabanon</strong> Niveau : <?php echo $_SESSION["buildings"]->cabanon; ?></h5>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.

                <p>Cout en ressources : <?php echo $cabane->GetPrixBois(); ?> bois <?php echo $cabane->GetPrixNourriture(); ?> nourriture <?php echo $cabane->GetPrixEau(); ?> eau</p>

           
                <a class="btn btn-primary btn-block" href="<?=$this->url('default_building',['idBuilding'=>4])?>">Voir</a>

                <button class="btn btn-success btn-block">Construire</button>
            </div>
            </div>
        </div>
        <!--batiment 8-->
        <div class="col-md-4">
            <div class="media">
            <img class="d-flex mr-3" src="..." alt="Generic placeholder image">
            <div class="media-body">
                <h5 class="mt-0 text-left"><strong>Station de radio</strong> Niveau : <?php echo $_SESSION["buildings"]->radio; ?></h5>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.

                <p>Cout en ressources : <?php echo $radio->GetPrixBois(); ?> bois <?php echo $radio->GetPrixNourriture(); ?> nourriture <?php echo $radio->GetPrixEau(); ?> eau</p>

               
                <a class="btn btn-primary btn-block" href="<?=$this->url('default_building',['idBuilding'=>9])?>">Voir</a>

                <button class="btn btn-success btn-block">Construire</button>
            </div>
            </div>
        </div>
        <!--batiment 9-->
        <div class="col-md-4">
            <div class="media">
            <img class="d-flex mr-3" src="..." alt="Generic placeholder image">
            <div class="media-body">
                <h5 class="mt-0 text-left"><strong>Mur de defense</strong> Niveau : <?php echo $_SESSION["buildings"]->wall; ?></h5>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.

                <p>Cout en ressources : <?php echo $mur->GetPrixBois(); ?> bois <?php echo $mur->GetPrixNourriture(); ?> nourriture <?php echo $mur->GetPrixEau(); ?> eau</p>

           
                <a class="btn btn-primary btn-block" href="<?=$this->url('default_building',['idBuilding'=>8])?>">Voir</a>

                <button class="btn btn-success btn-block">Construire</button>
            </div>
            </div>
        </div>
    </div>
</div>


<?php $this->stop('main_content') ?>
