
<?php
    session_start();

    $sessid = $_SESSION["Semail"];
    $sessname = $_SESSION["Sname"];
    //echo $sessid;
    //echo $sessname;

    if ($sessid=="" ) {

        session_unset();
        session_destroy();

        header("Location: index.html");

    }

    if (isset($_POST['LOutBut']))
    {
        session_unset();
        session_destroy();


        header("Location: index.html");

    }


    if (isset($_POST['CheckjobBut']))
    {
            session_start();
            $_SESSION["Semail"] = $sessid;
            $_SESSION["Sname"] = $sessname;
            $_SESSION["jobType"] = $_POST['jobType'];
            $_SESSION["jobLoc"] = $_POST['JobLocation'];
            $_SESSION["salary"] = $_POST['Salary'];
            $_SESSION["overtime"] = $_POST['Overtime'];
            $_SESSION["email"] = $_POST['Email'];
            $_SESSION["skills"] = $_POST['Skills'];

           header("location:FoundJobResult.php");

    }


//---------------connection establish------------>
    $DB_host = "localhost";
    $DB_user = "root";
    $DB_pass = "";
    $DB_name = "jobboard";

    try {
        $con = new PDO("mysql:host={$DB_host};dbname={$DB_name}",$DB_user,$DB_pass);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo " Connected successfully ";


    } catch (PDOException $e) {
        //print "Error!: " . $e->getMessage() . "<br/>";

        die();
    }
    //---------------connection establish finish------------>

    $stmt=$con->query("SELECT * FROM `cv` WHERE Email='$sessid' "); //running query





    if (isset($_POST["RemoveCV"])) {
        $SerialToRem = $_POST["serialToDel"];
        $EmailToRem = $_POST["emailToDel"];


        // sql to delete a record
        $sql = "DELETE FROM cv WHERE Serial='$SerialToRem' AND Email='$EmailToRem' ";

        // use exec() because no results are returned
        $con->exec($sql);
        header("Refresh:0");
    }


?>



<!doctype html>
<html lang="en">
  <head>
    <title>JobBoard &mdash; Website by Sifat</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    
    <link rel="stylesheet" href="css/custom-bs.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="css/bootstrap-select.min.css">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="fonts/line-icons/style.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/quill.snow.css">
    

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="css/style.css">    
  </head>
  <body id="top">

  <div id="overlayer"></div>
  <div class="loader">
    <div class="spinner-border text-primary" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </div>
    

<div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->
    

    <!-- NAVBAR -->
    <header class="site-navbar mt-3">
      <div class="container-fluid">
        <div class="row align-items-center">
          <div class="site-logo col-6"><a href="index.html">JobBoard</a></div>

          <nav class="mx-auto site-navigation">
            <ul class="site-menu js-clone-nav d-none d-xl-block ml-0 pl-0">
              <li><a href="index.html" class="nav-link">Home</a></li>
              <li><a href="about.html">About</a></li>
              <li class="has-children">
                <a href="job-listings.html">Job Listings</a>
                <ul class="dropdown">
                  <li><a href="job-single.html">Job Single</a></li>
                  <li><a href="post-job.html">Post a Job</a></li>
                </ul>
              </li>
              <li class="has-children">
                <a href="services.html">Pages</a>
                <ul class="dropdown">
                  <li><a href="services.html">Services</a></li>
                  <li><a href="service-single.html">Service Single</a></li>
                  <li><a href="blog-single.html">Blog Single</a></li>
                  <li><a href="portfolio.html">Portfolio</a></li>
                  <li><a href="portfolio-single.html" class="active">Portfolio Single</a></li>
                  <li><a href="testimonials.html">Testimonials</a></li>
                  <li><a href="faq.html">Frequently Ask Questions</a></li>
                  <li><a href="gallery.html">Gallery</a></li>
                </ul>
              </li>
              <li><a href="blog.html">Blog</a></li>
              <li><a href="contact.html">Contact</a></li>
              <li class="d-lg-none"><a href="post-job.html"><span class="mr-2">+</span> Post a Job</a></li>
              <li class="d-lg-none"><a href="login.html">Log In</a></li>
            </ul>
          </nav>
          
          <div class="right-cta-menu text-right d-flex aligin-items-center col-6">
            <div class="ml-auto">
<!--              <a href="post-job.html" class="btn btn-outline-white border-width-2 d-none d-lg-inline-block"><span class="mr-2 icon-add"></span>Post a Job</a>-->
<!--              <a href="login.html" class="btn btn-primary border-width-2 d-none d-lg-inline-block"><span class="mr-2 icon-lock_outline"></span>Log In</a>-->
            </div>
            <a href="#" class="site-menu-toggle js-menu-toggle d-inline-block d-xl-none mt-lg-2 ml-3"><span class="icon-menu h3 m-0 p-0 mt-2"></span></a>
          </div>

        </div>
      </div>
    </header>

    <!-- HOME -->
    <section class="section-hero overlay inner-page bg-image" style="background-image: url('images/home_sifat.jpg');" id="home-section">
      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <h1 class="text-white font-weight-bold">Student Home</h1>
            <div class="custom-breadcrumbs">
              <a href="index.html">Home</a> <span class="mx-2 slash">/</span>
              <span class="text-white"><strong>Student Home</strong></span>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="site-section pb-0 portfolio-single" id="next-section">

      <div class="container">
        
        <div class="row mb-5 mt-5">
            <!----------------images-------------------->
          <div class="col-lg-8" id="imageCol">
            <figure>
              <a href="images/sq_img_6.jpg" data-fancybox="gallery"><img src="images/sq_img_6.jpg" alt="Image" class="img-fluid"></a>
            </figure>
            <figure>
              <a href="images/sq_img_2.jpg" data-fancybox="gallery"><img src="images/sq_img_2.jpg" alt="Image" class="img-fluid"></a>
            </figure>
            <figure>
              <a href="images/sq_img_7.jpg" data-fancybox="gallery"><img src="images/sq_img_7.jpg" alt="Image" class="img-fluid"></a>
            </figure>
            <figure class="mb-0">
              <a href="images/sq_img_8.jpg" data-fancybox="gallery"><img src="images/sq_img_8.jpg" alt="Image" class="img-fluid"></a>
            </figure>
          </div>


            <div class="col-lg-8" id="CVS" style="display: none;width: 100px">

                <table class="container" style="margin:50px;float: right">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Job Type</th>
                        <th scope="col">Job Location</th>
                        <th scope="col">Salary</th>
                        <th scope="col">Overtime</th>
                        <!--<th scope="col">Email</th>-->


                    </tr>
                    </thead>
                    <tbody>

                    <?php
                    $count=1;
                    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){ ?>
                        <tr>
                            <th scope="row"><?php echo $count ?></th>
                            <td><?php echo $row["JobType"] ?></td>
                            <td><?php echo $row["JobLocation"] ?></td>
                            <td><?php echo $row["Salary"] ?></td>
                            <td><?php echo $row["Overtime"] ?></td>
                            <!--<td><?php echo $row["Email"] ?></td>-->
                            <!--<td><?php echo $row["Serial"] ?></td>-->



                            <td>
                                <form method="post" >
                                    <input type="hidden" name="jobType" value="<?php echo $row["JobType"] ?>">
                                    <input type="hidden" name="JobLocation" value="<?php echo $row["JobLocation"] ?>">
                                    <input type="hidden" name="Salary" value="<?php echo $row["Salary"] ?>">
                                    <input type="hidden" name="Overtime" value="<?php echo $row["Overtime"] ?>">
                                    <input type="hidden" name="Email" value="<?php echo $row["Email"] ?>">
                                    <input type="hidden" name="Skills" value="<?php echo $row["Skills"] ?>">

                                    <button type="submit" class="btn btn-sm btn-danger" name="CheckjobBut">Jobs</button>

                                    <input type="hidden" name="serialToDel" value="<?php echo $row["Serial"] ?>" >
                                    <input type="hidden" name="emailToDel" value="<?php echo $row["Email"] ?>" >

                                    <button type="submit" class="btn btn-sm btn-danger" name="RemoveCV">Remove</button>
                                </form>
                            </td>

                        </tr>
                        <?php $count++; } ?>
                    </tbody>

                </table>
            </div>

          <div class="col-lg-4 ml-auto h-100 jm-sticky-top">
           

            <div class="mb-4">
              <h3 class="mb-4 h4 border-bottom"><?php echo $sessname ?></h3>
              
              <p class="mb-0">Student Details</p>
              <p class="mb-0">Email- <?php echo $sessid ?></p>
            </div>

            <div class="row mb-4">

              <div class="col-sm-12 col-md-12 mb-4 col-lg-12">
                <strong class="d-block text-black">Client</strong>
                Google, Inc.
              </div>
              <div class="col-sm-12 col-md-12 mb-4 col-lg-12">
                <strong class="d-block text-black">Role</strong>
                Design, Front-End and Back-End (WordPress)
              </div>
              <div class="col-sm-12 col-md-12 mb-4 col-lg-12">
                <strong class="d-block text-black">Year Started</strong>
                2022
              </div>
              <div class="col-sm-12 col-md-12 mb-4 col-lg-12">
                <strong class="d-block text-black mb-3">Website URL</strong>
              </div>
                <form method="post" style="position: relative;left: 20px">
                    <a href="create_CV.php" class="btn btn-outline-primary border-width-2">Create a CV</a>
                </form>

                    <button class="btn btn-outline-primary border-width-2" id="findInternship" style="position: relative;left: 20px ;height: 40px">Find InterShip</button>

                <form method="post" style="position: relative;left: 20px">
                    <button class="btn btn-outline-primary border-width-2" name="LOutBut" id="LOutBut">Log Out</button>
                </form>
            </div>

            <div class="block__87154 mb-0">
                
                <blockquote>
                  <p>Good quality and services unbeatable. Highly recommended!</p>
                </blockquote>
                <div class="block__91147 d-flex align-items-center">
                  <figure class="mr-4"><img src="images/person_2.jpg" alt="Image" class="img-fluid"></figure>
                  <div>
                    <h3>Sifat Hoque</h3>
                    <span class="position">Web Designer</span>
                  </div>
                </div>
              </div>

          </div>
        </div>

        

        
      </div>
    </section>
    <section class=" py-3 site-section mb-5">
      <div class="container">
        <div class="row">
          <div class="col-md-4 text-center">
            <a href="#" class="btn btn-md btn-outline-primary border-width-2 d-block">Previous Project</a>
          </div>
          <div class="col-md-4 text-center">
            <a href="#" class="btn btn-md btn-primary border-width-2 d-block">All Projects</a>
          </div>
          <div class="col-md-4 text-center">
            <a href="create_CV.php" class="btn btn-md btn-outline-primary border-width-2 d-block">Next Project</a>
          </div>
        </div>
      </div>
    </section>


    <section class="site-section bg-light">
      <div class="container">
        <div class="row mb-5">
          <div class="col-12 text-center" data-aos="fade">
            <h2 class="section-title mb-3">Happy Candidates Says</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6">
            <div class="block__87154 bg-white rounded">
              <blockquote>
                <p>“I am really satisfied from all the staffs of this Site. They are really helped and cooperated with us.”</p>
              </blockquote>
              <div class="block__91147 d-flex align-items-center">
                <figure class="mr-4"><img src="images/person_1.jpg" alt="Image" class="img-fluid"></figure>
                <div>
                  <h3>Sara Hoque</h3>
                  <span class="position">Creative Director</span>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="block__87154 bg-white rounded">
              <blockquote>
                <p>“Good quality and services unbeatable. Highly recommended!”</p>
              </blockquote>
              <div class="block__91147 d-flex align-items-center">
                <figure class="mr-4"><img src="images/person_2.jpg" alt="Image" class="img-fluid"></figure>
                <div>
                  <h3>Sifat Hoque</h3>
                  <span class="position">Web Designer</span>
                </div>
              </div>
            </div>
          </div>


        </div>
      </div>
    </section>
    
    <footer class="site-footer">

      <a href="#top" class="smoothscroll scroll-top">
        <span class="icon-keyboard_arrow_up"></span>
      </a>

      <div class="container">
        <div class="row mb-5">
          <div class="col-6 col-md-3 mb-4 mb-md-0">
            <h3>Search Trending</h3>
            <ul class="list-unstyled">
              <li><a href="#">Web Design</a></li>
              <li><a href="#">Graphic Design</a></li>
              <li><a href="#">Web Developers</a></li>
              <li><a href="#">Python</a></li>
              <li><a href="#">HTML5</a></li>
              <li><a href="#">CSS3</a></li>
            </ul>
          </div>
          <div class="col-6 col-md-3 mb-4 mb-md-0">
            <h3>Company</h3>
            <ul class="list-unstyled">
              <li><a href="#">About Us</a></li>
              <li><a href="#">Career</a></li>
              <li><a href="#">Blog</a></li>
              <li><a href="#">Resources</a></li>
            </ul>
          </div>
          <div class="col-6 col-md-3 mb-4 mb-md-0">
            <h3>Support</h3>
            <ul class="list-unstyled">
              <li><a href="#">Support</a></li>
              <li><a href="#">Privacy</a></li>
              <li><a href="#">Terms of Service</a></li>
            </ul>
          </div>
          <div class="col-6 col-md-3 mb-4 mb-md-0">
            <h3>Contact Us</h3>
            <div class="footer-social">
              <a href="#"><span class="icon-facebook"></span></a>
              <a href="#"><span class="icon-twitter"></span></a>
              <a href="#"><span class="icon-instagram"></span></a>
              <a href="#"><span class="icon-linkedin"></span></a>
            </div>
          </div>
        </div>

        <div class="row text-center">
          <div class="col-12">
            <p class="copyright"><small>
              <!-- Link back to Sifat can't be removed. Template is licensed under CC BY 3.0. -->
             All rights reserved | Powered by Sifat</a>
            <!-- Link back to Sifat can't be removed. Template is licensed under CC BY 3.0. --></small></p>
          </div>
        </div>
      </div>
    </footer>
  
  </div>

    <!-- SCRIPTS -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="js/stickyfill.min.js"></script>
    <script src="js/jquery.fancybox.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/quill.min.js"></script>
    
    
    <script src="js/bootstrap-select.min.js"></script>
    
    <script src="js/custom.js"></script>
   
   
  <script>
      ImgCol=document.getElementById("imageCol");
      CVRows=document.getElementById("CVS");

      fibut=document.getElementById("findInternship");
      let showCvs=()=>{
          ImgCol.style.display="none";
          CVRows.style.display="Block";
      }
      fibut.onclick=showCvs;
  </script>

  </body>
</html>