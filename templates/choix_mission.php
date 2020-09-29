<?php include('header.php'); ?>



<div class="container nouvelle-mission background-color-blanc">
    <h2><?= htmlspecialchars($mission->getTitre());?></h2>
    <p><?= htmlspecialchars($mission->getObjectif());?></p>

    <label for="code"></label><br>
        <input type="code" id="code" name="code" placeholder="Rentrer le code">
        <input type="submit" value="Envoyer le code" id="submit" name="submit">
   
</div>



<?php include('footer.php'); ?>