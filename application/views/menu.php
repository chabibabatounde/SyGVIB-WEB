<?php
    $immatriculation = "";
    $maisonAssurance = "";
    $sitesCNSR = "";
    $acceuil = "";
    $agenceAssurance = "";
    $visiteTechnique = "";
    $ajouterAssurance="";
    $consulterVehicule = "";
    $inspecteurs = "";
    $bug = "";

    if($activePage=='bug'){
        $bug = "class='active'";
    }
    if($activePage=='inspecteurs'){
        $inspecteurs = "class='active'";
    }
    if($activePage=='visiteTechnique'){
        $visiteTechnique = "class='active'";
    }
    if($activePage=='consulterVehicule'){
        $consulterVehicule = "class='active'";
    }
    if($activePage=='ajouterAssurance'){
        $ajouterAssurance = "class='active'";
    }
    if($activePage=='acceuil'){
        $acceuil = "class='active'";
    }
    if($activePage=='agenceAssurance'){
        $agenceAssurance = "class='active'";
    }
    if($activePage=='immatriculation'){
        $immatriculation = "class='active'";
    }
    if($activePage=='maisonAssurance'){
        $maisonAssurance = "class='active'";
    }
    if($activePage=='sitesCNSR'){
        $sitesCNSR = "class='active'";
    }
?>
<div class="menu">
    <ul class="list">
        <li <?php echo $acceuil; ?> >
            <a href="<?php echo lien("Acceuil",""); ?>">
                <i class="material-icons">home</i>
                <span>Acceuil</span>
            </a>
        </li>
        <?php
            if($user['type']=="Administrateur"){
        ?>

        <li <?php echo $immatriculation; ?> >
            <a href="<?php echo lien("Immatriculation","nouveau"); ?>">
                <i class="material-icons">filter_9_plus</i>
                <span>Immatriculation</span>
            </a>
        </li>
        <li <?php echo $maisonAssurance; ?> >
            <a href="<?php echo lien("MaisonAssurance",""); ?>">
                <i class="material-icons">verified_user</i>
                <span>Maisons d'assurance</span>
            </a>
        </li>
        <li <?php echo $sitesCNSR; ?> >
            <a href="<?php echo lien("CentreCNSR",""); ?>">
                <i class="material-icons">motorcycle</i>
                <span>Sites - CNSR</span>
            </a>
        </li>

        <?php        
            }
        ?>

        <?php
            if($user['type']=="AgenceAssurance"){
        ?>
        <li  <?php echo $ajouterAssurance; ?> >
            <a href="<?php echo lien("Assurance","nouveau"); ?>" class="">
                <i class="material-icons">verified_user</i>
                <span>Assurance</span>
            </a>
        </li>
        <?php        
            }
        ?>

        <?php
            if($user['type']=="Assureur"){
        ?>
        <li <?php echo $agenceAssurance; ?> >
            <a href="<?php echo lien("Assurance","agences"); ?>" >
                <i class="material-icons">store</i>
                <span>Nos agences</span>
            </a>
        </li>
        <?php        
            }
        ?>

        <?php
            if($user['type']=="AgenceCNSR"){
        ?>

        <li <?php echo $consulterVehicule; ?> >
            <a href="<?php echo lien("CNSR","consulterVehicule"); ?>" >
                <i class="material-icons">time_to_leave</i>
                <span>Consulter un véhicule</span>
            </a>
        </li>

        <li <?php echo $inspecteurs; ?> >
            <a href="<?php echo lien("CNSR","inspecteurs"); ?>" >
                <i class="material-icons">person</i>
                <span>Inspecteurs</span>
            </a>
        </li>

        <?php        
            }
        ?>

        <?php
            if($user['type']=="InspecteurCNSR"){
        ?>
        <li <?php echo $visiteTechnique; ?> >
            <a href="<?php echo lien("CNSR","visiteTechniqueAdd"); ?>" >
                <i class="material-icons">build</i>
                <span>Visite technique</span>
            </a>
        </li>

        <li <?php echo $consulterVehicule; ?> >
            <a href="<?php echo lien("CNSR","consulterVehicule"); ?>" >
                <i class="material-icons">time_to_leave</i>
                <span>Consulter un véhicule</span>
            </a>
        </li>

        <?php        
            }
        ?>

        <li <?php echo $bug; ?> >
            <a href="<?php echo lien("embeddedAPI","getToken"); ?>">
                <i class="material-icons col-blue">donut_large</i>
                <span>Signaler un Bug</span>
            </a>
        </li>
    </ul>
</div>