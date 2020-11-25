<?php
    $user = $_SESSION['SyGVIB']['user'];
?>
<div class="user-info">
    <div class="image">
        <img src="<?php echo img_url($user['photoProfil']); ?>" width="48" height="48" alt="User" />
    </div>
    <div class="info-container">
        <?php
        
            $libelle='';
            $agence = '';
            if($user['type']=="Administrateur"){
                $libelle = $user['objet']['libelle'];
                $agence = "Agence : ".$user['objet']['agence'];
            }
            if($user['type']=="Assureur"){
                $libelle = $user['objet']['nomAssureur'];
            }
            if($user['type']=="AgenceAssurance"){
                $libelle = $user['objet']['nomAssureur'];
                $agence = "Agence : ".$user['objet']['libelleAgence'];
            }
            if($user['type']=="AgenceCNSR"){
                $libelle = "Agence CNSR";
                $agence = $user['objet']['libelleAgenceCNSR'];
            }
            if($user['type']=="InspecteurCNSR"){
                $libelle ="Agence CNSR : ".$user['objet']['libelleAgenceCNSR'];
                $agence = $user['objet']['nomInspecteur'];
            }

            

        
            
        ?>
        <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $libelle; ?></div>
        <div class="email"><?php echo $agence; ?></div>
        <div class="btn-group user-helper-dropdown">
            <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
            <ul class="dropdown-menu pull-right">
                <li><a href="<?php echo(lien ("User","Profil")) ?>"><i class="material-icons">face</i>Mon profil</a></li>
                <li><a href="<?php echo(lien ("Login","deconnexion")) ?>"><i class="material-icons">input</i>Déconnexion</a></li>
            </ul>
        </div>
    </div>
</div>