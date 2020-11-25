<head>
  <title>Système de Gestion des Véhicules Immatriculés au bénin</title>
</head>
<div class="login-page" >
  <div class="head" style=""><center><img style="width: 40px; margin-right: 20px; margin-top: -15px;" src="<?php echo img_url("benin.png");?>"> SyGVIB | Connectez-vous!</center></div>
  <div id=vert></div> <div id=jaune></div> <div id=rouge></div>
  <div class="form">
    <?php echo $erreur; ?>
    <form method="post" action="<?php echo lien("Login","");?>" class="login-form">
      <input type="text" name="login" placeholder="identifiant"/>
      <input type="password"  name="password" placeholder="Mot de passe"/>
      <button>se connecter</button>
    </form>
  </div>
</div>



<script type="text/javascript"></script>

<style type="text/css">
	@import url(https://fonts.googleapis.com/css?family=Roboto:300);
#vert{
  background-color: green;
  width: 120px;
  float: left;
  height: 3px;
}
#jaune{
  background-color: yellow;
  float: left;
  width: 120px;
  height: 3px;
}
#rouge{
  float: left;
  background-color: red;
  width: 120px;
  height: 3px;
}

.head{
height: 50px;
font-weight: bold;
background-color: white;
padding-top: 8%;
font-size:20px;
box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}

.login-page {
  width: 360px;
  padding: 8% 0 0;
  margin: auto;
}
.form {
  position: relative;
  z-index: 1;
  max-width: 360px;
  margin: 0 auto 100px;
  padding: 45px;
  text-align: center;
 -webkit-box-shadow: 0px 3px 18px -3px rgba(0,0,0,0.75);
-moz-box-shadow: 0px 3px 18px -3px rgba(0,0,0,0.75);
box-shadow: 0px 3px 18px -3px rgba(0,0,0,0.75);
}
.form input {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: rgba(255,255,0,0.25);
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}
.form button {
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background: #4CAF50;
  width: 100%;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}
.form button:hover,.form button:active,.form button:focus {
  background: #43A047;
}
.form .message {
  margin: 15px 0 0;
  color: #b3b3b3;
  font-size: 12px;
}
.form .message a {
  color: #4CAF50;
  text-decoration: none;
}
.form .register-form {
  display: none;
}
.container {
  position: relative;
  z-index: 1;
  max-width: 300px;
  margin: 0 auto;
}
.container:before, .container:after {
  content: "";
  display: block;
  clear: both;
}
.container .info {
  margin: 50px auto;
  text-align: center;
}
.container .info h1 {
  margin: 0 0 15px;
  padding: 0;
  font-size: 36px;
  font-weight: 300;
  color: #1a1a1a;
}
.container .info span {
  color: #4d4d4d;
  font-size: 12px;
}
.container .info span a {
  color: #000000;
  text-decoration: none;
}
.container .info span .fa {
  color: #EF3B3A;
}
body {
  font-family: "Roboto", sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;      
}
</style>