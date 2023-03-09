<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Mailmvc</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>
<body>
<!-- Responsive navbar-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="./">Mailmvc</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link active" href="./">Accueil</a></li>
                <li class="nav-item"><a class="nav-link" href="./?connect">Connexion</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-8">

                <!-- Post header-->
                <header class="mb-4">
                    <!-- Post title-->
                    <h1 class="fw-bolder mb-1">DB - BDD : Connexion</h1>
                    <!-- Post meta content-->
                    
                    <p class="fs-5 mb-4">Site de préparation du travail de groupe du <a href="https://github.com/WebDevCF2m2022/MVC-projets" target="_blank">CF2m</a> utilisant des morceaux d'articles libres depuis <a href="https://fr.wikipedia.org/wiki/Wikip%C3%A9dia:Accueil_principal" target="_blank">Wikipédia</a>. Les spécifications techniques sont : MVC avec un dossier publique, PHP 8 procédural et MariaDB.</p>
                    <h3>Connexion à l'administration :  </h3>
                    <form method="POST" action="" name="Connexion">
  <div class="mb-3">
    <?php
      if(isset($message)):
    ?>
<button type="button" class="btn btn-warning"><?=$message?></button><br>
    <?php
      endif;
    ?>
    <label for="exampleInputEmail1" class="form-label">Username</label>
    <input name="username" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
    <div id="emailHelp" class="form-text">username</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input name="userpwd" type="password" class="form-control" id="exampleInputPassword1" required>
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<?php
var_dump($_SESSION,$_POST);
?>

                    <a href="./">Retour sur notre site !</a>
                </header>
                

</div>

<!-- Footer-->
<footer class="py-5 bg-dark">
    <div class="container"><p class="m-0 text-center text-white">Copyright &copy; mailmvc <?=date("Y")?></p></div>
</footer>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>
</body>
</html>