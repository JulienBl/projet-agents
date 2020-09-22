<?php include('header.php'); ?>

<?php $this->title = 'Modifier mot de passe'; ?>
<h1>Modifier le mot de passe</h1>

<div class="message">
    <p>Le mot de passe de <?= $this->session->get('pseudo'); ?> sera modifié</p>
</div>

<div class="container">
    
    <form method="post" action="index.php?route=updatePassword">
        <label for="password">Mot de passe</label><br>
        <input type="password" id="password" name="password"><br>
        <input type="submit" value="Mettre à jour" id="submit" name="submit">
    </form>
</div>
<br>



<?php include('footer.php'); ?>