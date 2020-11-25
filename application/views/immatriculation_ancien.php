<?php include('header.php'); ?>
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>NOUVEL ENREGISTREMENT D'IMMATRICULATION</h2>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Informations du propriétaire
                        </h2>
                    </div>
                    <form method="POST" action="<?php echo lien("Immatriculation","ajouter"); ?>">
	                    <div class="body">
	                        <h2 class="card-inside-title">Selectionner le propriétaire</h2>
	                        <div class="row clearfix">
	                            <div class="col-sm-12">
	                                <div class="form-group">
	                                    <div class="form-line">
	                                        <input onkeyup="" autocomplete="off" name ="nom" type="text" class="form-control" placeholder="Filtre de recherche" />
	                                    </div>
	                                </div>
	                            </div>
	                        	<div class="col-sm-12">
	                        		<div class="body table-responsive">
	                                    <input name ="idProprietaire"  id ="idProprietaire" type="hidden" class="form-control" placeholder="Marque du véhicule" />
			                            <table class="table">
			                                <thead>
			                                    <tr>
			                                        <th>Nom et Prénom</th>
			                                        <th>Ancienne Immatriculation</th>
			                                    </tr>
			                                </thead>
			                                <tbody id="ligneProprio">
			                                	<?php
			                                		foreach ($proprietaires as $proprietaire) {
			                                			echo '
				                                			<tr style="cursor:pointer;" monID="'.$proprietaire['idProprietaire'].'" onclick="selectProprio(this);">
						                                        <td>'.$proprietaire['nomProprietaire'].' '.$proprietaire['prenomProprietaire'].'</td>
						                                        <td>'.$proprietaire['immatriculation'].'</td>
						                                    </tr>
			                                			';
			                                		}
			                                	?>
			                                </tbody>
			                            </table>
			                            <script type="text/javascript">
			                            	function selectProprio(ligne) {
			                            		document.getElementById('idProprietaire').value = ligne.getAttribute('monID');
			                            		document.getElementById('ligneProprio').innerHTML = "<tr>"+ligne.innerHTML+"</tr>";
			                            	}
			                            </script>
			                        </div>
	                        	</div>
	                        </div>
	                    </div>


	                    <div class="body">
	                        <h2 class="card-inside-title">Voiture</h2>
	                        <div class="row clearfix">
	                            <div class="col-sm-4">
	                                <div class="form-group">
	                                    <div class="form-line">
	                                        <input name ="marque" type="text" class="form-control" placeholder="Marque du véhicule" />
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="col-sm-4">
	                                <div class="form-group">
	                                    <div class="form-line">
	                                        <input name ="type" type="text" class="form-control" placeholder="Type du véhicule" />
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="col-sm-4">
    								<select name="genre" class="form-control show-tick">
	                                    <option value="Vehicule particulier">Vehicule particulier</option>
	                                    <option value="Vehicule utilitaire">Vehicule utilitaire</option>
	                                    <option value="Vehicule administratif">Vehicule administratif</option>
	                                    <option value="Vehicule officiel">Vehicule officiel</option>
	                                </select>
	                            </div>
	                        </div>

	                        <div class="row clearfix">
	                            <div class="col-sm-4">
	                                <select name="energie" class="form-control show-tick">
	                                    <option value="">-- Energie --</option>
	                                    <?php 
	                                    	foreach ($energies as $energie) {
	                                    		echo'<option value="'.$energie['idEnergie'].'">'.$energie['libelleEnergie'].'</option>';
	                                    	}
	                                    ?>
	                                </select>
	                            </div>
	                            <div class="col-sm-4">
	                                <select name="carosserie" class="form-control show-tick">
	                                    <option value="">-- Carosserie --</option>
	                                    <?php 
	                                    	foreach ($carosseries as $carosserie) {
	                                    		echo'<option value="'.$carosserie['idCarosserie'].'">'.$carosserie['libelleCarosserie'].'</option>';
	                                    	}
	                                    ?>
	                                </select>
	                            </div>
	                            <div class="col-sm-4">
	                                <div class="form-group">
	                                    <div class="form-line">
	                                        <input name ="puissance" type="number" class="form-control" placeholder="Puissance (en CV)" />
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="col-sm-4">
	                                <div class="form-group">
	                                    <div class="form-line">
	                                        <input name ="poidVide" type="number" class="form-control" placeholder="Poid à vide (en Kg)" />
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="col-sm-4">
	                                <div class="form-group">
	                                    <div class="form-line">
	                                        <input name ="chargeUtile" type="number" class="form-control" placeholder="Charge utile (en Kg)" />
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="col-sm-4">
	                                <div class="form-group">
	                                    <div class="form-line">
	                                        <input name ="place" type="number" class="form-control" placeholder="Place assise" />
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="col-sm-4">
	                                <div class="form-group">
	                                    <div class="form-line">
	                                        <input name ="chassis" type="text" class="form-control" placeholder="Numéro de série / chassis" />
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="col-sm-4">
	                                <div class="form-group">
	                                    <div class="form-line">
	                                        <input name ="moteur" type="text" class="form-control" placeholder="Numéro de série / moteur" />
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="col-sm-4">
	                                <div class="form-group">
	                                    <div class="form-line">
	                                        <input name ="dateImmatriculation" type="date" class="form-control" placeholder="Date Premiere Immatriculation" />
	                                    </div>
	                                </div>
	                            </div>

	                            <div class="col-sm-offset-10 col-sm-2">
	                            	<button class="btn btn-block bg-green waves-effect" type="submit">Enregistrer</button>
	                            </div>
	                        </div>
	                    </div>

                    </form>
                </div>
            </div>
        </div>
	</div>
</section>
<?php include('footer.php'); ?>