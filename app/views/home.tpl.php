  <section>
    <div class="container-fluid">
      <div class="row mx-0">
        <div class="col-md-6">
          <div class="card border-0 text-white text-center">
            <img src="<?= $_SERVER['BASE_URI'] ."/". $viewVars['categorys'][0]->getPicture() ?>" alt="Card image" class="card-img">
            <div class="card-img-overlay d-flex align-items-center">
              <div class="w-100 py-3">
                <h2 class="display-3 font-weight-bold mb-4">
                <?= $viewVars['categorys'][0]->getName() ?>
                </h2>
                <a href="<?= $router->generate( 'catalog.category', [ 'id' => $viewVars['categorys'][0]->getId() ] ) ?>" class="btn btn-light">
                  Découvrir
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card border-0 text-white text-center">
            <img src="<?= $_SERVER['BASE_URI'] ."/". $viewVars['categorys'][1]->getPicture() ?>" alt="Card image" class="card-img">
            <div class="card-img-overlay d-flex align-items-center">
              <div class="w-100 py-3">
                <h2 class="display-3 font-weight-bold mb-4">
                <?= $viewVars['categorys'][1]->getName() ?>
                </h2>
                <a href="<?= $router->generate( 'catalog.category', [ 'id' => $viewVars['categorys'][1]->getId() ] ) ?>" class="btn btn-light">
                  C'est parti
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row mx-0">
        <div class="col-lg-4">
          <div class="card border-0 text-center text-white">
            <img src="<?= $_SERVER['BASE_URI'] ."/". $viewVars['categorys'][2]->getPicture() ?>" alt="Card image" class="card-img">
            <div class="card-img-overlay d-flex align-items-center">
              <div class="w-100">
                <h2 class="display-4 mb-4">
                <?= $viewVars['categorys'][2]->getName() ?>
                </h2>
                <a href="<?= $router->generate( 'catalog.category', [ 'id' => $viewVars['categorys'][2]->getId() ] ) ?>" class="btn btn-link text-white">
                  Faire un tour
                  <i class="fa-arrow-right fa ml-2"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="card border-0 text-center text-dark">
            <img src="<?= $_SERVER['BASE_URI'] ."/". $viewVars['categorys'][3]->getPicture() ?>" alt="Card image" class="card-img">
            <div class="card-img-overlay d-flex align-items-center">
              <div class="w-100">
                <h2 class="display-4 mb-4">
                <?= $viewVars['categorys'][3]->getName() ?>
                </h2>
                <a href="<?= $router->generate( 'catalog.category', [ 'id' => $viewVars['categorys'][3]->getId() ] ) ?>" class="btn btn-link text-dark">
                  Se faire plaisir
                  <i class="fa-arrow-right fa ml-2"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="card border-0 text-center text-white">
            <img src="<?= $_SERVER['BASE_URI'] ."/". $viewVars['categorys'][4]->getPicture() ?>" alt="Card image" class="card-img">
            <div class="card-img-overlay d-flex align-items-center">
              <div class="w-100">
                <h2 class="display-4 mb-4">
                <?= $viewVars['categorys'][4]->getName() ?>
                </h2>
                <a href="<?= $router->generate( 'catalog.category', [ 'id' => $viewVars['categorys'][4]->getId() ] ) ?>" class="btn btn-link text-white">
                  Bien choisir <i class="fa-arrow-right fa ml-2"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>