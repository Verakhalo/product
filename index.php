<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mobile Shopee</title>

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Owl-carousel CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha256-UhQQ4fxEeABh4JrcmAJ1+16id/1dnlOEVCFOxDef9Lw=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha256-kksNxjDRxd/5+jGurZUJd1sdR2v+ClrCl3svESBaJqw=" crossorigin="anonymous" />

    <!-- font awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />

    <!-- Custom CSS file -->
    <link rel="stylesheet" href="style.css">
</head>
<?php
//require functions.php
  require('functions.php');
?>
<body>

    <!-- start #header -->
        <header id="header">
            <div class="strip d-flex justify-content-between px-4 py-1 bg-light">
                <p class="font-rale font-size-12 text-black-50 m-0">Marshy Hills Estate, Addo, Ajah, Lagos State, Nigeria. +234 8134629175</p>
                <div class="font-rale font-size-14">
                    <a href="#" class="px-3 border-right border-left text-dark">Login</a>
                    <a href="#" class="px-3 border-right text-dark">Whishlist (0)</a>
                </div>
            </div>

            <!-- Primary Navigation -->
            <nav class="navbar navbar-expand-lg navbar-dark color-second-bg">
                <a class="navbar-brand" href="#">Mobile Shopee</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                  <ul class="navbar-nav m-auto font-rubik">
                    <li class="nav-item active">
                      <a class="nav-link" href="#">On Sale</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">Category</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="product.php">Products <i class="fas fa-chevron-down"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Blog</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">Category <i class="fas fa-chevron-down"></i></a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">Coming Soon</a>
                      </li>
                  </ul>
                  <form action="#" class="font-size-14 font-rale">
                      <a href="cart.php" class="py-2 rounded-pill color-primary-bg">
                        <span class="font-size-16 px-2 text-white"><i class="fas fa-shopping-cart"></i></span>
                        <span class="px-3 py-2 rounded-pill text-dark bg-light"><?php echo count($product->getData(table:'cart')); ?></span>
                      </a>
                  </form>
                </div>
              </nav>
               <!-- !Primary Navigation -->

        </header>
    <!-- !start #header -->

    <!-- start #main-site -->
    <main id="main-site">

       <section id="banner-area">
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="assets/Banner2.png" alt="Banner1">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="assets/Banner1.png" alt="Banner2">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="assets/Banner2.png" alt="Banner3">
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
</section>

        <!-- Top Sale -->
<?php
  
  shuffle($product_shuffle);
  // request method post
  if($_SERVER['REQUEST_METHOD'] == "POST"){
    if (isset($_POST['top_sale_submit'])){
        // call method addToCart
        $Cart->addToCart($_POST['user_id'], $_POST['item_id']);
    }
}
?>
<section id="top-sale">
            <div class="container py-5">
              <h4 class="font-rubik font-size-20">Top Sale</h4>
              <hr>
              <!-- owl carousel -->
                <div class="owl-carousel owl-theme">
                <?php foreach ($product_shuffle as $item) { ?>
                  <div class="item py-2">
                    <div class="product font-rale">
                      <a href="<?php printf('%s?item_id=%s', 'product.php',  $item['item_id']); ?>"><img src="<?php echo $item['item_image'] ?? "assets/products/1.png";?>" alt="product1" class="img-fluid">
                      </a>     
                      <div class="text-center">
                        <h6><?php echo $item['item_name'] ?? "unknown"; ?></h6>
                        <div class="rating text-warning font-size-12">
                          <span><i class="fas fa-star"></i></span>
                          <span><i class="fas fa-star"></i></span>
                          <span><i class="fas fa-star"></i></span>
                          <span><i class="fas fa-star"></i></span>
                          <span><i class="far fa-star"></i></span>
                        </div>
                        <div class="price py-2">
                          <span>$<?php echo $item['item_price'] ?? "0"; ?></span>
                        </div>
                        <form method="post">
                        <input type="hidden" name="item_id"value="<?php echo $item['item_id'] ?? "1"; ?>">
                        <input type="hidden" name="user_id"value="<?php echo 1; ?>">
                        <?php
                                if (in_array($item['item_id'], $Cart->getCartId($product->getData('cart')) ?? [])){
                                    echo '<button type="submit" disabled class="btn btn-success font-size-12">In the Cart</button>';
                                }else{
                                    echo '<button type="submit" name="top_sale_submit" class="btn btn-warning font-size-12">Add to Cart</button>';
                                }
                        ?>

                        
                        </form>
                      </div>
                    </div>
                  </div> 
                                   
                <?php } ?>
              <!-- !owl carousel -->
            </div>
          </section>
        <!-- !Top Sale -->


        <!-- Special Price -->
<?php
  $brand = array_map(function ($pro){ return $pro['item_brand']; }, $product_shuffle);
  $unique = array_unique($brand);
  sort($unique);
  shuffle($product_shuffle);

  // request method post
  if($_SERVER['REQUEST_METHOD'] == "POST"){
    if (isset($_POST['special_price_submit'])){
        // call method addToCart
        $Cart->addToCart($_POST['user_id'], $_POST['item_id']);
    }
}
  $in_cart =  $Cart->getCartId($product->getData('cart'));
  
  ?>
<section id="special-price">
            <div class="container">
              <h4 class="font-rubik font-size-20">Special Price</h4>
              <div id="filters" class="button-group text-right font-baloo font-size-16">
                <button class="btn is-checked" data-filter="*">All Brand</button>
                <?php
                array_map(function($brand){
                  printf('<button class="btn" data-filter=".%s">%s</button>', $brand, $brand);
                  }, $unique);

                ?>

              </div>

              <div class="grid">
              <?php array_map(function ($item) use($in_cart) { ?>
                <div class="grid-item border <?php echo $item['item_brand'] ?? "Brand" ; ?>">
                 <div class="item py-2" style="width: 200px;">
                  <div class="product font-rale">
                    <a href="<?php printf('%s?item_id=%s', 'product.php',  $item['item_id']); ?>"><img src="<?php echo $item['item_image'] ?? "assets/products/13.png"; ?>" alt="product1" class="img-fluid"></a>
                    <div class="text-center">
                      <h6><?php echo $item['item_name'] ?? "unknown"; ?></h6>
                      <div class="rating text-warning font-size-12">
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="far fa-star"></i></span>
                      </div>
                      <div class="price py-2">
                        <span>$<?php echo $item['item_price'] ?? "0"; ?></span>
                      </div>
                        <form method="post">
                        <input type="hidden" name="item_id"value="<?php echo $item['item_id'] ?? "1"; ?>">
                        <input type="hidden" name="user_id"value="<?php echo 1; ?>">
                        <?php
                                if (in_array($item['item_id'], $in_cart ?? [])){
                                    echo '<button type="submit" disabled class="btn btn-success font-size-12">In the Cart</button>';
                                }else{
                                    echo '<button type="submit" name="top_sale_submit" class="btn btn-warning font-size-12">Add to Cart</button>';
                                }
                        ?>

                        </form>
                    </div>
                  </div>
                </div>
                </div>
                
          
                <?php }, $product_shuffle) ?>
              </div>
            </div>
          </section>
        <!-- !Special Price -->


        <!-- Banner Ads  -->
        <section id="banner_adds">
            <div class="container py-5 text-center">
              <img src="assets/banner1-cr-500x150.jpg" alt="banner1" class="img-fluid">
              <img src="assets/banner2-cr-500x150.jpg" alt="banner1" class="img-fluid">
            </div>
          </section>
<!-- !Banner Ads  -->

        <!-- New Phones -->
<?php
shuffle($product_shuffle);

// request method post
if($_SERVER['REQUEST_METHOD'] == "POST"){
    if (isset($_POST['new_phones_submit'])){
        // call method addToCart
        $Cart->addToCart($_POST['user_id'], $_POST['item_id']);
    }
}
?>
<section id="new-phones">
    <div class="container">
        <h4 class="font-rubik font-size-20">New Phones</h4>
        <hr>

        <!-- owl carousel -->
        <div class="owl-carousel owl-theme">
            <?php foreach ($product_shuffle as $item) { ?>
                <div class="item py-2 bg-light">
                    <div class="product font-rale">
                        <a href="<?php printf('%s?item_id=%s', 'product.php',  $item['item_id']); ?>"><img src="<?php echo $item['item_image'] ?? "assets/products/1.png"; ?>" alt="product1" class="img-fluid"></a>
                        <div class="text-center">
                            <h6><?php echo  $item['item_name'] ?? "Unknown";  ?></h6>
                            <div class="rating text-warning font-size-12">
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="far fa-star"></i></span>
                            </div>
                            <div class="price py-2">
                                <span>$<?php echo $item['item_price'] ?? '0' ; ?></span>
                            </div>
                            <form method="post">
                                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '1'; ?>">
                                <input type="hidden" name="user_id" value="<?php echo 1; ?>">
                                <?php
                                if (in_array($item['item_id'], $Cart->getCartId($product->getData('cart')) ?? [])){
                                    echo '<button type="submit" disabled class="btn btn-success font-size-12">In the Cart</button>';
                                }else{
                                    echo '<button type="submit" name="top_sale_submit" class="btn btn-warning font-size-12">Add to Cart</button>';
                                }
                                ?>
                            </form>
                        </div>
                    </div>
                </div>
            <?php } // closing foreach function ?>
        </div>
        <!-- !owl carousel -->

    </div>
</section>
<!-- !New Phones -->

        <!-- Blogs -->
<section id="blogs">
            <div class="container py-4">
              <h4 class="font-rubik font-size-20">Latest Blogs</h4>
              <hr>

              <div class="owl-carousel owl-theme">
                <div class="item">
                  <div class="card border-0 font-rale mr-5" style="width: 18rem;">
                    <h5 class="card-title font-size-16">Upcoming Mobiles</h5>
                    <img src="assets/blog/blog1.jpg" alt="cart image" class="card-img-top">
                    <p class="card-text font-size-14 text-black-50 py-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis non iste sequi cupiditate tempora iure. Velit accusamus saepe harum sed.</p>
                    <a href="#" class="color-second text-left">Go somewhere</a>
                  </div>
                </div>
                <div class="item">
                  <div class="card border-0 font-rale mr-5" style="width: 18rem;">
                    <h5 class="card-title font-size-16">Upcoming Mobiles</h5>
                    <img src="assets/blog/blog2.jpg" alt="cart image" class="card-img-top">
                    <p class="card-text font-size-14 text-black-50 py-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis non iste sequi cupiditate tempora iure. Velit accusamus saepe harum sed.</p>
                    <a href="#" class="color-second text-left">Go somewhere</a>
                  </div>
                </div>
                <div class="item">
                  <div class="card border-0 font-rale mr-5" style="width: 18rem;">
                    <h5 class="card-title font-size-16">Upcoming Mobiles</h5>
                    <img src="assets/blog/blog3.jpg" alt="cart image" class="card-img-top">
                    <p class="card-text font-size-14 text-black-50 py-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis non iste sequi cupiditate tempora iure. Velit accusamus saepe harum sed.</p>
                    <a href="#" class="color-second text-left">Go somewhere</a>
                  </div>
                </div>
              </div>
            </div>
          </section>
        <!-- !Blogs -->

        
</main>
<!--Main-->
<!--Footer-->
<footer id="footer" class="bg-dark text-white py-5">
        <div class="container">
          <div class="row">
            <div class="col-lg-3 col-12">
              <h4 class="font-rubik font-size-20">Commerce</h4>
              <p class="font-size-14 font-rale text-white-50">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Repellendus, deserunt.</p>
            </div>
            <div class="col-lg-4 col-12">
              <h4 class="font-rubik font-size-20">Newsletter</h4>
              <form class="form-row">
                <div class="col">
                  <input type="text" class="form-control" placeholder="Email *">
                </div>
                <div class="col">
                  <button type="submit" class="btn btn-primary mb-2">Subscribe</button>
                </div>
              </form>
            </div>
            <div class="col-lg-2 col-12">
              <h4 class="font-rubik font-size-20">Information</h4>
              <div class="d-flex flex-column flex-wrap">
                <a href="#" class="font-rale font-size-14 text-white-50 pb-1">About Us</a>
                <a href="#" class="font-rale font-size-14 text-white-50 pb-1">Delivery Information</a>
                <a href="#" class="font-rale font-size-14 text-white-50 pb-1">Privacy Policy</a>
                <a href="#" class="font-rale font-size-14 text-white-50 pb-1">Terms & Conditions</a>
              </div>
            </div>
            <div class="col-lg-2 col-12">
              <h4 class="font-rubik font-size-20">Account</h4>
              <div class="d-flex flex-column flex-wrap">
                <a href="#" class="font-rale font-size-14 text-white-50 pb-1">My Account</a>
                <a href="#" class="font-rale font-size-14 text-white-50 pb-1">Order History</a>
                <a href="#" class="font-rale font-size-14 text-white-50 pb-1">Wish List</a>
                <a href="#" class="font-rale font-size-14 text-white-50 pb-1">Newslatters</a>
              </div>
            </div>
          </div>
        </div>
      </footer>
      <div class="copyright text-center bg-dark text-white py-2">
        <p class="font-rale font-size-14">&copy; Copyrights 2021.Vera Ikhalo</p>
      </div>
    <!--Footer-->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <!-- Owl Carousel Js file -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha256-pTxD+DSzIwmwhOqTFN+DB+nHjO4iAsbgfyFq5K5bcE0=" crossorigin="anonymous"></script>

    <!--  isotope plugin cdn  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js" integrity="sha256-CBrpuqrMhXwcLLUd5tvQ4euBHCdh7wGlDfNz8vbu/iI=" crossorigin="anonymous"></script>

    <!-- Custom Javascript -->
    <script src="main.js"></script>
</body>
</html>


    