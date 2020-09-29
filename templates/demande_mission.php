<?php include('header.php'); ?>


<div class="container background-color-blanc">
    <h1>Les missions</h1>
    
    <p>Comme tous bon agents, vous connaissez les règles ici. Sinon référez vous à la page <a href="index.php"> d'accueil des agents</a><p/>
   
   
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






<?php include('footer.php'); ?>