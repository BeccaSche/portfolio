<?php
ob_start();
session_start();
require_once 'db_connect.php';


$resFinal = mysqli_query($conn, "SELECT * FROM projects WHERE type = 'FinalProject'");
$resCR = mysqli_query($conn, "SELECT * FROM projects WHERE type = 'CodeReview'");

?>


<!DOCTYPE html>
<html>

<head>
  <title>Rebecca Schedler Portfolio</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;600&display=swap" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
</head>

<body>
    
  <header>

    <nav class="navbar navbar-expand-lg navbar-light b6 fixed-top px-5">
		  <a class="navbar-brand" href="index.html"><b class="c2 rslogo">RS</b></a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
	  
		  <div class="navbar-collapse collapse" id="navbarSupportedContent">
			  <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="#projects"><b class="t1">projects</b><span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#resume"><b class="t1">resume</b></a>
            </li>
            <!-- <li class="nav-item active">
              <a class="nav-link" href="#skills"><b class="t1">skills</b><span class="sr-only">(current)</span></a>
            </li> -->
        </ul>

			  <div>
			    <a href="https://www.linkedin.com/in/rebeccaschedler/" target="_blank" title="LinkedIn" class="c2">LinkedIn</a>
			    <a href="" target="_blank" title="coming soon" class="c2 mx-4">Xing</a>
        </div>
		  </div>
	  </nav>
  </header>
  <div class="my-5 py-3"></div>

  <section id="landing" class="landing">
    <div class="container" id="landing1">

      <div class="intro b2 row p-5 mb-5 mx-0 ">
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-8 col-xl-8 text-center b5 py-4">
          <h2 class="text-light mt-4">Rebecca Schedler</h2>
          <p class="mt-4 t3 text-break">
            <i class="material-icons">email</i>rebecca.schedler@gmx.net<br>
            <i class="material-icons">call</i> +43 677 62445051 <br>
          </p> 
          <h5 class="text-light t3 mt-4">
          Vorarlberg - Tirol - Vienna - Zurich
          </h5>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 col-xl-4" id="portrait">
          <img src="img/Portrait_front_cropped.jpg" alt="portrait" class="img-fluid">
        </div>
      </div>

      <div class="facts mt-4">
	      <div class="row my-4">
          <div class="col-md-4">
              <img class="img-fluid" src="img/bulb.jpg" alt="bulb" width="160" height="160">
              <br><hr>
              <h4><b>Curiosity</b></h4>
              <p class="t2">The urge to challenge myself and learn new things led me to start with web development.
              Check out my CV to see what I did before and how it helps me now.</p>
              <p><a class="btn b3 text-light font-weight-bolder" href="#resume" role="button">View CV »</a></p>
          </div>
        
          <div class="col-md-4">
            <img class="img-fluid" src="img/gear.jpg" alt="gear" width="160" height="160">
            <br><hr>
            <h4><b>Allrounder</b></h4>
            <p class="t2">
            I consider myself an allrounder who always sees the bigger picture. Design and functionality are equally important in my projects.</p>
            <p><a class="btn b3 text-light font-weight-bolder" href="#projects"
            role="button">View projects »</a></p>
          </div>
        
          <div class="col-md-4">
            <img class="img-fluid" src="img/mountain.jpg" alt="mountain" width="160" height="160">
            <br><hr>
            <h4><b>Offline</b></h4>
            <p class="t2">Skiing, cooking and going to concerts are the counterbalance to my online time.</p>
            
          </div>
        </div>
      </div>
	

    </div>
  </section>

  <section id="projects" class="projects">
    <div class="container">

    <div class="section-title">
        <h2 class="">PROJECTS</h2>
        <hr>
    </div>

        <div class="row">
          <?php
          if ($resFinal->num_rows > 0) {
            while ($row = $resFinal->fetch_assoc()) {
              echo "<div class='col-12 col-xl-6 my-5'>
                      <h4 class='mb-1'>" . $row['title'] . "</h4>
                      <h5 class='c2'>" . $row['tools'] . "</h5>
                      <a href='". $row['link_page']."'>
                        <img src='img/" . $row['image'] . "' class='img-fluid d-sm-none d-md-block imageProject' alt='screenshot of project'>
                      </a>                      
                      <div class='mt-2 c2'>" . $row['type'] . "</div>
                      <div class='mt-1 t1 shortText'>" . $row['description'] . "</div>
                      <div class='mt-3'>
                        <a href='". $row['link_page']."' type='button' class='btn b3 text-light'><b>View Page</b></a>
                        <a href='". $row['link_github']."' type='button' class='btn b4 text-light'><b>View GitHub</b></a>
                      </div>
                    </div>";
            }
          } else {
            echo  "<p><center>No Data Avaliable</center></p>";
          }
          ?>
        </div>

        <div class="row">
          <?php
          if ($resCR->num_rows > 0) {
            while ($row = $resCR->fetch_assoc()) {
              echo "<div class='col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 my-4'>
                      <h4 class='mb-1'>" . $row['title'] . "</h4>
                      <h5 class='c2'>" . $row['tools'] . "</h5>
                      <a href='". $row['link_page']."'>
                        <img src='img/" . $row['image'] . "' class='img-fluid d-sm-none d-md-block imageProject' alt='screenshot of project'> 
                      </a>                      
                      <div class='mt-2 c2'>" . $row['type'] . "</div>
                      <div class='mt-1 t1 shortText'>" . $row['description'] . "</div>
                      <div class='mt-3'>
                        <a href='". $row['link_page']."' type='button' class='btn b3 text-light'><b>View Page</b></a>
                        <a href='". $row['link_github']."' type='button' class='btn b4 text-light'><b>View GitHub</b></a>
                      </div>
                    </div>";
            }
          } else {
            echo  "<p><center>No Data Avaliable</center></p>";
          }
          ?>
        </div>
      </div>
  </section>

  <section id="resume" class="resume">
    <div class="container">
      <div class="section-title">
          <h2>RESUME</h2>
          <hr>
      </div>

      <div class="row">
        <div class="col-lg-6">
          <h3 class="resume-title">EDUCATION</h3>

			      <div class="decoration-item">
              <h4><b>Full Stack Web Developer / </b>CodeFactory, Vienna</h4>
              <h5>May - September 2020</h5>
              <p>
                Front-End: Version Control (Git -GitHub), HTML5, CSS3, JavaScript, jQuery, Bootstrap, Project Documentation, TypeScript, Angular<br>
                Back-End: SQL (MySQL), SCRUM & Requirements Engineering, PHP , AJAX, Symfony PHP framework, WordPress, Software Testing<br>
                Guided but  independent learning with pair programming, group work & mini projects (CodeReviews)<br>
                Check out the course programm <a href="https://codefactory.wien/en/full-stack-web-developer-en/">here</a>
              </p>
            </div>

            <div class="decoration-item">
              <h4><b>Basic course web development / </b>Master21 Academy, Zurich</h4>
              <h5>March  - May 2017</h5>
              <p>9 weeks part-time bootcamp <br>
                Basic concepts: UNIX Shell, object-oriented programming in Ruby, Ruby on Rails Framework & HTML / CSS / JavaScript</p>
            </div>

            <div class="decoration-item">
              <h4><b>Bachelor of Arts in Social Sciences / </b>University of Zurich</h4>
              <h5>September 2008 - July 2012</h5>
              <p>Major: Communication & Media Science<br>
              Minors: Political Science and Social Anthropology</p>
            </div>

            <div id="cv-link-large" class="mt-3">
              <h4>View the full resume as pdf:</h4>
                <a href="img/CV_Schedler_en.pdf" target="_blank" title="Resume English" class="c2 font-weight-bolder">English</a>

                <a href="img/CV_Schedler_de.pdf" target="_blank" title="Resume German" class="c2 font-weight-bolder ml-4">German</a>
            </div>
        </div>

        <div class="col-lg-6">
          <h3 class="resume-title">WORK EXPERIENCE</h3>
            
            <div class="decoration-item">
              <h4><b>Chef de service / </b>Wirtschaft Ziegelhütte, Zurich</h4>
              <h5>April 2019 - March 2020</h5>
              <!-- <ul>
                <li></li>
                <li></li>
              </ul> -->
            </div>

            <div class="decoration-item">
              <h4><b>Chef de Rang / </b>Wirtschaft Ziegelhütte, Zurich</h4>
              <h5>May 2018 - March 2019</h5>
            </div>

            <div class="decoration-item">
              <h4><b>Chef de Rang / </b>Restaurant Brandner Hof, Brand</h4>
              <h5>January - March 2018</h5>
            </div>

            <div class="decoration-item">
              <h4><b>Head of Digital Marketing & Content Manager / </b>CruiseCenter AG, Zurich</h4>
              <h5>February 2017 - October 2017</h5>
            </div>

            <div class="decoration-item">
              <h4><b>Content Manager / </b>CruiseCenter AG, Zurich</h4>
              <h5>February 2013 - January 2017</h5>
            </div>

            <div class="decoration-item">
              <h4><b>Allrounder / </b>Wormser Hütte, Schruns</h4>
              <h5>2010 - 2012  during semester breaks</h5>
            </div>

            <div class="decoration-item">
              <h4><b>Chef de Rang / </b>Restaurant Limmatblick, Zurich</h4>
              <h5>June - September 2009</h5>
            </div>

            <div class="decoration-item">
              <h4><b>Allrounder / </b>Wormser Hütte, Schruns</h4>
              <h5>June 2007 - September 2008</h5>
            </div>

            <div class="decoration-item">
              <h4><b>Internship / </b>Coral-Hotels, Teneriffa</h4>
              <h5>October 2006 - April 2007</h5>
            </div>

            <div class="decoration-item">
              <h4><b>Waitress & maid / </b>Restaurant Brandner Hof, Brand</h4>
              <h5>June - October 2006</h5>
            </div>

            <div class="decoration-item">
              <h4><b>Internship / </b>Brand Tourismus GmbH, Brand</h4>
              <h5>July - September 2005</h5>
            </div>

            <div id="cv-link-small" class="mt-4">
              <h4>View the full resume as pdf:</h4>
                <a href="img/CV_Schedler_en.pdf" target="_blank" title="Resume English" class="c2 font-weight-bolder">English</a>

                <a href="img/CV_Schedler_de.pdf" target="_blank" title="Resume German" class="c2 font-weight-bolder ml-4">German</a>
            </div>

        </div>
      </div>
    </div>
  </section>

  <!-- <section id="skills" class="skills">
    <div class="container">
      <div class="section-title">
          <h2>SKILLS</h2>
          <hr>
      </div>
    </div>
  </section>

  <section id="contact" class="contact">
    <div class="container">
      <div class="section-title">
          <h2>CONTACT</h2>
          <hr>
      </div>
    </div>
  </section> -->

  <footer class="b3 d-flex justify-content-between mt-5">
    <div class="text-light my-2 ml-4"><b class="rslogo">RS </b></div>
    <div class="text-light my-4 mr-5">rebecca.schedler@gmx.net | Tel +43 67762445051</div>
  </footer>


  <script type="text/javascript" src="script.js"></script>                   
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>
