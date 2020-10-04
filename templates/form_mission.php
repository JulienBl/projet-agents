

<?php
$route = isset($post) && $post->get('id') ? 'editMission&missionId='.$post->get('id') : 'addMission';
$submit = $route === 'addMission' ? 'Envoyer' : 'Mettre à jour';
?>

<div class="container">
    <form method="post" action="index.php?route=<?= $route; ?>">
        <label  for="titre">Titre</label><br>
        <input class="titre" type="text" id="titre" name="titre" value="<?= isset($post) ? htmlspecialchars($post->get('titre')): ''; ?>"><br>
        <?= isset($errors['titre']) ? $errors['titre'] : ''; ?>
        <label for="objectif">Objectif</label><br>
        <textarea  rows="15" cols="50" id="objectif" name="objectif"><?= isset($post) ? htmlspecialchars($post->get('objectif')): ''; ?></textarea><br>
        <?= isset($errors['objectif']) ? $errors['objectif'] : ''; ?>
        <label for="code">Code</label><br>
        <input class="code" type="text" id="code" name="code" value="<?= isset($post) ? htmlspecialchars($post->get('code')): ''; ?>"><br>
        <?= isset($errors['code']) ? $errors['code'] : ''; ?>
        <label for="temps">Temps</label><br>
        <input class="temps" type="text" id="temps" name="temps" value="<?= isset($post) ? htmlspecialchars($post->get('temps')): ''; ?>"><br>
        <?= isset($errors['temps']) ? $errors['temps'] : ''; ?>
        <label for="id_mission_precedente">Id mission precedente (laisser à nul si 1er mission)</label><br>
        <input class="id_mission_precedente" type="number" id="id_mission_precedente" name="id_mission_precedente" value="<?= isset($post) ? htmlspecialchars($post->get('id_mission_precedente')): ''; ?>"><br>
        <?= isset($errors['id_mission_precedente']) ? $errors['id_mission_precedente'] : ''; ?>
        <input type="submit" value="<?= $submit; ?>" id="submit" name="submit">
    </form>
</div>

