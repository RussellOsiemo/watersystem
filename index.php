<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online water dispensing</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <script scr="js/script.js"></script>
    <!--font awesome -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">
    <!--bootsrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>
<header class="header">

    <div class="header-1">

        <a href="#" class="logo"> <i class="fas fa-water"></i> water Dispensing </a>

        <form action="" class="search-form">
            <input type="search" name="" placeholder="search here..." id="search-box">
            <label for="search-box" class="fas fa-search"></label>
        </form>

        <div class="icons">
            <div id="search-btn" class="fas fa-search"></div>
            <a href="#" class="fas fa-heart"></a>
            
            <a href="mycart.php" class="fas fa-shopping-cart">
                <?php
                //get the sum of the quantity of all items in the cart
                $cartarray = file_get_contents("cart.json");
                $cartarray = json_decode($cartarray, true);
                $count = 0;
                foreach($cartarray as $item)
                {
                    $count += $item['quantity'];
                }   
                //if the cart.json is empty display 0
                if ($count == 0) {
                    echo "<span id='cart-item' class='badge rounded-pill bg-danger'>0</span>";
                } else {
                    echo "<span id='cart-item' class='badge rounded-pill bg-danger'>$count</span>";
                }
                ?>
            </a>
            <a href="login.html" class="fas fa-user"></a>
        </div>

    </div>

    <div class="header-2">
        <div id="menu-bar" class="fas fa-bars"></div>
        <nav class="navbar">
            <a href="#home">Home</a>
            <a href="#products">Products</a>
            <a href="#deal">About us</a>
            <a href="#contact">Contact</a>
        </nav>
    </div>

</header>

<!-- bottom navbar  -->

<nav class="bottom-navbar">
    <a href="#top" class="fas fa-home"></a>
    <a href="#products" class="fas fa-list"></a>
    <a href="#deal" class="fas fa-tags"></a>
    <a href="#contact" class="fas fa-phone"></a>
</nav>
    
<section class="home" id="home">

    <div class="row">

        <div class="content">
            <h3>upto 75% off</h3>
            <p>Welcome to our online water dispensing services where we provide efficient water service to our esteemed customers</p>
            <a href="#products" class="btn">Explore</a>
        </div>

        <div class="swiper image-slider">
            <div class="swiper-wrapper">
                <a href="#" class="swiper-slide"><img src="img/water2.png" alt=""></a>
            </div>
        </div>

    </div>
</section>

<section class="icons-container">

    <div class="icons">
        <i class="fas fa-shipping-fast"></i>
        <div class="content">
            <h3>free delivery</h3>
            <p>order now</p>
        </div>
    </div>

    <div class="icons">
        <i class="fas fa-lock"></i>
        <div class="content">
            <h3>secure payment</h3>
            <p>100% secure payment</p>
        </div>
    </div>
    <div class="icons">
        <i class="fas fa-redo-alt"></i>
        <div class="content">
            <h3>easy returns</h3>
            <p>Quality returns</p>
        </div>
    </div>
    <div class="icons">
        <i class="fas fa-headset"></i>
        <div class="content">
            <h3>24/7 support</h3>
            <p>call us anytime</p>
        </div>
    </div>
</section>
    
<section class="products" id="products">

    <h1 class="heading"> <span>Products</span> </h1>
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6 my-3 my-md-0">
                <form action="manage_cart.php" method="get">
                    <div class="card-shadow">
                    <div>
                    <img src="img/bottle5.jpg" alt="image1" class="img-fluid card-img-top">
                    </div>
                <div class="card-body">
                    <h5 class="card-title">product1</h5>
                    <h6>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </h6>
                    <h5>
                        <span class="price">ksh 500</span>
                    </h5>
                    <button type="submit" class="btn btn-warning my-2"name="add">Add to cart<i class="fas fa-shopping-cart"></i></button>
                    <input type="hidden" name="item_name" value="product1">
                    <input type="hidden" name="price" value="500">
                </div>
            </div>
        </form>
        </div>
        <div class="col-md-3 col-sm-6 my-3 my-md-0">
            <form action="manage_cart.php" method="get">
            <div class="card-shadow">
                <div>
                    <img src="img/bottle5.jpg" alt="image1" class="img-fluid card-img-top">
                </div>
                <div class="card-body">
                    <h5 class="card-title">product2</h5>
                    <h6>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                    </h6>
                    <h5>
                        <span class="price">ksh 600</span>
                    </h5>
                    <button type="submit" class="btn btn-warning my-2"name="add">Add to cart<i class="fas fa-shopping-cart"></i></button>
                    <input type="hidden" name="item_name" value="product2">
                    <input type="hidden" name="price" value="600">
                </div>
            </div>
        </form>
        </div>
        <div class="col-md-3 col-sm-6 my-3 my-md-0">
        <form action="manage_cart.php" method="get">
            <div class="card-shadow">
                <div>
                    <img src="img/bottle5.jpg" alt="image1" class="img-fluid card-img-top">
                </div>
                <div class="card-body">
                    <h5 class="card-title">product3</h5>
                    <h6>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </h6>
                    <h5>
                        <span class="price">ksh 550</span>
                    </h5>
                    <button type="submit" class="btn btn-warning my-2"name="add">Add to cart<i class="fas fa-shopping-cart"></i></button>
                    <input type="hidden" name="item_name" value="product3">
                    <input type="hidden" name="price" value="550">
                </div>
            </div>
        </form>
        </div>
        <div class="col-md-3 col-sm-6 my-3 my-md-0">
        <form action="manage_cart.php" method="get">
            <div class="card-shadow">
                <div>
                    <img src="img/bottle5.jpg" alt="image1" class="img-fluid card-img-top">
                </div>
                <div class="card-body">
                    <h5 class="card-title">product4</h5>
                    <h6>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </h6>
                    <h5>
                        <span class="price">ksh 480</span>
                    </h5>
                    <button type="submit" class="btn btn-warning my-2"name="add">Add to cart<i class="fas fa-shopping-cart"></i></button>
                    <input type="hidden" name="item_name" value="product4">
                    <input type="hidden" name="price" value="480">
                </div>
            </div>
        </form>
        </div>
    </div>
    </div>
</section>
    
<h1 class="heading"> <span>About Us</span></h1>
    
<section class="deal" id="deal">
    
    <div class="content">
        <h3 class="title">Welcome All</h3>
        <p>We provide online water dispensing services to our customers where by one is able to order and the delivery is made.
        Dont be left out on our latest offer!!!</p>

        <a href="#products" class="btn">Shop Now</a>
    </div>
</section>
    
    
<section class="contact" id="contact">
    <h1 class="heading"> <span>Contact Us</span></h1>
    
    <div class="row">
        <form action="https://formspree.io/f/mbjwlnvy" method="get" id="my-form">
            <h3>Get In Touch With Us</h3>
            <input type="text" placeholder="Name" class="box" name="Name">
            <input type="email" placeholder="Email" class="box" name="Email">
            <input type="number" placeholder="Phone Number" class="box" name="Phone number">
            <textarea placeholder="Message" class="box" cols="30" rows="10" name="Message"></textarea>
            <input type="submit" value="send message" class="btn">
        </form>
    </div>
    <div id="status"></div>
</section>

<section class="news">
   <h3>Subscribe for our latest updates</h3>

   <form action="martmwash8@gmail.com">
       <input type="email"placeholder="enter your email address" class="box">
       <input type="submit" value="Subscribe" class="btn">
   </form> 
</section>

<section class="footer">
    <div class="box-container">
        <div class="box">
            <span class="logo"> <i class="fas fa-water"></i> water Dispensing </span>
            <p>The online water dispensing services where we provide 
            efficient water service to our esteemed customers</p>
            <div class="share">
                <a href="#" class="btn fab fa-facebook-f"></a>
                <a href="#" class="btn fab fa-twitter"></a>
                <a href="#" class="btn fab fa-instagram"></a>
                <a href="#" class="btn fab fa-linkedin"></a>
            </div> 
        </div>
        <div class="box">
            <h3>Quick links</h3>
            <div class="links">
                <a href="#top">home</a>
                <a href="#products">products</a>
                <a href="#deal">about us</a>
                <a href="#contact">contact</a>
            </div>
        </div>
        <div class="box">
            <h3>Reach us</h3>
            <div class="links">
                <b>Address:</b><i class="fa fa-map-marker" aria-hidden="true"></i> utawala, Embakasi east
                <b>Phone:</b><i class="fa fa-phone" aria-hidden="true"></i> +254 705296636
                <b>Email:</b><i class="fa fa-envelope-o" aria-hidden="true"></i> martomwash8@gmail.com
            </div>
        </div>
    </div>

    <h2 class="credit"> Created by Mwashigadi |All Rights Reserved</h2>
</section>
<script type="js/main.js"></script>
</body>
</html>
