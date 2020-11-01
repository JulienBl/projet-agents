    
                <div class="container-fluid" id="menu">                     
                    <div class="row">
                        <div>                            
                        <a href="index.php"><img src="img/logo.jpg" alt="Logo du projet agents " id="logo"></a>
                        </div>
                        <div class="col-12 placement-menu text-right">
                            <nav class="navbar navbar-expand-md navbar-light ">
                                <button class="navbar-toggler navbar-right " type="button" data-toggle="collapse" data-target="#menu-navbar" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>

                                <div class="collapse navbar-collapse justify-content-end" id="menu-navbar">
                                    <ul class="navbar-nav">
                                        <li class="nav-item">
                                            <a class="nav-link" href="index.php"> Accueil</a>
                                        </li>
                                        <?php
 
                                        //Si le membre est connecté on affiche le menu-Mission
                                        if(isset($_SESSION['login'])){ ?> 
                                            <li class="nav-item">
                                                <a class="nav-link" href="index.php?route=demande_mission"> Mission </a> 
                                            </li> 
                                        <?php }?>                                        
                                      
                                        <li class="nav-item">
                                            <a class="nav-link" href="index.php?route=soon"> Prochainement</a>
                                        </li>  
                                        <li class="nav-item">
                                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Profile de l'agent <?= $this->session->get('pseudo'); ?>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <?php
                                              if ($this->session->get('pseudo')) {
                                                    ?>
                                                    <a href="index.php?route=logout">Déconnexion</a>
                                                    <a href="index.php?route=profile">Profil</a>
                                                    <?php if($this->session->get('role') === 'admin') { ?>
                                                        <a href="index.php?route=administration">Administration</a>
                                                    <?php } ?>                                                    
                                                    <?php
                                                } else {
                                                    ?>
                                                    <a href="index.php?route=register">Inscription</a> <br/>
                                                    <a href="index.php?route=login">Connexion</a>                                                    
                                                    <?php
                                                }
                                                ?>                                     
                                            </div>
                                        </li>                                                                            
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>   
                </div>
       


       


   