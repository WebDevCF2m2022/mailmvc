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
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Connexion</a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <form name="connexion" action="" method="post">
                                <li class="dropdown-item" style="display: flex;justify-content: space-around;">
                                    <input name="username" class="dropdown-item" placeholder="Votre nom d'utilisateur" required></input>
                                </li>
                                <li class="dropdown-item" style="display: flex;justify-content: space-around;">
                                    <input name="password" class="dropdown-item" placeholder="Votre mot de passe" required></input>
                                </li>

                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li class="dropdown-item" style="display: flex;justify-content: space-around;">
                                    <input type="submit" class="btn btn-primary"></input>
                            </form>
                        </ul>
                    </li>

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
                    <h1 class="fw-bolder mb-1">MailMVC</h1>
                    <hr>

                    <h3>Envoyez moi un message : </h3>
                </header>

                <form method="POST" action="" name="messages">
                    <div class="mb-3">
                        <?php
                        if (isset($message)) :
                        ?>
                            <button type="button" class="btn btn-warning"><?= $message ?></button><br>
                        <?php
                        endif;
                        ?>
                        <label for="exampleFormControlInput1" class="form-label">Votre adresse mail</label>
                        <input name="messagesmail" type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Votre commentaire</label>
                        <textarea name="messagestext" class="form-control" id="exampleFormControlTextarea1" rows="5" required></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>



            </div>
        </div>
    </div>
    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; mailmvc <?= date("Y") ?></p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>