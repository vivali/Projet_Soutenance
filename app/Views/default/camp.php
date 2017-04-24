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
                <h5 class="mt-0 text-left"><strong>Ferme</strong> Niveau : 0</h5>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                <p>Cout en ressources : 200 bois 100 nourriture 0 eau</p>
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
                <h5 class="mt-0 text-left"><strong>Camp de bûcheron</strong> Niveau : 0</h5>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                <p>Cout en ressources : 200 Bois 0 nourriture 0 eau</p>
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
                <h5 class="mt-0 text-left"><strong>Puit</strong> Niveau : 0</h5>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                <p>Cout en ressources : 300 bois 150 nourriture 50 eau</p>
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
                <h5 class="mt-0 text-left"><strong>Hangar</strong> Niveau : 0</h5>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                <p>Cout en ressources : Bois 1000 nourriture 0 eau 0</p>
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
                <h5 class="mt-0 text-left"><strong>Garde manger</strong> Niveau : 0</h5>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                <p>Cout en ressources : Bois 1000 Nourriture 1000 eau 0</p>
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
                <h5 class="mt-0 text-left"><strong>Citerne</strong> Niveau : 0</h5>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                <p>Cout en ressources : Bois 1000 Nourriture 1000 Eau 1000</p>
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
                <h5 class="mt-0 text-left"><strong>Cabanon</strong> Niveau : 0</h5>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                <p>Cout en ressources : Bois 4000 Nourriture 4000 Eau 2500</p>
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
                <h5 class="mt-0 text-left"><strong>Station de radio</strong> Niveau : 0</h5>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                <p>Cout en ressources : Bois 1200 Nourriture 800 Eau 600</p>
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
                <h5 class="mt-0 text-left"><strong>Mur de defense</strong> Niveau : 0</h5>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                <p>Cout en ressources : Bois 800 Nourriture 400 Eau 200</p>
                <a class="btn btn-primary btn-block" href="<?=$this->url('default_building',['idBuilding'=>8])?>">Voir</a>
                <button class="btn btn-success btn-block">Construire</button>
            </div>
            </div>
        </div>
    </div>
</div>

<?php $this->stop('main_content') ?>
