<?php include('header.php'); ?>


<div class="message">
    <?php $this->title = 'Mon profil'; ?>
    <?= $this->session->show('update_password'); ?>
</div>

<div class="container background-color-blanc">
<h1>Profile de l'agent <?= $this->session->get('pseudo'); ?></h1>
   
    <!--<p><?= $this->session->get('id'); ?></p>-->

    <div class="row">
        <div class="col-6">
            <a href="index.php?route=updatePassword">Modifier son mot de passe</a>
        </div>
        <div class="col-6">
             <a href="index.php?route=deleteAccount">Supprimer mon compte</a>
        </div>
    </div>   
</div>



<?php include('footer.php'); ?>