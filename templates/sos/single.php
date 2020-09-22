<?php include('header.php'); ?>

<?php $this->title = 'Article'; ?>
<h1>Le Chapitre et vos commentaires</h1>

<div class="container nouvelle-article">
    <h2><?= htmlspecialchars($article->getTitle());?></h2>
    <p><?= htmlspecialchars($article->getContent());?></p>
    <p><?= htmlspecialchars($article->getAuthor());?></p>
    <p>Créé le : <?= htmlspecialchars($article->getCreatedAt());?></p>
</div>
<br>
<div class="actions container">
    <a href="../index.php?route=editArticle&articleId=<?= $article->getId(); ?>">Modifier</a>
    <a href="../index.php?route=deleteArticle&articleId=<?= $article->getId(); ?>">Supprimer</a>
</div>
<br>

<div id="comments" class="text-left container">
    <h3>Ajouter un commentaire</h3>
    <?php include('form_comment.php'); ?>
    <h3>Commentaires</h3>
    <?php
    foreach ($comments as $comment)
    {
        ?>
        <h4><?= htmlspecialchars($comment->getPseudo());?></h4>
        <div class="commentaires">
            <p><?= htmlspecialchars($comment->getContent());?></p>
            <p class="date-commentaires">Posté le <?= htmlspecialchars($comment->getCreatedAt());?></p>
        </div>
        
        <?php
        if($comment->isFlag()) {
            ?>
            <p>Ce commentaire a déjà été signalé</p>
            <?php
        } else {
            ?>
            <p><a href="../index.php?route=flagComment&commentId=<?= $comment->getId(); ?>">Signaler le commentaire</a></p>
            <?php
        }
        ?>
        <p><a href="../index.php?route=deleteComment&commentId=<?= $comment->getId(); ?>">Supprimer le commentaire</a></p>
        <br>
        <?php
    }
    ?>
</div>

<?php include('footer.php'); ?>