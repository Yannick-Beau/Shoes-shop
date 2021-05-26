  <section class="hero">
    <div class="container">
      <!-- Breadcrumbs -->
      <ol class="breadcrumb justify-content-center">
        <li class="breadcrumb-item">
          <a href="<?= $router->generate( 'main.home' ) ?>">
            Home
          </a>
        </li>
        <li class="breadcrumb-item active">
          <?= $viewVars["brand"]->getName() ?>
        </li>
      </ol>
      <!-- Hero Content-->
      <div class="hero-content pb-5 text-center">
        <h1 class="hero-heading">
          <?= $viewVars["brand"]->getName() ?>
        </h1>
      </div>
    </div>
  </section>

  <section class="products-grid">
    <div class="container-fluid">
      <header class="product-grid-header d-flex align-items-center justify-content-between">
        <div class="mr-3 mb-3">
          Affichage de <strong><?= count( $viewVars['products'] ) ?></strong> résultats
        </div>        
        <div class="mb-3 d-flex align-items-center">
          <span class="d-inline-block mr-1">
            Trier par
          </span>
          <select class="custom-select w-auto border-0">
            <option value="orderby_0">Défaut</option>
            <option value="orderby_1">Nom</option>
            <option value="orderby_2">Note</option>
            <option value="orderby_3">Prix</option>
          </select>
        </div>
      </header>
      <div class="row">

        <?php
          if( count( $viewVars['products'] ) == 0 ) :
            echo "<h2>Aucun produit dans cette catégorie :(</h2>";
          endif;
        ?>

        <?php foreach( $viewVars['products'] as $currentProduct ) : ?>
          <!-- product-->
          <div class="product col-xl-3 col-lg-4 col-sm-6">
            <div class="product-image">
              <a href="<?= $router->generate( 'catalog.product', [ 'id' => $currentProduct->getId() ] ) ?>" class="product-hover-overlay-link">
                <img src="<?= $_SERVER['BASE_URI'] ."/". $currentProduct->getPicture() ?>" alt="product" class="img-fluid">
              </a>
            </div>
            <div class="product-action-buttons">
              <a href="#" class="btn btn-outline-dark btn-product-left">
                <i class="fa fa-shopping-cart"></i>
              </a>
              <a href="<?= $router->generate( 'catalog.product', [ 'id' => $currentProduct->getId() ] ) ?>" class="btn btn-dark btn-buy">
                <i class="fa-search fa"></i>
                <span class="btn-buy-label ml-2">
                  Voir
                </span>
              </a>
            </div>
            <div class="py-2">
              <p class="text-muted text-sm mb-1">
                brand #<?= $currentProduct->getbrandId() ?>
              </p>
              <h3 class="h6 text-uppercase mb-1">
                <a href="<?= $router->generate( 'catalog.product', [ 'id' => $currentProduct->getId() ] ) ?>" class="text-dark">
                <?= $currentProduct->getName() ?>
                </a>
              </h3>
              <span class="text-muted">
              <?= $currentProduct->getPrice() ?> €
              </span>
            </div>
          </div>
          <!-- /product-->
        <?php endforeach; ?>
      </div>      
    </div>
  </section>