<?php include('header.php'); ?>



<div class="container nouvelle-mission background-color-blanc">
    <h2><?= htmlspecialchars($mission->getTitre());?></h2>
    <p><?= htmlspecialchars($mission->getObjectif());?></p>   
   
</div>



<?php include('footer.php'); ?>