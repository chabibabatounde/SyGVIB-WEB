<?php include('header.php'); ?>
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>ASSURANCE</h2>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            <span style="color:green; font-size:15px;"> Assurance enregistrée avec succès!</span><br><br>
                            Résumé de la nouvelle immatriculation 
                        </h2>
                    </div>
                    <div class="body row">
                        <div class="col-md-2"><b>Maison d'assurance</b></div>
                        <div class="col-md-10"><i><?php echo $newAssurance['nomAssureur'] ?></i></div>

                        <div class="col-md-2"><b>Durée de l'assurance</b></div>
                        <?php
                            $unite ="";
                            if($newAssurance['uniteDuree']=="year"){
                                $unite = "an(s)";
                            }
                            if($newAssurance['uniteDuree']=="month"){
                                $unite = "mois(s)";
                            }
                            if($newAssurance['uniteDuree']=="days"){
                                $unite = "jour(s)";
                            }
                        ?>
                        <div class="col-md-10"><i><?php echo $newAssurance['duree']." ".$unite; ?></i></div>

                        <div class="col-md-2"><b>Échéance</b></div>
                        <div class="col-md-10"><i><?php echo $newAssurance['echeance'] ?></i></div>
                    </div>
                </div>
            </div>
        </div>
	</div>
</section>
<?php include('footer.php'); ?>