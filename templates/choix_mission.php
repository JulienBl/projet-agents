<?php include('header.php'); ?>



<div class="container nouvelle-mission">
    <h2><?= htmlspecialchars($mission->getTitre());?></h2>
    <p><?= htmlspecialchars($mission->getObjectif());?></p>    
</div>



<?php include('footer.php'); ?>