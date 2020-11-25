<?php include('header.php'); ?>
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Centres du C.N.S.R</h2>
        </div>
        <?php
        	echo $message;
        ?>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Enregistré un nouveau centre 
                        </h2>
                    </div>
                    <form method="POST" action="<?php echo lien("CentreCNSR",""); ?>">
	                    <div class="body">
	                        <h2 class="card-inside-title">Veuillez remplire les champs</h2>
	                        <div class="row clearfix">
	                            <div class="col-sm-10">
	                                <div class="form-group">
	                                    <div class="form-line">
	                                        <input name ="nomAgence" type="text" class="form-control" placeholder="Saisir l'agence CNRS" />
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
                        <h2>Agences CNSR enregistrées</h2>
                    </div>
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-sm-12">
                            	<table class="table">
	                                <tbody id="ligneProprio">
	                                	<?php
	                                		foreach ($agenceCNSRs as $agenceCNSR) {
	                                			echo '<tr><td>'.$agenceCNSR['libelleAgenceCNSR'].'</td><td><a href="#"><i class="material-icons">delete</i></a></td></tr>';
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