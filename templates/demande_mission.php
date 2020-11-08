<?php include('header.php'); ?>
<?php

 
 if(isset($_SESSION['login'])){ ?> 
    <div class="container background-color-blanc">
        <h1>Les missions</h1>
        
        <p>Comme tous bon agents, vous connaissez les règles ici. Sinon référez vous à la page <a class="a-animation" href="index.php"> d'accueil des agents</a><p/>
    
    
        <div>
            <h2>Choix de mission</h2>
            
            <form method="post" action="index.php?route=choix_mission">           
                <select class="custom-select" name="missionId" id="mission-select">
                    <option value="">Choisissez votre mission</option>
                        <?php 
                            foreach($missions as $mission){
                        ?>
                            <option value="<?php echo htmlspecialchars($mission->getId());?>"> <?php echo htmlspecialchars($mission->getTitre()); ?>  </option>
                        <?php
                        } 
                        ?>       
                </select>  
                <input class="btn btn-agent" name="mission" type="submit" value="Valider"/>        
            </form>
        </div>
    </div>
     
 <?php }else{?> 

    <div id=mauvaise-page-mission class="container background-color-blanc">
        <h1>Agent, future Agent</h1>

        <p>Félicitation pour avoir trouver cette page, MAIS</p>
        
        <p>Vous ne pourrez accéder au réel contenu seulement si vous êtes connecté ! Veuillez vous rediriger vers la pge de connexion ou d'inscritpion !<p/>

        <a href="index.php?route=register">Inscription</a> <br/>
        <a href="index.php?route=login">Connexion</a>   
        
    </div>


<?php }?>






<?php include('footer.php'); ?>