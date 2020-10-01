<?php include('header.php'); ?>



<div class="container nouvelle-mission background-color-blanc">

    <h2><?= htmlspecialchars($mission->getTitre()); ?></h2>
    <p><?= htmlspecialchars($mission->getObjectif()); ?></p>
    <?= $this->session->show('error_code'); ?>
<?= $this->session->show('valid_code'); ?>
    <form method="post" action="index.php?route=choix_mission">
                
        <input type="code" id="code" name="code" placeholder="Rentrer le code">
        <input type="submit" value="Envoyer le code" id="submit" name="submit">
    </form>


</div>



<?php include('footer.php'); ?>