<?php include('header.php'); ?>


<div class="container container background-color-blanc">

<div class="message message-login">
    <?php $this->title = "Connexion"; ?>
    <?= $this->session->show('error_login'); ?>
</div>

<h1>Agent, veuillez vous connecter</h1>

    <form class="text-center" method="post" action="index.php?route=login">
        <label for="pseudo">Pseudo <span class="couleur-rouge">*</span></label><br>
        <input class="custom-input" type="text" id="pseudo" name="pseudo" require value="<?= isset($post) ? htmlspecialchars($post->get('pseudo')): ''; ?>"><br>
        <label for="password">Mot de passe <span class="couleur-rouge">*</span></label><br>
        <input class="custom-input" type="password" id="password" name="password" require><br>
        <input class="btn btn-agent" type="submit" value="Connexion" id="submit" name="submit">
    </form>
   
</div>

<?php include('footer.php'); ?>