<!DOCTYPE html>
<html lang="en">
    <?php
    session_start();
    include('admin/db_connect.php');
    ob_start();
        $query = $conn->query("SELECT * FROM system_settings limit 1")->fetch_array();
         foreach ($query as $key => $value) {
          if(!is_numeric($key))
            $_SESSION['system'][$key] = $value;
        }
    ob_end_flush();
    include('header.php');

	
    ?>

    <style>
    	header.masthead {
		  background: url(admin/assets/uploads/<?php echo $_SESSION['system']['cover_img'] ?>);
		  background-repeat: no-repeat;
		  background-size: cover;
		}
    
  #viewer_modal .btn-close {
    position: absolute;
    z-index: 999999;
    /*right: -4.5em;*/
    background: unset;
    color: white;
    border: unset;
    font-size: 27px;
    top: 0;
}
#viewer_modal .modal-dialog {
        width: 80%;
    max-width: unset;
    height: calc(90%);
    max-height: unset;
}
  #viewer_modal .modal-content {
       background: black;
    border: unset;
    height: calc(100%);
    display: flex;
    align-items: center;
    justify-content: center;
  }
  #viewer_modal img,#viewer_modal video{
    max-height: calc(100%);
    max-width: calc(100%);
  }
  body, footer {
    background: #fff !important;
}
 

a.jqte_tool_label.unselectable {
    height: auto !important;
    min-width: 4rem !important;
    padding:5px
}/*
a.jqte_tool_label.unselectable {
    height: 22px !important;
}*/
.footer {
    text-align: center;
    background-color: #1c2331;
    color: white;
    padding: 5px 0;
}

.links {
    background-color: #3366FF;
    padding: 50px 0;
}

.row {
    display: flex;
    flex-wrap: wrap;
    justify-content: flex-start;
}

.column {
    width: 25%;
    text-align: left;
    padding: 0 15px;
    margin-bottom: 30px;
}

.section-title {
    font-weight: bold;
    font-size: 1.2rem;
    text-transform: uppercase;
}

.section-divider {
    width: 60px;
    background-color: #000;
    height: 5px;
    margin: 0 auto;
    border: none;
}

.link {
    color: white;
    text-decoration: none;
}

.link:hover {
    text-decoration: underline;
}

.social-media-right {
    margin-top: 20px;
    text-align: right;
}

.social-media-link {
    color: white;
    text-decoration: none;
    border-radius: 80%; /* Make the icons round */
    padding: 5px; /* Add some padding for better appearance */
}

.social-media-link:hover {
    color: black; /* Change color to black on hover */
}
.social-media-link i {
    font-size: 15px; /* Adjust the size of the icon */
}


.foot {
    font-size: 0.9rem;
}

    </style>
    <body id="page-top">
        <!-- Navigation-->
        <div class="toast" id="alert_toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-body text-white">
        </div>
      </div>
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
            <div class="container">
			
                <a class="navbar-brand js-scroll-trigger" href="./"><?php echo $_SESSION['system']['name'] ?></a>
				
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto my-2 my-lg-0">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=home">Home</a></li>
						<li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=alumni_list">Association</a></li>
						<li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=programs">Programs & Events</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=alumni_list">Alumni</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=gallery">Gallery</a></li>
                        <?php if(isset($_SESSION['login_id'])): ?>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=careers">Jobs</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=forum">Forums</a></li>
                        <?php endif; ?>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=about">About</a></li>
                        <?php if(!isset($_SESSION['login_id'])): ?>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#" id="login">Login</a></li>
                        <?php else: ?>
                        <li class="nav-item">
                          <div class=" dropdown mr-4">
                              <a href="#" class="nav-link js-scroll-trigger"  id="account_settings" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['login_name'] ?> <i class="fa fa-angle-down"></i></a>
                                <div class="dropdown-menu" aria-labelledby="account_settings" style="left: -2.5em;">
                                  <a class="dropdown-item" href="index.php?page=my_account" id="manage_my_account"><i class="fa fa-cog"></i> Manage Account</a>
                                  <a class="dropdown-item" href="admin/ajax.php?action=logout2"><i class="fa fa-power-off"></i> Logout</a>
                                </div>
                          </div>
                        </li>
                        <?php endif; ?>
                        
                     
                    </ul>
                </div>
            </div>
        </nav>
       
        <?php 
        $page = isset($_GET['page']) ?$_GET['page'] : "home";
        include $page.'.php';
        ?>
       

<div class="modal fade" id="confirm_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Confirmation</h5>
      </div>
      <div class="modal-body">
        <div id="delete_content"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id='confirm' onClick="">Continue</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="uni_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title"></h5>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id='submit' onClick="$('#uni_modal form').submit()">Save</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="uni_modal_right" role='dialog'>
    <div class="modal-dialog modal-full-height  modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span class="fa fa-arrow-righ t"></span>
        </button>
      </div>
      <div class="modal-body">
      </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="viewer_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
              <button type="button" class="btn-close" data-dismiss="modal"><span class="fa fa-times"></span></button>
              <img src="" alt="">
      </div>
    </div>
  </div>
  <div id="preloader"></div>

  <!--footer-->  
  
  <footer class="footer">
        <!-- Section: Links  -->
        <section class="links">
            <div class="container">
                <!-- Grid row -->
                <div class="row">
  
                    <!-- Grid column -->
                    <div class="column">
                        <!-- Links -->
                        <h6 class="section-title">About the University</h6>
                        <p class = "foot">Alumni</p>
                        <p class = "foot"><a href="https://www.wlv.ac.uk/" class="link">Visit Our Alma mater</a></p>
                        <p class = "foot"><a href="https://www.wlv.ac.uk/news-and-events/latest-news/" class="link">News on Campus</a></p>
                    </div>
                    <!-- Grid column -->

                      <!-- Grid column -->
                    <div class="column">
                        <!-- Content -->
                        <h6 class="section-title">Communities</h6>
                        <p class = "foot">Student Union</p>
                        <p class = "foot">Association</p>
                    </div>
                    <!-- Grid column -->
        
                    <!-- Grid column -->
                    <div class="column">
                        <!-- Links -->
                        <h6 class="section-title">Useful links</h6>
                        <p class = "foot"><a href="https://www.bcs.org/" class="link">British Computer Society</a></p>
                        <p class = "foot"><a href="https://www.jobs.ac.uk/search/computer-sciences" class="link">Job</a></p>
                        <p class = "foot"><a href="#" class="link">Shipping Rates</a></p>
                        <p class = "foot"><a href="#" class="link">Help</a></p>
                    </div>
                    <!-- Grid column -->
        
                    <!-- Grid column -->
                    <div class="column">
                        <!-- Links -->
                        <h6 class="section-title">Contact</h6>
                        <p class = "foot"><i class="fas fa-envelope mr-2"></i> alumni@wlv.ac.uk</p>
                        <p class = "foot"><i class="fas fa-phone mr-2"></i> +44 234 567 88</p>
                        <div class="social-media-left">
                        <a href="" class="social-media-link"><i class="fab fa-facebook-f"></i></a>
                        <a href="" class="social-media-link"><i class="fab fa-twitter"></i></a>
                        <a href="" class="social-media-link"><i class="fab fa-google"></i></a>
                        <a href="" class="social-media-link"><i class="fab fa-instagram"></i></a>
                        <a href="" class="social-media-link"><i class="fab fa-linkedin"></i></a>
                        <a href="" class="social-media-link"><i class="fab fa-github"></i></a>
                      </div>
                    </div>
                    <!-- Grid column -->

                    <!-- Social media -->

                    <!-- Social media -->
                </div>
                <!-- Grid row -->
            </div>
        </section>
        <!-- Section: Links  -->
    </footer>

<!-- Footer -->



          </div> 
          <br>  
            <div class="container"><div class="small text-center text-muted">Copyright © 2024 - <?php echo $_SESSION['system']['name'] ?> | <a href="#" target="_blank">Alumni Project!!!!!!</a></div></div>
        </footer>
        
       <?php include('footer.php') ?>
    </body>
    <script type="text/javascript">
      $('#login').click(function(){
        uni_modal("Login",'login.php')
      })
    </script>
    <?php $conn->close() ?>

</html>
