<?php include('header.php'); ?>
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>ASSURANCE - Résultat de recherche pour <?php echo $voiture['immatriculation']; ?></h2>
        </div>


        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Nouvelle Assurance
                        </h2>
                    </div>
                    <div class="body row">
                        <form method="POST" action="<?php echo lien('Assurance','ajouter'); ?>">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input name ="dateDebut" type="date" class="form-control" placeholder="Date de début" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input name ="duree" type="number" class="form-control" placeholder="Durée de validité" />
                                        <input name ="idVoiture" type="hidden" value="<?php echo $voiture['idVoiture'] ?>" />
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-sm-3">
                                <select name="unite" class="form-control show-tick">
                                    <option value="year">Année(s)</option>
                                    <option value="month">Mois</option>
                                    <option value="days">Jour</option>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <button class="btn btn-block bg-green waves-effect" type="submit">Enregistrer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>



        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                        	Propriétaire
                        </h2>
                    </div>
                    <div class="body row">
                        <div class="col-lg-2">
                            <p><b>Nom : </b></p>
                            <p><b>Prenom : </b></p>
                            <p><b>Né le: </b></p>
                            <p><b>À : </b></p>
                        </div>
                        <div class="col-lg-4">
                            <p><?php echo $voiture['nomProprietaire']; ?></p>
                            <p><?php echo $voiture['prenomProprietaire']; ?></p>
                            <p><?php echo $voiture['dateNaissance']; ?></p>
                            <p><?php echo $voiture['lieuNaissance']; ?></p>
                        </div>

                        <div class="col-lg-2">
                            <p><b>Profession : </b></p>
                            <p><b>Résidence : </b></p>
                            <p><b>Adresse : </b></p>
                            <p><b>Téléphone : </b></p>
                        </div>
                        <div class="col-lg-4">
                            <p><?php echo $voiture['profession']; ?></p>
                            <p><?php echo $voiture['nomDepartement']." - ".$voiture['nomVille']." - ".$voiture['nomQuartier']; ?></p>
                            <p><?php echo $voiture['adresse']; ?></p>
                            <p><?php echo $voiture['telephone']; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Véhicule
                        </h2>
                    </div>
                    <div class="body row">
                        <div class="col-lg-2">
                            <p><b>Marque : </b></p>
                            <p><b>Genre : </b></p>
                            <p><b>Type : </b></p>
                            <p><b>Energie : </b></p>
                            <p><b>Puissance : </b></p>
                            <p><b>Charge à vide : </b></p>
                            <p><b>Charge utile: </b></p>
                        </div>
                        <div class="col-lg-4">
                            <p><?php echo $voiture['marque']; ?></p>
                            <p><?php echo $voiture['genre']; ?></p>
                            <p><?php echo $voiture['type']; ?></p>
                            <p><?php echo $voiture['libelleEnergie']; ?></p>
                            <p><?php echo $voiture['puissance']. " CV"; ?></p>
                            <p><?php echo $voiture['poidVide']."Kg"; ?></p>
                            <p><?php echo $voiture['chargeUtile']."Kg"; ?></p>
                        </div>

                        <div class="col-lg-2">
                            <p><b>Poid à charge : </b></p>
                            <p><b>Carosserie : </b></p>
                            <p><b>N° Chassis : </b></p>
                            <p><b>N° Moteur : </b></p>
                            <p><b>Place assise : </b></p>
                            <p><b>1e Immatriculation : </b></p>
                            <p><b>N° de Plaque : </b></p>
                        </div>
                        <div class="col-lg-4">
                            <p><?php echo $voiture['poidTotal']."Kg"; ?></p>
                            <p><?php echo $voiture['libelleCarosserie']; ?></p>
                            <p><?php echo $voiture['numeroChassis']; ?></p>
                            <p><?php echo $voiture['numeroMoteur']; ?></p>
                            <p><?php echo $voiture['placeAssise']; ?></p>
                            <p><?php echo $voiture['1immatriculation']; ?></p>
                            <p class="font-underline col-cyan"><b><?php echo $voiture['immatriculation']; ?></b></p>
                        </div>

                        
                    </div>
                </div>
            </div>
        </div>



        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            ASSURANCES (Pour <?php echo $user['objet']['nomAssureur']; ?>)
                        </h2>
                    </div>
                    <div class="body row">
                        <div class="col-sm-12">
                            <div class="form-group">
                               <div class="body table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>DATE D'ASSURANCE</th>
                                                <th>DUREE</th>
                                                <th>ECHEANCE</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i=0;
                                                foreach ($mesAssurances as $key) {
                                                    $i++;

                                                    $unite ="";
                                                    if($key['uniteDuree']=="year"){
                                                        $unite = "an(s)";
                                                    }
                                                    if($key['uniteDuree']=="month"){
                                                        $unite = "mois(s)";
                                                    }
                                                    if($key['uniteDuree']=="days"){
                                                        $unite = "jour(s)";
                                                    }

                                                    echo "
                                                    <tr>
                                                        <td>".$i."</td>
                                                        <td>".$key['dateAssurance']."</td>
                                                        <td>".$key['duree']." ".$unite."</td>
                                                        <td>".$key['echeance']."</td>
                                                    </tr>";
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
	</div>
</section>
<?php include('footer.php'); ?>