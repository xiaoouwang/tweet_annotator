<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico" />
    <title>Page de connection</title>

    <!-- Bootstrap core CSS -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
      integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2"
      crossorigin="anonymous"
    />
    <!-- Custom styles for this template -->
    <link href="main.css" rel="stylesheet" />
  </head>

  <body class="text-center">
    <form method="post" action="verification.php" class="form-signin">
      <!-- <img class="mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72"> -->
      <h1 class="h3 mb-3 font-weight-normal">Veuillez vous connecter</h1>
      <label for="nom" class="sr-only">Nom</label>
      <input
        name="nom"
        class="form-control"
        placeholder="Nom"
        required
        value = 1
        autofocus
      />
      <label for="prenom" class="sr-only">Prénom</label>
      <input name="prenom" class="form-control" placeholder="Prénom" value = 1 required />
      <label for="n_etu" class="sr-only">Numéro étudiant</label>
      <input
        name="n_etu"
        class="form-control"
        placeholder="Numéro étudiant"
        value = 1
        required
      />
      <label for="mdp" class="sr-only">Mot de passe</label>
      <input
        name="mdp"
        class="form-control"
        placeholder="Mot de passe"
        value = 1
        required
      />
      <div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">
          Connecter
        </button>
      </div>
      <p class="mt-5 mb-3 text-muted">&copy; 2020 by <a style = "color:blue;text-decoration:underline;" href="http://xiaoouwang.github.io">Xiaoou WANG</a></p>
    </form>
  </body>
</html>
