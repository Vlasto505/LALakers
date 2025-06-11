<?php

session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<?php
include('partials/header.php')
?>
<body>
<!-- PRE LOADER -->
     <div class="preloader">
          <div class="spinner">
               <span class="sk-inner-circle"></span>
          </div>
     </div>


<!-- MENU -->
<div class="navbar custom-navbar navbar-fixed-top" role="navigation">
     <div class="container">

          <!-- NAVBAR HEADER -->
          <div class="navbar-header">
               <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon icon-bar"></span>
                    <span class="icon icon-bar"></span>
                    <span class="icon icon-bar"></span>
               </button>
               <!-- lOGO -->
               <a href="index.php" class="navbar-brand">Los Angeles Lakers</a>
          </div>

          <!-- MENU LINKS -->
          <div class="collapse navbar-collapse">
               <ul class="nav navbar-nav navbar-right">
                    <li><a href="#home" class="smoothScroll">Home</a></li>
                    <li><a href="#about" class="smoothScroll">Achievements</a></li>
                    <li><a href="#team" class="smoothScroll">Players</a></li>  
                    <li><a href="CRUD/admin.php" class="smoothScroll">Contact</a></li>
                    <?php if (isset($_SESSION['user_id'])): ?>
                    <li><a href="Login/logout.php">Logout</a></li>
                    <li><a href="#">Welcome, <?= htmlspecialchars($_SESSION['username']) ?></a></li>
                    <?php else: ?>
                    <li><a href="Login/login.php">Login</a></li>
                    <?php endif; ?>
                    
               </ul>
          </div>

     </div>
</div>


<!-- HOME -->
<section id="home" class="parallax-section">
     <div class="overlay"></div>
     <div class="container">
          <div class="row">

               <div class="col-md-8 col-sm-12">
                    <div class="home-text">
                         <h1>Welcome to our website!</h1>
                         <p>Home of Los Angeles Lakers</p>
                         <ul class="section-btn">
                              <a href="#about" class="smoothScroll"><span data-hover="Discover More">Discover More</span></a>
                         </ul>
                    </div>
               </div>

          </div>
     </div>

     <!-- Video -->
     <video controls="" autoplay="" loop="" muted>
          <source src="videos/video1.mp4" type="video/mp4">
          Your browser does not support the video tag.
     </video>
     
</section>


<!-- ABOUT -->
<section id="about" class="parallax-section">
     <div class="container">
          <div class="row">

               <div class="col-md-offset-1 col-md-10 col-sm-12">
                    <div class="about-info">
                         <h3>Achievements</h3>
                         <h1>One of the biggest clubs in history of NBA.</h1>
                    </div>
               </div>

          </div>
     </div>
</section>


<!-- PROJECT -->
<section id="project" class="parallax-section">
     <div class="container">
          <div class="row">

               <div class="col-md-6 col-sm-6">
                    <!-- PROJECT ITEM -->
                    <div class="project-item">
                         <a href="images/playoff3.jpg" class="image-popup">
                              <img src="images/playoff3.jpg" class="img-responsive" alt="">
                         
                              <div class="project-overlay">
                                   <div class="project-info">
                                        <h1>League championships</h1>
                                        <h3>National Basketball Association (17): 1949, 1950, 1952, 1953, 1954, 1972, 1980, 1982, 1985, 1987, 1988, 2000, 2001, 2002, 2009, 2010, 2020 <br>National Basketball League (1): 1948</h3>
                                   </div>
                              </div>
                         </a>
                    </div>
               </div>

               <div class="col-md-6 col-sm-6">
                    <!-- PROJECT ITEM -->
                    <div class="project-item">
                         <a href="images/playoff2.jpg" class="image-popup">
                              <img src="images/playoff2.jpg" class="img-responsive" alt="">
                         
                              <div class="project-overlay">
                                   <div class="project-info">
                                        <h1>NBA playoff records</h1>
                                        <h3>Most NBA Finals appearances – 32 times <br>Best postseason record – 15–1 (2001) <br>Most Playoff Games Won – 421</h3>
                                   </div>
                              </div>
                         </a>
                    </div>
               </div>

               <div class="col-md-6 col-sm-6">
                    <!-- PROJECT ITEM -->
                    <div class="project-item">
                         <a href="images/playoff1.jpg" class="image-popup">
                              <img src="images/playoff1.jpg" class="img-responsive" alt="">
                         
                              <div class="project-overlay">
                                   <div class="project-info">
                                        <h1>Records in a singular game(regular season)</h1>
                                        <h3>Most points scored in a game – 162<br>Most points scored in a half – 91<br>Most points scored in a quarter – 51</h3>
                                   </div>
                              </div>
                         </a>
                    </div>
               </div>

               <div class="col-md-6 col-sm-6">
                    <!-- PROJECT ITEM -->
                    <div class="project-item">
                         <a href="images/playoff4.jpg" class="image-popup">
                              <img src="images/playoff5.jpg" class="img-responsive" alt="">
                         
                              <div class="project-overlay">
                                   <div class="project-info">
                                        <h1>Records in a singular game(playoffs)</h1>
                                        <h3>Most points scored – 153<br>Largest comeback - 29 points vs the Seattle SuperSonics<br>Most rebounds – 81</h3>
                                   </div>
                              </div>
                         </a>
                    </div>
               </div>               

          </div>
     </div>
</section>


<!-- TEAM -->
<!-- TEAM -->
<section id="team" class="parallax-section">
     <div class="container">
          <div class="row">

               <div class="col-md-offset-2 col-md-8 col-sm-12">
                    <!-- SECTION TITLE -->
                    <div class="section-title">
                         <h1>All time players</h1>
                    </div>
               </div>

               <div class="clearfix"></div>

               <div id="owl-team" class="owl-carousel">
                    <div class="col-md-4 col-sm-4 item">
                         <div class="team-item">
                              <img src="images/lebron.jpg" class="img-responsive" alt="">
                              <div class="team-overlay">
                                   <ul class="social-icon">
                                        <li><a href="#" class="fa fa-twitter"></a></li>
                                        <li><a href="#" class="fa fa-facebook"></a></li>
                                   </ul>
                              </div>
                         </div>
                         <p>2019-20 champion, 2019–20 Finals MVP</p>
                         <h3>Lebron James</h3>
                    </div>

                    <div class="col-md-4 col-sm-4 item">
                         <div class="team-item">
                              <img src="images/wilt1.jpg" class="img-responsive" alt="">
                              <div class="team-overlay">
                                   <ul class="social-icon">
                                        <!-- No socials -->
                                   </ul>
                              </div>
                         </div>
                         <p>5 championships, Hall of Fame class of 1959</p>
                         <h3>Wilt Chamberlain</h3>
                    </div>

                    <div class="col-md-4 col-sm-4 item">
                         <div class="team-item">
                              <img src="images/james.jpg" class="img-responsive" alt="">
                              <div class="team-overlay">
                                   <ul class="social-icon">
                                        <li><a href="#" class="fa fa-linkedin"></a></li>
                                        
                                   </ul>
                              </div>
                         </div>
                         <p>3 championships, 1987-88 Finals MVP, Hall of Fame class of 2003</p>
                         <h3>James Worthy</h3>
                    </div>

                    <div class="col-md-4 col-sm-4 item">
                         <div class="team-item">
                              <img src="images/elgin.jpg" class="img-responsive" alt="">
                              <div class="team-overlay">
                                   <ul class="social-icon">
                                        <li><a href="#" class="fa fa-twitter"></a></li>
                                        <li><a href="#" class="fa fa-linkedin"></a></li>
                                        
                                   </ul>
                              </div>
                         </div>
                         <p>11-time All-Star, 1958-59 Rookie of the Year, Hall of Fame class of 1977</p>
                         <h3>Elgin Baylor</h3>
                    </div>

                    <div class="col-md-4 col-sm-4 item">
                         <div class="team-item">
                              <img src="images/jerry.jpg" class="img-responsive" alt="">
                              <div class="team-overlay">
                                   <ul class="social-icon">
                                        <li><a href="#" class="fa fa-linkedin"></a></li>
                                   </ul>
                              </div>
                         </div>
                         <p>1971-72 Champion, 1968-69 Finals MVP, Hall of Fame class of 1980</p>
                         <h3>Jerry West</h3>
                    </div>

                    <div class="col-md-4 col-sm-4 item">
                         <div class="team-item">
                              <img src="images/shaq.jpg" class="img-responsive" alt="">
                              <div class="team-overlay">
                                   <ul class="social-icon">
                                        <li><a href="#" class="fa fa-twitter"></a></li>
                                        <li><a href="#" class="fa fa-facebook"></a></li>
                                   </ul>
                              </div>
                         </div>
                         <p>3 Championships, 3 Finals MVPs, 1999-00 MVP, Hall of Fame class of 2016</p>
                         <h3>Shaquille O'Neal</h3>
                    </div>

                    <div class="col-md-4 col-sm-4 item">
                         <div class="team-item">
                              <img src="images/kareem.jpg" class="img-responsive" alt="">
                              <div class="team-overlay">
                                   <ul class="social-icon">
                                        <li><a href="#" class="fa fa-twitter"></a></li>
                                   </ul>
                              </div>
                         </div>
                         <p>5 championships, 1984-85 Finals MVP, 3 MVPs, Hall of Fame class of 1995</p>
                         <h3>Kareem Abdul-Jabbar</h3>
                    </div>

                    <div class="col-md-4 col-sm-4 item">
                         <div class="team-item">
                              <img src="images/kobe.jpg" class="img-responsive" alt="">
                              <div class="team-overlay">
                                   <ul class="social-icon">
                                        <li><a href="#" class="fa fa-twitter"></a></li>
                                        <li><a href="#" class="fa fa-linkedin"></a></li>
                                        <li><a href="#" class="fa fa-facebook"></a></li>
                                   </ul>
                              </div>
                         </div>
                         <p>5 championships, 2 Finals MVPs, 2007-08 MVP, Hall of Fame class of 2020</p>
                         <h3>Kobe Bryant</h3>
                    </div>

                    <div class="col-md-4 col-sm-4 item">
                         <div class="team-item">
                              <img src="images/magic.jpg" class="img-responsive" alt="">
                              <div class="team-overlay">
                                   <ul class="social-icon">
                                        <li><a href="#" class="fa fa-twitter"></a></li>
                                        <li><a href="#" class="fa fa-linkedin"></a></li>
                                   </ul>
                              </div>
                         </div>
                         <p>5 championships, 3 Finals MVPs, 3 MVPs, Hall of Fame class of 2002</p>
                         <h3>Magic Johnson</h3>
                    </div>
               </div>

          </div>
     </div>
     <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
    <a href="Players/admin_player.php" class="btn btn-success mt-3 mb-3">Add new star player</a>
     <?php endif; ?>

     
</section>





<?php
include('partials/footer.php')
?>

<!-- SCRIPTS -->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.parallax.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/magnific-popup-options.js"></script>
<script src="js/modernizr.custom.js"></script>
<script src="js/smoothscroll.js"></script>
<script src="js/custom.js"></script>

</body>
</html>

