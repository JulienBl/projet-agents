<?php include('header.php'); ?>


<div class="container background-color-blanc">
    <h1>Les missions</h1>
    
    <p>Comme tous bon agents, vous connaissez les règles ici. Sinon référez vous à la page <a href="index.php"> d'accueil des agents</a><p/>
   
    <div>
        <div class="message">
            <?php $this->title = "Connexion"; ?>
            <?= $this->session->show('error_login'); ?>
        </div>
   
        <form method="post" action="index.php?route=mission">
            <label for="pseudo">Nom de l'agent</label><br>
                <input type="text" id="pseudo" name="pseudo" value="<?= isset($post) ? htmlspecialchars($post->get('pseudo')): ''; ?>"><br>
            <label for="password">Mot de passe</label><br>
            <input type="password" id="password" name="password"><br>
            <input type="submit" value="Connexion" id="submit" name="submit">
        </form>

    </div>
    


    <div>
        <h2>Choix de mission</h2>

        <form method="post" action="index.php?route=choix_mission">           
            <select name="mission" id="mission-select">
                <option value="">Choisissez votre mission</option>
                <option value="mission1">Mission pour débuter</option>
                <input type="submit" value="Valider" />

                
            </select>
        
        </form>


    </div>




</div>


<?php







?>


<br/><br/><br/><br/><br/><br/>



<?php include('footer.php'); ?>