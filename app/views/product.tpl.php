  <section class="hero">
    <div class="container">
      <!-- Breadcrumbs -->
      <ol class="breadcrumb justify-content-center">
        <li class="breadcrumb-item"><a href="<?= $router->generate( 'main.home' ) ?>">Home</a></li>
        <li class="breadcrumb-item active"><?= $viewVars['product']->getCategoryId() ?></li>
      </ol>
    </div>
  </section>

  <section class="products-grid">
    <div class="container-fluid">
      <div class="row">
        <!-- product-->
        <div class="col-lg-6 col-sm-12">
          <div class="product-image">
            <a href="#" class="product-hover-overlay-link">
              <img src="<?= $_SERVER['BASE_URI'] ."/". $viewVars['product']->getPicture() ?>" alt="product" class="img-fluid">
            </a>
          </div>
        </div>
        <div class="col-lg-6 col-sm-12">
          <div class="mb-3">
            <h3 class="h3 text-uppercase mb-1"><?= $viewVars['product']->getName() ?></h3>
            <div class="text-muted">by <em><?= $viewVars['product']->getBrandId() ?></em></div>
            <div>
              <?php 
                $note = intval($viewVars['product']->getRate(), 10);
                while( $note > 0) :?>
              <i class="fa fa-star"></i>
              <?php 
                $note--;
                endwhile; ?>
              <?php 
                $note = intval($viewVars['product']->getRate(), 10);
                $note = 5 - $note;
                while( $note > 0) :?>
              <i class="fa fa-star-o"></i>
              <?php 
                $note--;
                endwhile; ?>
            </div>
          </div>
          <div class="my-2">
            <div class="text-muted"><span class="h4"><?= $viewVars['product']->getPrice() ?> €</span> TTC</div>
          </div>
          <div class="product-action-buttons">
            <form action="" method="post">
              <input type="hidden" name="product_id" value="1">
              <button class="btn btn-dark btn-buy"><i class="fa fa-shopping-cart"></i><span class="btn-buy-label ml-2">Ajouter au panier</span></button>
            </form>
          </div>
          <div class="mt-5">
            <p>
            <?= $viewVars['product']->getDescription() ?>
            </p>
          </div>
        </div>
        <!-- /product-->
      </div>      
    </div>
  </section>