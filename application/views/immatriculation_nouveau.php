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
	                        <h2 class="card-inside-title">Identité</h2>
	                        <div class="row clearfix">
	                            <div class="col-sm-6">
	                                <div class="form-group">
	                                    <div class="form-line">
	                                        <input name ="nom" type="text" class="form-control" placeholder="Nom du propriétaire" />
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="col-sm-6">
	                                <div class="form-group">
	                                    <div class="form-line">
	                                        <input name ="prenom" type="text" class="form-control" placeholder="Prénom(s) du propriétaire" />
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="col-sm-6">
	                                <div class="form-group">
	                                    <div class="form-line">
	                                        <input id="profession" name ="profession" type="text" class="form-control" placeholder="Profession du propriétaire" />
	                                    </div>
	                                </div>
	                            </div>
	                            
	                            <div class="col-sm-1 form-control-label">
	                                <label for="email_address_2">Né le : </label>
	                            </div>
	                            <div class="col-sm-2">
	                                <div class="form-group">
	                                    <div class="form-line">
	                                        <input name="dateNaissance" type="date" value="1990-01-01" id="email_address_2" class="form-control" placeholder="Date de naissance">
	                                    </div>
	                                </div>
	                            </div>

	                            <div class="col-sm-1 form-control-label">
	                                <label for="email_address_2"> à </label>
	                            </div>
	                            <div class="col-sm-2">
	                                <div class="form-group">
	                                    <div class="form-line">
	                                        <input name="lieuNaissance" type="text" id="email_address_2" class="form-control" placeholder="Lieu de naissance">
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                    </div>

	                    <div class="body">
	                        <h2 class="card-inside-title">Adresses</h2>
	                        <div class="row clearfix">
	                            <div class="col-sm-6">
	                                <select onchange="loadVille(this);" name="departement" class="form-control show-tick">
	                                    <option value="">-- Département de résidence --</option>
	                                    <?php 
	                                    	foreach ($departements as $departement) {
	                                    		echo'<option value="'.$departement['idDepartement'].'">'.$departement['nomDepartement'].'</option>';
	                                    	}
	                                    ?>
	                                </select>
	                            </div>
	                            <div id="listeVille" class="col-sm-6">
	                            	<select onchange="loadQuartier(this);"   name="ville" class="form-control show-tick">
	                            		<option value=""> Ville de résidence </option>
	                            	</select>
	                            </div>
	                            <div id="listeQuartier" class="col-sm-6">
	                            	<select name="quartier" class="form-control show-tick">
	                                    <option value="">-- Quartier / Village de résidence --</option>
	                                    <option value="autre">-- Autres (à saisir) --</option>
	                                </select>
	                            </div>

	                            

	                            <script type="text/javascript">
	                            	function loadVille(departement) {
	                            		var idDepartement = departement.value;
	                            		var xhr  =  new XMLHttpRequest();
	                            		var url = "<?php echo lien('Ville','getVilles'); ?>";
								        xhr.open('POST', url);
								        xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
								        xhr.send("idDepartement="+idDepartement);
								        xhr.onreadystatechange = function() {
								            if (xhr.readyState == 4 && xhr.status == 200) {
								            	var resultat = xhr.response;
								            	document.getElementById("listeVille").innerHTML = resultat;
								            }
								        };
	                            	}

	                            	function loadQuartier(ville) {
	                            		var idVille = ville.value;
	                            		var xhr  =  new XMLHttpRequest();
	                            		var url = "<?php echo lien('Quartier','getQuartiers'); ?>";
								        xhr.open('POST', url);
								        xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
								        xhr.send("idVille="+idVille);
								        xhr.onreadystatechange = function() {
								            if (xhr.readyState == 4 && xhr.status == 200) {
								            	var resultat = xhr.response;
								            	document.getElementById("listeQuartier").innerHTML = resultat;
								            }
								        };
	                            	}

	                            	
	                            </script>
	                            <div class="col-sm-6">
	                            	<div class="form-group">
	                                    <div class="form-line">
	                                        <input name ="nouveauQuartier" type="text" class="form-control" placeholder="saisir le Quartier/Village" />
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="col-sm-6">
	                                <div class="form-group">
	                                    <div class="form-line">
	                                        <input name ="adresse" type="text" class="form-control" placeholder="Adresse (carré, maison, lot, etc...)" />
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="col-sm-6">
	                                <div class="form-group">
	                                    <div class="form-line">
	                                        <input name ="telephone" type="number" class="form-control" placeholder="Contact téléphonique (exemple:229XXXXXXXX)" />
	                                    </div>
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