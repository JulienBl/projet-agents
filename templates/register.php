<?php include('header.php'); ?>

<?php $this->title = "Inscription"; ?>

<div class="container background-color-blanc">
<h1>Enregistrement des agents en base de données</h1>
    <form method="post" action="index.php?route=register">
        <label for="pseudo">Pseudo</label><br>
        <input type="text" id="pseudo" name="pseudo" value="<?= isset($post) ? htmlspecialchars($post->get('pseudo')): ''; ?>"><br>
        <?= isset($errors['pseudo']) ? $errors['pseudo'] : ''; ?>
        <label for="password">Mot de passe</label><br>
        <input type="password" id="password" name="password"><br>
        <?= isset($errors['password']) ? $errors['password'] : ''; ?>
        <input type="submit" value="Inscription" id="submit" name="submit">
    </form>
    
</div>

<?php include('footer.php'); ?>