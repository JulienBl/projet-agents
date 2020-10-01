<?php include('header.php'); ?>


<div class="container container background-color-blanc">

<div class="message">
    <?php $this->title = "Connexion"; ?>
    <?= $this->session->show('error_login'); ?>
</div>

<h1>Agent, veuillez vous connecter</h1>

    <form class="text-center" method="post" action="index.php?route=login">
        <label for="pseudo">Pseudo</label><br>
        <input class="custom-input" type="text" id="pseudo" name="pseudo" value="<?= isset($post) ? htmlspecialchars($post->get('pseudo')): ''; ?>"><br>
        <label for="password">Mot de passe</label><br>
        <input class="custom-input" type="password" id="password" name="password"><br>
        <input class="btn btn-agent" type="submit" value="Connexion" id="submit" name="submit">
    </form>
   
</div>

<?php include('footer.php'); ?>