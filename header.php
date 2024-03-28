<nav class="navbar navbar-expand-lg bg-primary fixed-top" data-bs-theme="dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">Bibliothèque</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav me-auto">
          <!-- <li class="nav-item">
          <a class="nav-link active" href="#">Home
            <span class="visually-hidden">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Features</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Pricing</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About</a>
        </li> -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Gestion des genres</a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="#">Liste des genres</a>
              <a class="dropdown-item" href="#">Ajouter un genre</a>
              <!-- <a class="dropdown-item" href="#">Something else here</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Separated link</a> -->
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Gestion des auteurs <i class="fa-solid fa-person"></i></a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="#">Liste des auteurs </a>
              <a class="dropdown-item" href="#">Ajouter un auteur</a>
              <!-- <a class="dropdown-item" href="#">Something else here</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Separated link</a> -->
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Gestion des nationalités <i class="fa-solid fa-flag"></i></a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="listenationalites.php">Liste des nationalités</a>
              <a class="dropdown-item" href="formAjouterNationalite.php">Ajouter une nationalité</a>
              <!-- <a class="dropdown-item" href="#">Something else here</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Separated link</a> -->
            </div>
          </li>
        </ul>
        <!-- <form class="d-flex">
        <input class="form-control me-sm-2" type="search" placeholder="Search">
        <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
      </form> -->
      </div>
    </div>
  </nav>