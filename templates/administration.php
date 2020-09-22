<?php include('header.php'); ?>
<?php $this->title = 'Administration'; ?>



<div class="message">   
    <?= $this->session->show('delete_user'); ?>
</div>    


<div class="container background-color-blanc" id="administration">
<h1>Panneau d'administration des Agents</h1>
  
    <h2>Agents</h2>
    <table>
        <tr class="titre">
            <td>Id</td>
            <td>Pseudo</td>
            <td>Date</td>
            <td>Rôle</td>
            <td>Actions</td>
        </tr>
        <?php
        foreach ($users as $user)
        {
            ?>
            <tr>
                <td><?= htmlspecialchars($user->getId());?></td>
                <td><i><?= htmlspecialchars($user->getPseudo());?></i></td>
                <td class="date">Créé le : <?= htmlspecialchars($user->getCreatedAt());?></td>
                <td><?= htmlspecialchars($user->getRole());?></td>
                <td>
                    <?php
                    if($user->getRole() != 'admin') {
                    ?>
                    <a href="index.php?route=deleteUser&userId=<?= $user->getId(); ?>">Supprimer</a>
                    <?php }
                    else {
                        ?>
                    Suppression impossible
                    <?php
                    }
                    ?>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>

</div>




<?php include('footer.php'); ?>