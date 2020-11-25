<?php include('header.php');

/*
$detail = array(
    'echeance' => "2018-06-01",
    'agence' => "CNSR COTONOU"
    );

$data = array(
    'numeroAlert' => "125",
    'dateEnvoi' => "2018-07-02 20:20:15",
    'immatriculation' => "AG05RB",
    'typeAlert' => "visiteTechnique",
    'detail' => $detail
);



# Create a connection
$url = 'http://artcreativity.io:8080/ArtcNotification/notification/alert';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
curl_setopt($ch, CURLOPT_TIMEOUT, 60);

// This should be the default Content-type for POST requests
curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-type: application/json"));

$result = curl_exec($ch);
if(curl_errno($ch) !== 0) {
    error_log('cURL error when connecting to ' . $url . ': ' . curl_error($ch));
}

curl_close($ch);

*/



?>
<section class="content">
    <!--div class="container-fluid">
        <div class="block-header">
            <h2>ADVANCED FORM ELEMENTS</h2>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            INPUT SLIDER
                            <small>Taken from <a href="http://refreshless.com/nouislider" target="_blank">refreshless.com/nouislider</a> & <a href="http://materializecss.com" target="_blank">materializecss.com</a></small>
                        </h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="javascript:void(0);">Action</a></li>
                                    <li><a href="javascript:void(0);">Another action</a></li>
                                    <li><a href="javascript:void(0);">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-md-6">
                                <p><b>Basic Example</b></p>
                                <div id="nouislider_basic_example"></div>
                                <div class="m-t-20 font-12"><b>Value: </b><span class="js-nouislider-value"></span></div>
                            </div>
                            <div class="col-md-6">
                                <p><b>Range Example</b></p>
                                <div id="nouislider_range_example"></div>
                                <div class="m-t-20 font-12"><b>Value: </b><span class="js-nouislider-value"></span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div-->
</section>
<?php
    include("footer.php");
?>