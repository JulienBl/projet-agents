<?php include('header.php'); ?>



<div class="container nouvelle-mission background-color-blanc">

    <h2><?= htmlspecialchars($mission->getTitre()); ?></h2>
    <p><?= htmlspecialchars($mission->getObjectif()); ?></p>       


    <?= $this->session->show('error_code'); ?>
<?= $this->session->show('valid_code'); ?>
    <form method="post" action="index.php?route=choix_mission" enctype="multipart/form-data">     
    
        <div id="Crono"></div>              
    


        <img class="image-mission margin-left-right" src="data:image/png;base64,<?= base64_encode($mission->getImage()); ?>" alt="" width="300px;" />



                
        <input class="custom-input" type="code" id="code" name="code" placeholder="Rentrer le code">
        <input class="btn btn-agent" type="submit" value="Envoyer" id="submit" name="submit">
    </form>  

</div>


<script type="text/javascript" src="js/crono.js"></script>
<?php include('footer.php'); ?>