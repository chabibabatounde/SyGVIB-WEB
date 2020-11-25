<?php include('header.php'); ?>
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Maison d'assurance</h2>
        </div>
        <?php
        	echo $message;
        ?>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Enregistré une nouvelle maison d'assurance
                        </h2>
                    </div>
                    <form method="POST" action="<?php echo lien("MaisonAssurance",""); ?>">
	                    <div class="body">
	                        <h2 class="card-inside-title">Veuillez remplire les champs</h2>
	                        <div class="row clearfix">
	                            <div class="col-sm-10">
	                                <div class="form-group">
	                                    <div class="form-line">
	                                        <input name ="nomAssureur" type="text" class="form-control" placeholder="Nom de la maison d'assurance" />
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="col-sm-2">
	                            	<button class="btn btn-block bg-green waves-effect" type="submit">Enregistrer</button>
	                            </div>
	                        </div>
	                    </div>
                    </form>
                </div>
            </div>
        </div>


        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>Liste des maisons d'assurance</h2>
                    </div>
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-sm-12">
                            	<table class="table">
	                                <tbody id="ligneProprio">
	                                	<?php
	                                		foreach ($maisonAssurances as $maisonAssurance) {
	                                			echo '<tr><td>'.$maisonAssurance['nomAssureur'].'</td><td><a href="#"><i class="material-icons">delete</i></a></td></tr>';
	                                		}
	                                	?>
	                                </tbody>
	                            </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</div>
</section>
<?php include('footer.php'); ?>