<?php include('header.php'); ?>
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>VISITE TECHNIQUE </h2>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2><?php echo $message; ?></h2>
                    </div>
                    <form method="POST" action="">
	                    <div class="body">
	                        <h2 class="card-inside-title">Saisir le numéro d'immatriculation</h2>
	                        <div class="row clearfix">
	                            <div class="col-sm-12">
	                                <div class="form-group">
	                                    <div class="form-line">
	                                        <input onkeyup="" autocomplete="off" name ="immatriculation" type="text" class="form-control" placeholder=" Saisir sans espace (Ex: AG0882RB)" />
	                                    </div>
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