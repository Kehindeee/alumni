
<link rel="stylesheet" type="text/css" href="styles.css" />
<style>
    .title h1 {
        color: blue;
    }

    .line{
        width: 150px;
        height: 4px;
        background: red;
        margin: 10px auto;
        text-align: center;
    }
    .ctn{
        background-color: red;
        border: none;
        color: white;
        padding: 8px 15px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
    }
    section {
    width: 100%;
    margin: 10 auto;
    background-color: white; 
}


    .title{
        text-align: center;
        font-size: 4vmin;
        color: rgb(112, 112, 212);
    }

    .row{
        display: flex;
        align-items: center;
        width: 100%;
        justify-content:space-between;

    }
    .row .col img{
        width: 80%;
        height: 80%;
    }
    .row .col{
        display: flex;
        flex-direction: column;
        align-items: center;

    }

    .events .row{
        margin-top: 50px;
    }
    h4{
        font-size: 3vmin;
        color: rgb(113, 107, 107);
        margin: 20x, auto;
        padding: 5px;
    }
    p{
        color: grey;
        padding: 0px, 40px;;
    }
    a .ctn{
        font-size: 1vmin;
    }
    .mar{
        padding: 5px;
    }

</style>
        <header class="masthead">
            <div class="container h-100">
                <div class="row h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-10 align-self-end mb-5" style="background: #0000001e;">
                    	 <h1 class="text-uppercase text-white font-weight-bold">Jobs and Training</h1>
                        <hr class="divider my-5" />
                    </div>
                    
                </div>
            </div>
        </header>

<!--
        <body class = prog>
            <section class="events">
                <div class="title">
                    <h1>Upcoming Events</h1>
                    <div class="line"></div>
                </div>
                <div class="row">
                    <div class="col">
                        <img src="./img1.jpg" alt="">
                        <h4>Online Courses</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur accusamus incidunt quod, nihil minus architecto commodi, laborum odit quae harum nesciunt temporibus in rerum illum. Vero eligendi quod eos esse!</p>
                        <div class="mar"></div>
                        <a href="#" class="ctn">More</a>
                    </div>
                    <div class="col">
                        <img src="./img1.jpg" alt="">
                        <h4>Seminars</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur accusamus incidunt quod, nihil minus architecto commodi, laborum odit quae harum nesciunt temporibus in rerum illum. Vero eligendi quod eos esse!</p>
                        <div class="mar"></div>
                        <a href="#" class="ctn">More</a>
                    </div>
                    <div class="col">
                        <img src="./img1.jpg" alt="">
                        <h4>Training</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur accusamus incidunt quod, nihil minus architecto commodi, laborum odit quae harum nesciunt temporibus in rerum illum. Vero eligendi quod eos esse!</p>
                        <div class="mar"></div>
                        <a href="#" class="ctn">More</a>
                    </div>
                </div>
            </section>
        </body>
-->

   
<section class="page-section">
            <section class="events">
                <div class="title">
                    <h1>Upcoming Events</h1>
                    <div class="line"></div>
                </div>
                <div class="row">
                    <div class="col">
                        <img src="./img6.jpg" alt="">
                        <h4>Jobs</h4>
                        <p>Explore diverse career opportunities across industries. Find job openings, career advice, and resources to enhance your skills and advance your professional journey efficiently.</p>
                        <div class="mar"></div>
                        <a href="https://www.wlv.ac.uk/current-students/careers-enterprise-and-the-workplace/careers/" class="ctn" onclick="redirectToSeminar()">More</a>
                    </div>
                    <div class="col">
                        <img src="./img3.jpg" alt="">
                        <h4>Seminars</h4>
                        <p>Delve into varied seminar topics across disciplines. Discover engaging content, expert insights, and resources to expand your knowledge and spur intellectual growth in your academic or professional path.</p>
                        <div class="mar"></div>
                        <!-- <a href="#" class="ctn">More</a>-->
                        <a href="seminar1.php?" class="ctn">More</a>
                    </div>
                    <div class="col">
                        <img src="./img7.jpg" alt="">
                        <h4>Training</h4>
                        <p>Engage in training programs tailored to boost skills and knowledge. Access practical resources, expert guidance, and hands-on experiences to excel in your personal and professional endeavors.</p>
                        <div class="mar"></div>
                        <a href="https://imetatraining.co.uk/?gclid=CjwKCAjwuJ2xBhA3EiwAMVjkVKY7JEoxlAj5mG1DB8gQUqjoJaBJAq4upNczuz-D5FlNM_gybrP4IBoCYgYQAvD_BwE" class="ctn">More</a>
                    </div>
                </div>
            </section>
        </section>