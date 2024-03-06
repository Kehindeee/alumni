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
    background: #000000e6 !important;
}
 

a.jqte_tool_label.unselectable {
    height: auto !important;
    min-width: 4rem !important;
    padding:5px
}/*
a.jqte_tool_label.unselectable {
    height: 22px !important;
}*/
    </style>
    <body id="page-top">
        <!-- Navigation-->
        <div class="toast" id="alert_toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-body text-white">
        </div>
      </div>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="./"><svg xmlns="http://www.w3.org/2000/svg" width="325" height="63" fill="none" xmlns:v="https://vecta.io/nano">
<g clip-path="url(#A)" fill="#333">
<path d="M95.038 11.143v5.495c0 1.876.698 2.863 2.312 2.863 1.691 0 2.258-1.349 2.258-2.643v-5.714h1.178v5.747c0 2.04-1.254 3.488-3.436 3.488-2.541 0-3.555-1.349-3.555-3.685v-5.55h1.243zm16.327 9.081h-.981l-5.868-7.228h-.033v7.228h-1.036v-9.081h.927l5.923 7.239h.021v-7.239h1.036v9.081h.011zm4.057-9.081h-1.254v9.081h1.254v-9.081zm5.007 9.081l-3.337-8.972 1.276-.23 2.606 7.754h.022l2.749-7.754 1.123.153-3.599 9.048h-.84zm10.546-8.171h-3.195v2.928h3.13v.91h-3.13v3.422h3.751v.91h-5.006v-9.081h4.45v.91zm3.862 3.499h.709c1.592 0 1.897-1.195 1.897-1.963 0-1.119-.698-1.546-1.538-1.546h-1.068v3.51zm-1.255-4.409h2.574c1.473 0 2.618.768 2.618 2.336 0 1.338-.644 2.084-1.516 2.643l2.247 3.861-1.266.384-2.094-3.915h-1.33v3.762h-1.254v-9.07h.021zm12.042 1.404c-.437-.318-1.015-.647-1.56-.647-.905 0-1.407.526-1.407 1.228 0 .647.556 1.13 1.712 1.974 1.244.91 1.963 1.733 1.963 2.906 0 1.437-1.352 2.369-2.803 2.369-.861 0-1.897-.307-2.541-.943l.557-.757c.534.373 1.112.79 1.963.79.894 0 1.57-.483 1.57-1.492 0-1.141-1.352-1.875-2.083-2.424-.752-.581-1.592-1.141-1.592-2.424 0-1.218 1.178-2.139 2.574-2.139.938 0 1.723.34 2.235.91l-.588.647zm4.372-1.404h-1.254v9.081h1.254v-9.081zm4.679 9.081v-8.171h-2.89v-.91h7.046v.91h-2.901v8.171h-1.255zm7.548.001v-3.937l-2.727-5.012 1.363-.263 2.171 4.31 2.377-4.31 1.113.154-3.043 5.122v3.937h-1.254zm17.515-4.695c0-1.7-.905-3.63-3.13-3.63s-3.13 1.93-3.13 3.63c0 1.777.796 3.937 3.13 3.937 2.323 0 3.13-2.161 3.13-3.937zm-7.656 0c0-2.544 1.909-4.541 4.515-4.541s4.515 1.996 4.515 4.541c0 2.709-1.723 4.848-4.515 4.848-2.781 0-4.515-2.139-4.515-4.848zm15.825-3.477h-3.196v3.444h3.13v.91h-3.13v3.817h-1.254v-9.081h4.45v.91zM35.25 18.908c-2.225 2.303-7.722 8.895-10.634 11.055-1.178.877-2.389.998-4.45.691-2.759-.417-5.464-7.535-7.002-12.054-1.549-4.519-3.097-17.132-3.097-17.132L0 9.564s-.044.636.153 1.711c1.32 7.162 2.399 11.132 4.952 16.035 3.348 6.416 6.293 10.562 11.092 10.748 5.769.219 8.867-3.795 12.106-7.974 2.803-3.619 6.369-9.75 9.085-13.172v-.307a81.46 81.46 0 0 1-2.138 2.303zm23.437 18.525c-4.853-.57-6.5-2.797-9.598-6.69 0 0-2.367-3.981-4.068-7.688-2.498-5.44-2.77-8.917-5.944-7.601-.676.285-.982.812-1.669 1.459V68L61.26 48.982 85.658 68V4.014C81.481 9.948 73.639 25.917 71.84 28.406c-2.476 3.422-6.402 9.827-13.153 9.026z"/><path d="M37.408 0v16.605c2.487-2.698 4.919-5.232 6.249-5.999 1.701-.987 6.053-2.786 7.863 1.996 2.083 5.506 5.311 11.9 8.093 15.015 3.512 3.948 5.879 3.268 8.823.153C71.054 25.006 82.091 5.9 85.657 1.755V0h-48.25zm69.322 26.29l4.428 15.497h.055c1.483-5.659 2.977-10.726 4.482-15.761l2.04.362-5.661 18.25h-2.246l-4.33-15.157h-.055c-1.429 5.396-2.923 10.277-4.373 15.157h-2.247l-5.366-18.086 2.399-.526 4.276 15.761h.054c1.462-5.583 2.967-10.54 4.461-15.497h2.083zm28.183 8.862c0-3.433-1.822-7.337-6.337-7.337s-6.337 3.905-6.337 7.337c0 3.597 1.614 7.974 6.337 7.974 4.712 0 6.337-4.376 6.337-7.974zm-15.466 0c0-5.133 3.861-9.18 9.129-9.18s9.118 4.036 9.118 9.18c0 5.484-3.49 9.805-9.118 9.805s-9.129-4.321-9.129-9.805zm22.217-8.862h2.53v16.517h7.58v1.832h-10.11V26.29zm16.446 18.349l-6.751-18.141 2.585-.472c1.778 5.001 3.523 10.035 5.268 15.673h.055c1.821-5.638 3.697-10.672 5.551-15.673l2.268.318-7.274 18.294h-1.702zm20.548-16.518h-6.468v5.933h6.337v1.832h-6.337v6.921h7.58v1.832h-10.11V26.29h8.998v1.832zm7.002 7.085h1.429c3.228 0 3.839-2.413 3.839-3.959 0-2.259-1.407-3.115-3.109-3.115h-2.159v7.074zm-2.519-8.917h5.213c2.977 0 5.289 1.546 5.289 4.716 0 2.698-1.308 4.223-3.053 5.352l4.537 7.809-2.552.79-4.221-7.919h-2.683v7.601h-2.53V26.29zm28.989 18.35h-2.53v-9.114h-8.921v9.114h-2.531V26.29h2.531v7.392h8.921V26.29h2.53v18.349zm13.371-7.228l-2.716-8.39h-.054c-.938 3.301-1.898 5.846-2.89 8.39h5.66zm-1.407-11.121l6.806 18.349h-2.923l-1.876-5.396h-6.958l-1.953 5.396h-2.454l7.428-18.349h1.93zm29.219 18.349h-2.53V29.701h-.055c-.731 2.15-4.875 10.255-7.329 14.938h-1.014c-2.269-4.694-6.042-12.525-6.751-14.938h-.055v14.938h-2.083V26.29h2.716l7.013 14.938 7.721-14.938h2.367v18.349zm7.426 0h-2.53V26.29h4.592c3.861 0 6.227 1.733 6.227 5.297 0 3.093-2.639 5.901-6.729 5.901h-.807V35.81l.84-.022c2.454-.132 3.991-1.448 3.991-4.168 0-2.018-1.123-3.488-3.828-3.488h-1.745v16.506h-.011zm15.772 0V28.121h-5.835V26.29h14.233v1.832h-5.868v16.517h-2.53zm25.761-9.487c0-3.433-1.821-7.337-6.337-7.337s-6.336 3.905-6.336 7.337c0 3.597 1.614 7.974 6.336 7.974 4.712 0 6.337-4.376 6.337-7.974zm-15.465 0c0-5.133 3.861-9.18 9.128-9.18s9.129 4.036 9.129 9.18c0 5.484-3.49 9.805-9.129 9.805s-9.128-4.321-9.128-9.805zM325 44.639h-1.984l-11.867-14.598h-.054v14.598h-2.083V26.29h1.876l11.964 14.631h.054V26.29h2.084v18.349h.01z"/>
</g><defs><clipPath id="A"><path fill="#fff" d="M0 0h325v68H0z"/>
</clipPath></defs>
</svg><br><?php echo $_SESSION['system']['name'] ?></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto my-2 my-lg-0">
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=home">Home</a></li>
                <li class="nav-item">
                    <div class="dropdown">
                        <a class="nav-link js-scroll-trigger" href="#" role="button" id="associationDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Association <i class="fa fa-angle-down"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="associationDropdown">
                            <a class="dropdown-item" href="index.php?page=association">Association</a>
                            <a class="dropdown-item" href="index.php?page=leadership">Leadership</a>
                            <a class="dropdown-item" href="index.php?page=testimonials">Testimonials</a>
                        </div>
                    </div>
                </li>
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
                        <div class="dropdown mr-4">
                            <a href="#" class="nav-link js-scroll-trigger" id="account_settings" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php echo $_SESSION['login_name'] ?> <i class="fa fa-angle-down"></i>
                            </a>
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
        <button type="button" class="btn btn-primary" id='confirm' onclick="">Continue</button>
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
        <button type="button" class="btn btn-primary" id='submit' onclick="$('#uni_modal form').submit()">Save</button>
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
        <footer class=" py-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h2 class="mt-0 text-white">Contact us</h2>
                        <hr class="divider my-4" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 ml-auto text-center mb-5 mb-lg-0">
                        <i class="fas fa-phone fa-3x mb-3 text-muted"></i>
                        <div class="text-white"><?php echo $_SESSION['system']['contact'] ?></div>
                    </div>
                    <div class="col-lg-4 mr-auto text-center">
                        <i class="fas fa-envelope fa-3x mb-3 text-muted"></i>
                        <!-- Make sure to change the email address in BOTH the anchor text and the link target below!-->
                        <a class="d-block" href="mailto:<?php echo $_SESSION['system']['email'] ?>"><?php echo $_SESSION['system']['email'] ?></a>
                    </div>
                </div>
            </div>
            <br>
            <div class="container"><div class="small text-center text-muted">Copyright © 2024 - <?php echo $_SESSION['system']['name'] ?> </div></div>
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
