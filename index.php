<!DOCTYPE html>
<html>
<head>
	<title>Magesti</title>
	<meta charset="utf-8">
    <link rel="shortcut icon" href="image/Icon/logo.ico">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/font-awesome.min.css">

</head>
<body>
<div class="container">
    <div class="row">
<div class="alert alert-danger alert-login collapse" role="alert">
           Veuillez remplir tout les champs!
</div>
<div class="alert alert-danger alert-login-false collapse" role="alert">
   Identifiant introuvable!
</div>

        <div class="col-md-12 cont">
            <div class="account-wall">
            	<h1 class="text-center login-title" ><b>Se connecter</b></h1>
                <form class="form-signin" action='fonction/login.php' method='post'>
                 <input type="text" class="form-control input-login input-user"  name="matricule" placeholder="Identifiant" required autofocus>
                 <input type="password" class="form-control input-login input-mot-pass" name="pass" placeholder="Mot de passe" required autofocus>
                 <button class="btn btn-primary btn-login btn-lg" type="submit"><b>Valider</b></button>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="bootstrap/js/jquery.js"></script>
<script type="text/javascript" src="js/main.js"></script>
</body>
</html>
<!--href="fonction/login.php"-->