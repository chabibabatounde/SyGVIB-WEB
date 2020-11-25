<?php include('header.php'); ?>
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2><?php 
                echo $user['login']; 
             ?></h2>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>Mon profil</h2>
                    </div>
                    <div class="header">
                        <h2><?php echo $message; ?></h2>
                    </div>
                    <form method="POST" action="">
	                    <div class="body">

                            <strong>LOGIN : </strong><?php echo $user['login']; ?><br><br>
                            <strong>SERVICE : </strong><?php echo $libelle; ?><br><br>
                            <strong>AGENCE : </strong><?php echo $agence; ?><br><br>
	                        <h2 class="card-inside-title">Modifier mot de passe</h2>
	                        <div class="row clearfix">
	                            <div class="col-sm-5">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input onkeyup="" autocomplete="off" name ="psw" type="text" class="form-control" placeholder="Nouveau mot de passe" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input onkeyup="" autocomplete="off" name ="confirmpsw" type="text" class="form-control" placeholder="Confirmer le mot de passe" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <button class="btn btn-block bg-green waves-effect" type="submit">Modifer</button>
                                    </div>
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