<?php 

include('header.php'); 
?>

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Nos agences - <?php echo $_SESSION['SyGVIB']['user']['objet']['nomAssureur']; ?></h2>
        </div>
        <?php
        	echo $message;
        ?>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Enregistré un nouvel agence 
                        </h2>
                    </div>
                    <form method="POST" action="<?php echo lien("Assurance","agences"); ?>">
	                    <div class="body">
	                        <h2 class="card-inside-title">Veuillez remplire les champs</h2>
	                        <div class="row clearfix">
	                            <div class="col-sm-5">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input name ="nomAgence" type="text" class="form-control" placeholder="Saisissez le nom de l'agence" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input name ="contactAgence" type="text" class="form-control" placeholder="contacts de l'agence" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2"></div>
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
                        <h2><?php echo $_SESSION['SyGVIB']['user']['objet']['nomAssureur']; ?></h2>
                    </div>
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-sm-12">
                            	<table class="table">
	                                <tbody id="ligneProprio">
	                                	<?php
	                                		foreach ($AgenceAssurances as $AgenceAssurance) {
	                                			echo '<tr><td>'.$AgenceAssurance['libelleAgence'].'</td><td><a href="#"><i class="material-icons">delete</i></a></td></tr>';
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