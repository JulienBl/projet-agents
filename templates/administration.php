<?php include('header.php'); ?>
<?php $this->title = 'Administration'; ?>





<div class="container background-color-blanc" id="administration">
<h1>Panneau d'administration des missions et Agents</h1>

<div class="message">
    <?= $this->session->show('add_mission'); ?>
    <?= $this->session->show('edit_mission'); ?>
    <?= $this->session->show('delete_mission'); ?>   
    <?= $this->session->show('delete_user'); ?>
</div>    


<h2>Missions</h2>
    <a href="index.php?route=addMission">Nouvel mission</a>
    <table>
        <tr class="titre">
            <td>Id</td>
            <td>Titre</td>
            <td>Objectif</td>
            <td>Code</td>
            <td>Temps</td>
            <td>Id mission précédente</td>           
        </tr> 
        <?php
        foreach ($missions as $mission)
        {
            ?>
            <tr class="separation">
                <td><?= htmlspecialchars($mission->getId());?></td>
                <td><?= htmlspecialchars($mission->getTitre());?></td>
                <td><?= substr(htmlspecialchars($mission->getObjectif()), 0, 150);?></td>
                <td><?= htmlspecialchars($mission->getCode());?></td>
                <td><?= htmlspecialchars($mission->getTemps());?></td>
                <td><?= htmlspecialchars($mission->getId_mission_precedente());?></td>
                <td>
                    <a href="index.php?route=editMission&missionId=<?= $mission->getId(); ?>">Modifier</a>
                    <a href="index.php?route=deleteMission&missionId=<?= $mission->getId(); ?>" onclick="return(confirm('Etes-vous sûr de vouloir supprimer la mission ?'));">Supprimer</a>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>



  
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
                    <a href="index.php?route=deleteUser&userId=<?= $user->getId(); ?>" onclick="return(confirm('Etes-vous sûr de vouloir supprimer l\'agent ?'));">Supprimer</a>
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