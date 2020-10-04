<?php include('header.php'); ?>


<div class="message">
    <?php $this->title = 'Mon profil'; ?>
    <?= $this->session->show('update_password'); ?>
</div>

<div id="profile" class="container background-color-blanc">
<h1>Profile de l'agent <?= $this->session->get('pseudo'); ?></h1>
   
    <!--<p><?= $this->session->get('id'); ?></p>-->

    <div class="row">
    <div class="col-3"></div>
        <div class="col-3">
            <a class="btn" href="index.php?route=updatePassword">Modifier son mot de passe</a>
        </div>
        <div class="col-3">
             <a class="btn" id="pop-supprimer-compte">Supprimer mon compte</a>
        </div>
        <div class="col-3"></div>
    </div>   
</div>

<div id="supprimer-compte" class="container background-color-blanc display-none">
    <h2 class="text-center">Êtes-vous sur de vouloir supprimer votre compte ?</h2>
    <div class="row">
        <div class="col-3"></div>
        <div class="col-3">
            <a href="index.php?route=profile">Non</a>
        </div>
        <div class="col-3">
             <a href="index.php?route=deleteAccount">Oui supprimer mon compte</a>
        </div>
        <div class="col-3"></div>
    </div>   

</div>


<?php include('footer.php'); ?>