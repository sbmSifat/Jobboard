
<?php
    session_start();

    $sessid = $_SESSION["Cemail"];
    //echo $sessid;

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


    if(isset($_POST['saveJobBut'])){
        //trim($_POST['tekst']);
        $jobTitle= $_POST["job-title"];
        $jobType= $_POST["job-type"];
        $salary= $_POST["salary"];
        $jobLocation= $_POST["job-region"];
        $overtime= $_POST["overtime"];
        $skills= $_POST["skills"];
        $email= $_POST["emailTo"];
        $company= $_POST["company-name"];
        $website= $_POST["company-website"];
        $context= $_POST["jobContext"];
        $responsibility= $_POST["jobResp"];
        $benefit= $_POST["benefit"];
        $deadline= $_POST["deadline"];

        //echo "I am trying ".$SnameVar." ".$SEmailVar." ".$SPassVar." ".$SPassVarCheck;
        echo "Found job ".$jobTitle." ".$jobType." ".$salary." ".$jobLocation." ".$overtime." ".$skills." ".$email." ".$company." ".$website." ".$deadline;


        $sqlPostJob = "INSERT INTO jobs (JobTitle,JobType,Salary,JobLocation,Overtime,Skills,Email,Company,Website,Context,Responsibility,Benefit,Deadline)
            VALUES ('$jobTitle','$jobType','$salary','$jobLocation','$overtime','$skills','$email','$company','$website','$context','$responsibility','$benefit','$deadline')";
        $result = $con->query($sqlPostJob);

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
              <li><a href="index.html" >Home</a></li>
              <li><a href="about.html">About</a></li>
              <li class="has-children">
                <a href="job-listings.html" class="active">Job Listings</a>
                <ul class="dropdown">
                  <li><a href="job-single.html">Job Single</a></li>
                  <li><a href="post-job.html" class="active">Post a Job</a></li>
                </ul>
              </li>
              <li class="has-children">
                <a href="services.html">Pages</a>
                <ul class="dropdown">
                  <li><a href="services.html">Services</a></li>
                  <li><a href="service-single.html">Service Single</a></li>
                  <li><a href="blog-single.html">Blog Single</a></li>
                  <li><a href="portfolio.html">Portfolio</a></li>
                  <li><a href="portfolio-single.html">Portfolio Single</a></li>
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
              <a href="Company_Home.php" class="btn btn-primary border-width-2 d-none d-lg-inline-block"><span class="mr-2 icon-lock_outline"></span>Home</a>
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
            <h1 class="text-white font-weight-bold">Post A Job</h1>
            <div class="custom-breadcrumbs">
              <a href="#">Home</a> <span class="mx-2 slash">/</span>
              <a href="#">Job</a> <span class="mx-2 slash">/</span>
              <span class="text-white"><strong>Post a Job</strong></span>
            </div>
          </div>
        </div>
      </div>
    </section>


    <!--------------------------Post a job Details------------------------------>

    <section class="site-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-lg-12">
            <form action="post-CompanyJob.php" class="p-4 p-md-5 border rounded" method="post">
              <h3 class="text-black mb-5 border-bottom pb-2">Job Details</h3>



              <div class="form-group">
                <label for="job-title">Job Title</label>
                <input type="text" class="form-control" id="job-title" name="job-title" placeholder="Product Designer">
              </div>

              <div class="form-group">
                  <label for="job-type">Job Type</label>
                  <select class="selectpicker border rounded" id="job-type" name="job-type" data-style="btn-black" data-width="100%" data-live-search="true" title="Select Job Type">
                      <option>Web Developer</option>
                      <option>Mobile Web Developer</option>
                      <option>Quality Assurance</option>
                      <option>Quality Control</option>
                      <option>HR</option>
                  </select>
              </div>



                <div class="form-group">
                    <label for="salary">Salary</label>
                    <select class="selectpicker border rounded" id="salary"  name="salary" data-style="btn-black" data-width="100%" data-live-search="true" title="Salary Amount">
                        <option>Negotiable</option>
                        <option>below 10k</option>
                        <option>10k-20k</option>
                        <option>20k-30k</option>
                        <option>30-40k</option>
                        <option>40-50k</option>
                        <option>50k-60k</option>
                        <option>60k+</option>
                    </select>
                </div>

              <div class="form-group">
                <label for="job-region">Job Location</label>
                <select class="selectpicker border rounded" id="job-region" name="job-region" data-style="btn-black" data-width="100%" data-live-search="true" title="Select Region">
                      <option>Anywhere</option>
                      <option>Gulshan 1</option>
                      <option>Gulshan 2</option>
                      <option>Uttara</option>
                      <option>Mirpur</option>
                      <option>Farmgate</option>
                      <option>Dhanmondi</option>
                      <option>Savar</option>
                    </select>
              </div>

              <div class="form-group">
                  <label for="overtime">Overtime</label>
                  <select class="selectpicker border rounded" id="overtime" name="overtime" data-style="btn-black" data-width="100%">
                      <option>Yes</option>
                      <option>No</option>
                  </select>

              </div>
                <!--
              <div class="form-group">
                <label for="job-description">Skill Required</label>
                <div class="editor" id="editor-1" name="editor-1" title="Javascript node.js etc..">

                </div>
              </div>
                -->
                <div class="form-group">
                    <label for="skills">Skills needed</label>
                    <textarea id="skills" name="skills" placeholder="javascript" style="display: block" rows="5" cols="124"> </textarea>
                </div>


              <h3 class="text-black my-5 border-bottom pb-2">Additional Informations</h3>

                <div class="form-group">
                    <label for="jobContext">Job Context</label>
                    <textarea id="jobContext" name="jobContext" placeholder="Put job context" style="display: block" rows="5" cols="124"> </textarea>
                </div>

                <div class="form-group">
                    <label for="jobResp">Job Responsibilities</label>
                    <textarea id="jobResp" name="jobResp" placeholder="Put job responsibilities" style="display: block" rows="5" cols="124"> </textarea>
                </div>

                <div class="form-group">
                    <label for="benefit">Compensation & Other Benefits</label>
                    <textarea id="benefit" name="benefit" placeholder="Put your jobs Compensations & Other Benefits" style="display: block" rows="5" cols="124"> </textarea>
                </div>
                <label for="deadline" style="display: block">Deadline</label>
                <input type="date" id="deadline" name="deadline">
<!--                <input type="submit" value="Submit">-->

              <h3 class="text-black my-5 border-bottom pb-2">Company Details</h3>
              <div class="form-group">
                  <label for="emailTo">Email</label>
                  <input type="text" class="form-control" id="emailTo" name="emailTo" placeholder="staff@companydomain.com">
              </div>

              <div class="form-group">
                <label for="company-name">Company Name</label>
                <input type="text" class="form-control" id="company-name" name="company-name" placeholder="e.g. A.R.T">
              </div>



              
              <div class="form-group">
                <label for="company-website">Website (Optional)</label>
                <input type="text" class="form-control" id="company-website" name="company-website" placeholder="https://">
              </div>

<!--              <div class="form-group">-->
<!--                <label for="company-website-tw d-block">Upload Logo</label> <br>-->
<!--                <label class="btn btn-primary btn-md btn-file">-->
<!--                  Browse File<input type="file" hidden>-->
<!--                </label>-->
<!--              </div>-->

                <div class="col-6" style="padding-left: 0px">
                    <button  id="saveJobBut" name="saveJobBut" class="btn btn-block btn-primary btn-md" >Save Job</button>
                </div>

            </form>
          </div>

         
        </div>
        <div class="row align-items-center mb-5">
          
          <div class="col-lg-4 ml-auto">
            <div class="row" style="float: right;padding-right: 14px">
<!--              <div class="col-6">-->
<!--                <a href="#" class="btn btn-block btn-light btn-md"><span class="icon-open_in_new mr-2"></span>Preview</a>-->
<!--              </div>-->

                <form method="post" >
                    <button class="btn btn-block btn-primary btn-md" name="LOutBut" id="LOutBut" >Log Out</button>
                </form>
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
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with by <a href="https://Sifat.com" target="_blank" >Sifat</a>
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
   
   
     
  </body>
</html>