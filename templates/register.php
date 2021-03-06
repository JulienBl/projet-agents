<?php include('header.php'); ?>

<?php $this->title = "Inscription"; ?>

<div class="container background-color-blanc">
<h1>Enregistrement des agents en base de données</h1>
    <form class="text-center" method="post" action="index.php?route=register">
        <label for="pseudo">Pseudo <span class="couleur-rouge">*</span></label><br>
        <input class="custom-input" type="text" id="pseudo" name="pseudo" require value="<?= isset($post) ? htmlspecialchars($post->get('pseudo')): ''; ?>"><br>
        <?=  isset($errors['pseudo']) ? $errors['pseudo'] : ''; ?>
        <label for="password">Mot de passe <span class="couleur-rouge">*</span></label><br>
        <input class="custom-input" type="password" id="password" name="password" require><br>
        <?= isset($errors['password']) ? $errors['password'] : ''; ?>
        <input class="btn btn-agent" type="submit" value="Inscription" id="submit" name="submit">
    </form>
    
</div>

<?php include('footer.php'); ?>