<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>Mailmvc</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico"/>
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet"/>
</head>
<body>
<!-- Responsive navbar-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="./">Mailmvc - admin</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
                    class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link active" href="./">Accueil</a></li>
                <li class="nav-item"><a class="nav-link" href="./?disconnect">Déconnexion</a></li>

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
                <h1 class="fw-bolder mb-1">MailMVC - admin</h1>
                <hr>

                <h3>Voir les messages : </h3>
            </header>

            <?php
            if (isset($message)):
                ?>
                <button type="button" class="btn btn-warning"><?= $message ?></button><br>
            <?php
            else:
                foreach ($responseMessages as $item):
                    ?>
                <article>
                    <h4>Date : <?=$item['messagesdate']?> Par <?=$item['messagesmail']?></h4>
                    <p><?=nl2br($item['messagestext'])?></p>
                </article>
                <?php
                endforeach;
            endif;
            ?>


            <?php
            var_dump($_SESSION, $_POST);
            ?>


        </div>
    </div>
</div>
<!-- Footer-->
<footer class="py-5 bg-dark">
    <div class="container"><p class="m-0 text-center text-white">Copyright &copy; mailmvc <?= date("Y") ?></p>
    </div>
</footer>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>
</body>
</html>