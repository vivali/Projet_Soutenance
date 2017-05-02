<?php $this->layout('layout', ['title' => 'Camp']) ?>

<?php $this->start('main_content') ?>
<?php if ( !empty($alert) ): ?>
    <script type="text/javascript">
        alert("<?=$alert?>");
    </script>
<?php endif; ?>

        <!--=== Content Part ===-->
        <div class="blog_masonry_3col">
            <div class="container content grid-boxes">
                <div class="grid-boxes-in">
                    <h3>Bûcheron niveau : <?php echo $_SESSION["buildings"]->wood_farm; ?></h3>  
                    <img class="img-responsive" src="assets/img/main/img3.jpg" alt="">
                    <div class="grid-boxes-caption">                      
                    <p class="descbat">Le camp de bûcheron vous permettra d'enrichir votre camp en bois, une ressource essentielle à la survie de votre camp. Le bois étant la ressource base pour toute les constructions.</p>
                    <p style="text-align: right;">Prix : <?php echo $bucheron->GetPrixBois(); ?> bois</p>
                    <?php if(empty($_SESSION["construct"]->wood_farm)):?>
                        <?php if($bucheron->action == 1): ?>
                        <p style="text-align: right;"> 
                        <?php
                            $secondes = $bucheron->GetTemps();

                            $temp = $secondes % 3600;

                            $heures = ( $secondes - $temp ) / 3600 ;

                            $secondes = $temp % 60 ;

                            $minutes = ( $temp - $secondes ) / 60; 

                            echo "Temps de construction : " . $heures . "h" . $minutes . "m" . $secondes . "s"; 
                        ?>
                        </p>
                            <a class='btn construct btn-block' href='<?=$this->url('default_upgrade',['idBuilding'=>2])?>'>Construire</a>
                        <?php endif ?>
                    <?php else:?>
                        <div class="compteur" style="text-align: center;" id="time<?php echo $bucheron->id ?>"></div>
                        <div><?php echo $bucheron->barre ?></div>
                    <?php endif ?>
                    </div>
                </div>

                <div class="grid-boxes-in">
                    <h3>Ferme niveau : <?php echo $_SESSION["buildings"]->food_farm; ?></h3>  
                    <img class="img-responsive" src="assets/img/main/img3.jpg" alt="">
                    <div class="grid-boxes-caption">                      
                    <p class="descbat">Comment survivre sans manger ? Impossible ! Cette ferme vous aidera à faire prospérer votre campement dans la durée. Les zombies ne sont pas conseillé dans l'élevage.</p>
                    <p style="text-align: right;">Prix : <?php echo $ferme->GetPrixBois(); ?> Bois <?php echo $ferme->GetPrixNourriture(); ?> Nourritures</p>
                    <?php if(empty($_SESSION["construct"]->food_farm)):?>
                        <?php if($ferme->action == 1): ?>
                        <p style="text-align: right;"> 
                        <?php
                            $secondes = $ferme->GetTemps();

                            $temp = $secondes % 3600;

                            $heures = ( $secondes - $temp ) / 3600 ;

                            $secondes = $temp % 60 ;

                            $minutes = ( $temp - $secondes ) / 60; 

                            echo "Temps de construction : " . $heures . "h" . $minutes . "m" . $secondes . "s"; 
                        ?>
                        </p>
                            <a class='btn construct btn-block' href='<?=$this->url('default_upgrade',['idBuilding'=>3])?>'>Construire</a>
                        <?php endif ?>
                    <?php else:?>
                        <div class="compteur" style="text-align: center;" id="time<?php echo $ferme->id ?>"></div>
                        <div><?php echo $ferme->barre ?></div>
                    <?php endif ?>
                    </div>
                </div>


                <div class="grid-boxes-in">
                    <h3>Puit niveau : <?php echo $_SESSION["buildings"]->water_farm; ?></h3>  
                    <img class="img-responsive" src="assets/img/main/img3.jpg" alt="">
                    <div class="grid-boxes-caption">                      
                    <p class="descbat">La base de la vie, l'eau ! Evidemment elle est tellement importante qu'elle est très rare. <br>Il faut donc l'utiliser à bon escient. <br>Ne l'oubliez jamais !</p>
                    <p style="text-align: right;">Prix : <?php echo $puit->GetPrixBois(); ?> Bois <?php echo $puit->GetPrixNourriture(); ?> Nourritures <?php echo $puit->GetPrixEau(); ?> Eau</p>
                    <?php if(empty($_SESSION["construct"]->water_farm)):?>
                        <?php if($puit->action == 1): ?>
                        <p style="text-align: right;"> 
                        <?php
                            $secondes = $puit->GetTemps();

                            $temp = $secondes % 3600;

                            $heures = ( $secondes - $temp ) / 3600 ;

                            $secondes = $temp % 60 ;

                            $minutes = ( $temp - $secondes ) / 60; 

                            echo "Temps de construction : " . $heures . "h" . $minutes . "m" . $secondes . "s"; 
                        ?>
                        </p>
                            <a class='btn construct btn-block' href='<?=$this->url('default_upgrade',['idBuilding'=>4])?>'>Construire</a>
                        <?php endif ?>
                    <?php else:?>
                        <div class="compteur" style="text-align: center;" id="time<?php echo $puit->id ?>"></div>
                        <div><?php echo $puit->barre ?></div>
                    <?php endif ?>
                    </div>
                </div>

                <div class="grid-boxes-in">
                    <h3>Hangar niveau : <?php echo $_SESSION["buildings"]->wood_stock; ?></h3>  
                    <img class="img-responsive" src="assets/img/main/img3.jpg" alt="">
                    <div class="grid-boxes-caption">                      
                    <p class="descbat">Dans un monde post-apocalyptique il est évident que la richesse et le pouvoir passe par possession de ressource essentiel à la survie c'est pourquoi ce hangar vous aidera à stocker votre bois.</p>
                    <p style="text-align: right;">Prix : <?php echo $hangar->GetPrixBois(); ?> Bois</p>
                    <?php if(empty($_SESSION["construct"]->wood_stock)):?>
                    <?php if($hangar->action == 1): ?>
                        <p style="text-align: right;"> 
	                    <?php
	                    	$secondes = $hangar->GetTemps();

							$temp = $secondes % 3600;

							$heures = ( $secondes - $temp ) / 3600 ;

							$secondes = $temp % 60 ;

							$minutes = ( $temp - $secondes ) / 60; 

							echo "Temps de construction : " . $heures . "h" . $minutes . "m" . $secondes . "s";	
	                    ?>
	                    </p> 
                        <a class='btn construct btn-block' href='<?=$this->url('default_upgrade',['idBuilding'=>5])?>'>Construire</a>
                    <?php endif ?>
                    <?php else:?>
                        <div>
                            <div class="compteur" style="text-align: center;" id="time<?php echo $hangar->id ?>"></div>
                            <?php echo $hangar->barre ?>
                        </div>
                    <?php endif ?>
                    </div>
                </div>

                <div class="grid-boxes-in">
                    <h3>Garde Manger niveau : <?php echo $_SESSION["buildings"]->food_stock; ?></h3>  
                    <img class="img-responsive" src="assets/img/main/img3.jpg" alt="">
                    <div class="grid-boxes-caption">                      
                    <p class="descbat">A défaut d'avoir un frigo et de l'électricité au bout du fil, il faut prévoir un lieu pour stocker votre nourriture sachant qu'elle est très prisée des zombies et... Des autres camps.</p>
                    <p style="text-align: right;">Prix : <?php echo $garde_manger->GetPrixBois(); ?> Bois <?php echo $garde_manger->GetPrixNourriture(); ?> Nourritures</p>
                    <?php if(empty($_SESSION["construct"]->food_stock)):?>
                        <?php if($garde_manger->action == 1): ?>
                        <p style="text-align: right;"> 
                        <?php
                            $secondes = $garde_manger->GetTemps();

                            $temp = $secondes % 3600;

                            $heures = ( $secondes - $temp ) / 3600 ;

                            $secondes = $temp % 60 ;

                            $minutes = ( $temp - $secondes ) / 60; 

                            echo "Temps de construction : " . $heures . "h" . $minutes . "m" . $secondes . "s"; 
                        ?>
                        </p>
                            <a class='btn construct btn-block' href='<?=$this->url('default_upgrade',['idBuilding'=>6])?>'>Construire</a>
                        <?php endif ?>
                    <?php else:?>
                        <div class="compteur" style="text-align: center;" id="time<?php echo $garde_manger->id ?>"></div>
                        <div><?php echo $garde_manger->barre ?></div>
                    <?php endif ?>
                    </div>
                </div>

                <div class="grid-boxes-in">
                    <h3>Citerne niveau : <?php echo $_SESSION["buildings"]->water_stock; ?></h3>  
                    <img class="img-responsive" src="assets/img/main/img3.jpg" alt="">
                    <div class="grid-boxes-caption">                      
                    <p class="descbat">L'eau peut être très vite contaminée par les zombies et les autre camps qui vont chercher à réduire votre camp à néant pour vous piller. <br>N'oubliez pas l'eau est rare...</p>
                    <p style="text-align: right;">Prix : <?php echo $citerne->GetPrixBois(); ?> Bois <?php echo $citerne->GetPrixNourriture(); ?> Nourritures <?php echo $citerne->GetPrixEau(); ?> Eau</p>
                    <?php if(empty($_SESSION["construct"]->water_stock)):?>
                        <?php if($citerne->action == 1): ?>
                        <p style="text-align: right;"> 
                        <?php
                            $secondes = $citerne->GetTemps();

                            $temp = $secondes % 3600;

                            $heures = ( $secondes - $temp ) / 3600 ;

                            $secondes = $temp % 60 ;

                            $minutes = ( $temp - $secondes ) / 60; 

                            echo "Temps de construction : " . $heures . "h" . $minutes . "m" . $secondes . "s"; 
                        ?>
                        </p>
                            <a class='btn construct btn-block' href='<?=$this->url('default_upgrade',['idBuilding'=>7])?>'>Construire</a>
                        <?php endif ?>
                    <?php else:?>

                        <div class="compteur" style="text-align: center;" id="time<?php echo $citerne->id ?>"></div>
                        <div><?php echo $citerne->barre ?></div>

                    <?php endif ?>
                    </div>
                </div>

                <div class="grid-boxes-in">
                    <h3>Cabanes niveau : <?php echo $_SESSION["buildings"]->cabanon; ?></h3>  
                    <img class="img-responsive" src="assets/img/main/img3.jpg" alt="">
                    <div class="grid-boxes-caption">                      
                    <p class="descbat">Après avoir bien manger et bien bu vous serez bien content de bien dormir et quoi de mieux qu'une cabane que vous rêviez de bâtir étant petit. <br> Nostalgie quand tu nous tiens !</p>
                    <p style="text-align: right;">Prix : <?php echo $cabane->GetPrixBois(); ?> Bois <?php echo $cabane->GetPrixNourriture(); ?> Nourritures <?php echo $cabane->GetPrixEau(); ?> Eau</p>
                    <?php if(empty($_SESSION["construct"]->cabanon)):?>
                        <?php if($cabane->action == 1): ?>
                        <p style="text-align: right;"> 
                        <?php
                            $secondes = $cabane->GetTemps();

                            $temp = $secondes % 3600;

                            $heures = ( $secondes - $temp ) / 3600 ;


                            $secondes = $temp % 60 ;


                            $minutes = ( $temp - $secondes ) / 60; 

                            echo "Temps de construction : " . $heures . "h" . $minutes . "m" . $secondes . "s"; 
                        ?>
                        </p>
                            <a class='btn construct btn-block' href='<?=$this->url('default_upgrade',['idBuilding'=>8])?>'>Construire</a>
                        <?php endif ?>
                    <?php else:?>
                        <div class="compteur" style="text-align: center;" id="time<?php echo $cabanne->id ?>"></div>
                        <div><?php echo $cabane->barre ?></div>
                    <?php endif ?>
                    </div>
                </div>

                <div class="grid-boxes-in">
                    <h3>Station de radio niveau : <?php echo $_SESSION["buildings"]->radio; ?></h3>  
                    <img class="img-responsive" src="assets/img/main/img3.jpg" alt="">
                    <div class="grid-boxes-caption">                      
                    <p class="descbat">Plus on est de fous plus on rit ! Si vous espérez reconstruire l'humanité il va vous falloir de l'aider et pour avoir de l'aide il faut appeler à l'aide non ? <br>
                    Attention toutefois à ne pas recruter n'importe qui.</p>
                    <p style="text-align: right;">Prix : <?php echo $radio->GetPrixBois(); ?> Bois <?php echo $radio->GetPrixNourriture(); ?> Nourritures <?php echo $radio->GetPrixEau(); ?> Eau</p>
                    <?php if(empty($_SESSION["construct"]->radio)):?>
                        <?php if($radio->action == 1): ?>
                        <p style="text-align: right;"> 
                        <?php
                            $secondes = $radio->GetTemps();

                            $temp = $secondes % 3600;

                            $heures = ( $secondes - $temp ) / 3600 ;

                            $secondes = $temp % 60 ;

                            $minutes = ( $temp - $secondes ) / 60; 

                            echo "Temps de construction : " . $heures . "h" . $minutes . "m" . $secondes . "s"; 
                        ?>
                        </p>
                            <a class='btn construct btn-block' href='<?=$this->url('default_upgrade',['idBuilding'=>9])?>'>Construire</a>
                        <?php endif ?>
                    <?php else:?>
                        <div class="compteur" style="text-align: center;" id="time<?php echo $radio->id ?>"></div>
                        <div><?php echo $radio->barre ?></div>
                    <?php endif ?>
                    </div>
                </div>
                
                <div class="grid-boxes-in">
                    <h3>Mur de défense niveau : <?php echo $_SESSION["buildings"]->wall; ?></h3>  
                    <img class="img-responsive" src="assets/img/main/img3.jpg" alt="">
                    <div class="grid-boxes-caption">                      
                    <p class="descbat">Afin de vous protéger des attaques de zombies il vous faut une enceinte pour vous protéger. Quoi de mieux qu'un mur qui pourra retenir une partie des assauts de zombies.</p>
                    <p style="text-align: right;">Prix : <?php echo $mur->GetPrixBois(); ?> Bois <?php echo $mur->GetPrixNourriture(); ?> Nourritures <?php echo $mur->GetPrixEau(); ?> Eau</p>
                    <?php if(empty($_SESSION["construct"]->wall)):?>
                        <?php if($mur->action == 1): ?>
                        <p style="text-align: right;"> 
                        <?php
                            $secondes = $mur->GetTemps();

                            $temp = $secondes % 3600;

                            $heures = ( $secondes - $temp ) / 3600 ;

                            $secondes = $temp % 60 ;

                            $minutes = ( $temp - $secondes ) / 60; 

                            echo "Temps de construction : " . $heures . "h" . $minutes . "m" . $secondes . "s"; 
                        ?>
                        </p>
                            <a class='btn construct btn-block' href='<?=$this->url('default_upgrade',['idBuilding'=>10])?>'>Construire</a>
                        <?php endif ?>
                    <?php else:?>
                        <div class="compteur" style="text-align: center;" id="time<?php echo $mur->id ?>"></div>
                        <div><?php echo $mur->barre ?></div>
                    <?php endif ?>
                    </div>
                </div>
            </div><!--/container-->
        </div>
        <!--=== End Content Part ===-->



<?php $this->stop('main_content') ?>
