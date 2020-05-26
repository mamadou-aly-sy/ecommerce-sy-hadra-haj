<?php require_once "pages/includes/header.php"; ?>

<div class="container-fluid bg-success header-top d-none d-md-block">
  <div class="container">
    <div class="row text-light pt-2 pb-2">
      <div class="col-md-5">
        <i class="fa fa-envelope-o" aria-hidden="true"></i> mo.aly.sy@gmail.com
      </div>
      <div class="col-md-3"> </div>
      <div class="col-md-2">
        <i class="fa fa-user-o" aria-hidden="true"></i> Compte
      </div>
      <div class="col-md-2">
        <i class="fa fa-cart-plus" aria-hidden="true"></i> Mon Panier
      </div>
    </div>
  </div>
</div>

<!-- navbar -->

<div class="container-fluid bg-dark">
  <nav class="container navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Dropdown
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#">Disabled</a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </nav>
</div>

<!-- slider -->

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="images/1.jpg" alt="First slide">
      <div class="carousel-caption d-none d-md-block">
        <h2>Premier Slide</h2>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Adipisci, dolorem.</p>
        <button class="btn btn-info btn-lg">Acheter</button>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="images/2.jpg" alt="Second slide">
      <div class="carousel-caption d-none d-md-block">
        <h2>Dexieme Slide</h2>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nemo, ea!</p>
        <button class="btn btn-info btn-lg">Acheter</button>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="images/3.jpg" alt="Second slide">
      <div class="carousel-caption d-none d-md-block">
        <h2>Troisieme Slide</h2>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nemo, ea!</p>
        <button class="btn btn-info btn-lg">Acheter</button>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<!-- offers -->

<div class="container-fluid offer pt-3 pb-3 bg-custum-green d-none d-md-block">
  <div class="container">
    <div class="row">
      <div class="col-md-4 m-right">
        <h4>LIVRAISON</h4>
        <p>Lorem ipsum dolor sit amet.</p>
      </div>
      <div class="col-md-4 m-right">
        <h4>APPELLEZ NOUS</h4>
        <p>+222 37 76 89 99</p>
      </div>
      <div class="col-md-4">
        <h4>LOCALISATION</h4>
        <p>Ayne El Talkh</p>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid bg-light-gray">

  <div class="container pt-5">
    <div class="row">
      <h3>TOUS LES PRODUITS</h3>
    </div>
    <div class="underline"></div>
  </div>

  <div class="container mt-5">
    <div class="row">
      <div class="col-md-3">
        <div class="card">
          <img src="images/pink-and-black-nintendo-ds-1462725.jpg" class="card-image-top" alt="" height="200">
          <div class="card-body">
            <h5>Nitendo</h5>
            <h5>100 000 MRU</h5>
            <button class="btn btn-success">Acheter</button>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card">
          <img src="images/white-sony-dualshock-4-controller-on-black-wood-surface-1346154.jpg" class="card-image-top" alt="" height="200">
          <div class="card-body">
            <h5>Mannette PS4 </h5>
            <h5>80 000 MRU</h5>
            <button class="btn btn-success">Acheter</button>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card">
          <img src="images/pink-nintendo-3ds-1367036.jpg" class="card-image-top" alt="" height="200">
          <div class="card-body">
            <h5>Nitendo</h5>
            <h5>50 000 MRU</h5>
            <button class="btn btn-success">Acheter</button>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card">
          <img src="images/red-and-white-sony-dualshock-4-wireless-controller-1441931.jpg" class="card-image-top" alt="" height="200">
          <div class="card-body">
            <h5>Mannette PS4</h5>
            <h5>1 000 MRU</h5>
            <button class="btn btn-success">Acheter</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container mt-5">
    <div class="row">
      <h3>TOP DES CHOSSURES</h3>
    </div>
    <div class="row">
      <div class="underline"></div>
    </div>
  </div>

  <div class="container mt-5">
    <div class="row">
      <div class="col-md-3">
        <div class="card">
          <img src="images/1.jpg" class="card-image-top" alt="" height="200">
          <div class="card-body">
            <h5>NIKE</h5>
            <h5>60 000 MRU</h5>
            <button class="btn btn-success">Acheter</button>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card">
          <img src="images/2.jpg" class="card-image-top" alt="" height="200">
          <div class="card-body">
            <h5>TRANSVERSE </h5>
            <h5>80 000 MRU</h5>
            <button class="btn btn-success">Acheter</button>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card">
          <img src="images/3.jpg" class="card-image-top" alt="" height="200">
          <div class="card-body">
            <h5>CLASSIC</h5>
            <h5>50 000 MRU</h5>
            <button class="btn btn-success">Acheter</button>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card">
          <img src="images/1.jpg" class="card-image-top" alt="" height="200">
          <div class="card-body">
            <h5>NIKE</h5>
            <h5>1 000 MRU</h5>
            <button class="btn btn-success">Acheter</button>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="container-fluid pt-5 pb-5">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <div class="row">
            <h4>LES PLUS RECHERCHER</h4>
          </div>
          <div class="row">
            <div class="underline"></div>
          </div>
          <div class="media mt-5">
            <img src="images/pink-and-black-nintendo-ds-1462725.jpg" class="img-fluid mr-3" alt="" height="200">
            <div class="media-body mt-2">
              <h5>NITENDO</h5>
              <h6>100 000 MRU</h6>
              <button class="btn btn-success"><i class="fa fa-cart-plus"> Acheter</i></button>
            </div>
          </div>
          <div class="media mt-5">
            <img src="images/pink-and-black-nintendo-ds-1462725.jpg" class="img-fluid mr-3" alt="" height="200">
            <div class="media-body mt-2">
              <h5>NITENDO</h5>
              <h6>100 000 MRU</h6>
              <button class="btn btn-success"><i class="fa fa-cart-plus"> Acheter</i></button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php require_once "pages/includes/footer.php"; ?>