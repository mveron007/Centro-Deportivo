<?php
session_start();
  require_once 'autoload.php';
  
	// var_dump($_SESSION['login_user']['u_name']);
	require_once 'autoload.php';

	if ($_POST) {

		if(isset($_POST['logout_btn'])){
			unset($_SESSION['login_user']);
			header("Location:login.php");
			exit;
		}

	}

  $pics = DB::getAllImages();
  $videos = DB::getAllVideos();

	$pageTitle = 'Home';
	require_once 'partials/head.php';
?>

    <?php require_once 'partials/navbar.php'; ?>

    <div class="carousel"
      data-flickity='{ "imagesLoaded": true, "autoPlay": true, "initialIndex": 2 }'>
      <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/82/orange-tree.jpg" alt="orange tree" />
      <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/82/submerged.jpg" alt="submerged" />
      <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/82/look-out.jpg" alt="look-out" />
      <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/82/one-world-trade.jpg" alt="One World Trade" />
      <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/82/drizzle.jpg" alt="drizzle" />
      <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/82/cat-nose.jpg" alt="cat nose" />
    </div>

    <div id="about">
      <div class="head-ab">
        <h3 class="center">Bienvenido</h3>
      </div>

      <div class="body-ab">
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati neque autem tempora libero culpa labore quibusdam quas, velit minus! Itaque molestias error dolor fugiat ullam. Ipsum eligendi neque dolorum odio?
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt nemo amet nulla dolore cupiditate quia debitis optio explicabo, autem molestias distinctio saepe aperiam vel reprehenderit quos deserunt hic earum modi?
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam fuga esse ad blanditiis voluptate, quaerat, eveniet id aspernatur explicabo placeat vero libero laboriosam ab, ratione animi ea ducimus quisquam eum.
        </p>
      </div>
    </div>

    <div id="coaches">

      <div class="coach-title">
        <h3 class="center">Cuerpo Técnico</h3>
      </div>
      
      <div class="row">
        <div class="center coach col-4">
              <img src="images/ariel.jpg" class="rounded-circle" width="150px;" alt="...">
              <h5 class="card-title"><strong>D.T: </strong>Ariel</h5>
              <p class="card-text"><span class="fab fa-whatsapp"></span> <a href="tel:">1145302809</a></p>
        </div>
        <div class="center coach col-4">
              <img src="images/mariano.jpg" class="rounded-circle" width="150px;" alt="...">
              <h5 class="card-title"><strong>D.T: </strong>Mariano Quillutay</h5>
              <p class="card-text"><span class="fab fa-whatsapp"></span> <a href="tel:">1121777597</a></p>
        </div>
        <div class="center coach col-4">
              <img src="images/chino.jpg" class="rounded-circle" width="150px;" alt="...">
              <h5 class="card-title"><strong>E.A: </strong>Marcelo Duré</h5>
              <!-- <p class="card-text"><span class="fab fa-whatsapp"></span> 123456789</p> -->
        </div>
      </div>

    </div>

    <div id="schedule">
      <div class="schedule-title">
        <h3 class="center">Días & Horarios</h3>
      </div>
      <table class="table" style="margin-top: 10px;">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">Sede</th>
                  <th scope="col">Día</th>
                  <th scope="col">Horario</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><a href="https://goo.gl/maps/UcfgrccwNcEwCJme9">Complejo Zucamor</a></td>
                  <td>--</td>
                  <td>20:30</td>
                </tr>
                <tr>
                  <td><a href="https://goo.gl/maps/UcfgrccwNcEwCJme9">Complejo Zucamor</a></td>
                  <td>--</td>
                  <td>20:30</td>
                </tr>
                <tr>
                  <td><a href="https://goo.gl/maps/UcfgrccwNcEwCJme9">Complejo Zucamor</a></td>
                  <td>--</td>
                  <td>20:30</td>
                </tr>
              </tbody>
            </table>
    </div>

    <div id="location">
      <div class="location-title">
        <h3 class="center">Ubicación</h3>
      </div>
      <div class="body-loc center">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3276.162122188332!2d-58.21939768476501!3d-34.80186288040865!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95a328f3db3a8d07%3A0x463d092269c39a87!2sCalle%20213%20%26%20Av.%20Dardo%20Rocha%2C%20Sourigues%2C%20Buenos%20Aires!5e0!3m2!1ses!2sar!4v1582567668767!5m2!1ses!2sar" width="400" height="300" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
        
      </div>
    </div>
      
    
    <div class="row">
      <div class="col-12">
        <!-- First Tab -->
        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

            <h4>Fotos</h4>
            <div class="carousel" data-flickity='{ "fullscreen": true, "lazyLoad": 2, "freeScroll":true, "contain": true, "prevNextButtons": false, "pageDots": false }'>
              <?php foreach ($pics as $pic): ?>
                <img class="carousel-image"
                data-flickity-lazyload=<?php echo $pic["image_path"] ?> />
              <?php endforeach; ?>
              <img class="carousel-image"
                data-flickity-lazyload="https://picsum.photos/720/540/?image=517" />
              <img class="carousel-image"
                data-flickity-lazyload="https://picsum.photos/540/720/?image=696" />
              <img class="carousel-image"
                data-flickity-lazyload="https://picsum.photos/720/540/?image=56" />
              <img class="carousel-image"
                data-flickity-lazyload="https://picsum.photos/800/500/?image=1084" />
              <img class="carousel-image"
                data-flickity-lazyload="https://picsum.photos/720/540/?image=1080" />
              <img class="carousel-image"
                data-flickity-lazyload="https://picsum.photos/640/640/?image=1074" />
              <img class="carousel-image"
                data-flickity-lazyload="https://picsum.photos/720/540/?image=1069" />
              <img class="carousel-image"
                data-flickity-lazyload="https://picsum.photos/800/500/?image=1062" />
              <img class="carousel-image"
                data-flickity-lazyload="https://picsum.photos/720/540/?image=1002" />
              <img class="carousel-image"
                data-flickity-lazyload="https://picsum.photos/640/640/?image=935" />
              <img class="carousel-image"
                data-flickity-lazyload="https://picsum.photos/720/540/?image=855" />
              <img class="carousel-image"
                data-flickity-lazyload="https://picsum.photos/640/640/?image=824" />
          </div>
          
          <h4>Videos</h4>

          <?php foreach ($videos as $video): ?>
      
            <div class="card mb-3" style="max-width: 540px;">
              <div class="row no-gutters">
                <div class="col-md-4">
                  <video id="myVideo" src=<?php echo $video["video_path"] ?> class="card-img" controls></video>
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title"><?php echo $video["v_name"] ?></h5>
                    
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
          </div>

          <!-- Second Tab -->
          <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">

            <div class="card mb-3" style="max-width: 540px;">
              <div class="row no-gutters">
                <div class="col-md-4">
                  <img src="images/ariel.jpg" class="card-img rounded-circle" alt="...">
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title"><strong>D.T: </strong>Ariel</h5>
                    <p class="card-text"><span class="fab fa-whatsapp"></span> <a href="tel:">1145302809</a></p>
                  </div>
                </div>
              </div>
            </div>

            <div class="card mb-3" style="max-width: 540px;">
              <div class="row no-gutters">
                <div class="col-md-4">
                  <img src="images/mariano.jpg" class="card-img rounded-circle" alt="...">
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title"><strong>D.T: </strong>Mariano Quillutay</h5>
                    <p class="card-text"><span class="fab fa-whatsapp"></span> <a href="tel:">1121777597</a></p>
                  </div>
                </div>
              </div>
            </div>

            <div class="card mb-3" style="max-width: 540px;">
              <div class="row no-gutters">
                <div class="col-md-4">
                  <img src="images/chino.jpg" class="card-img rounded-circle" alt="...">
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title"><strong>E.A: </strong>Marcelo Duré</h5>
                    <!-- <p class="card-text"><span class="fab fa-whatsapp"></span> 123456789</p> -->
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Third Tab -->
          <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
            <table class="table" style="margin-top: 10px;">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">Sede</th>
                  <th scope="col">Día</th>
                  <th scope="col">Horario</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><a href="https://goo.gl/maps/UcfgrccwNcEwCJme9">Complejo Zucamor</a></td>
                  <td>--</td>
                  <td>20:30</td>
                </tr>
                <tr>
                  <td><a href="https://goo.gl/maps/UcfgrccwNcEwCJme9">Complejo Zucamor</a></td>
                  <td>--</td>
                  <td>20:30</td>
                </tr>
                <tr>
                  <td><a href="https://goo.gl/maps/UcfgrccwNcEwCJme9">Complejo Zucamor</a></td>
                  <td>--</td>
                  <td>20:30</td>
                </tr>
              </tbody>
            </table>
            
          </div>
        </div> 

      </div>
    </div>

    <?php require_once 'partials/tabs.php'; ?>

    <?php require_once 'partials/scripts.php'; ?>
    <!-- Start Swipable Tabs -->

    <script>
      $(function () {
        $('#myTab li:last-child a').tab('show')
      })

    //   $('.sidenav').sidenav();
      
      

    </script>
</body>
</html>