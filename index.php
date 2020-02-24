<?php
	require_once 'autoload.php';

  $pics = DB::getAllImages();
  $videos = DB::getAllVideos();

	$pageTitle = 'Home';
	require_once 'partials/head.php';
?>

    <?php require_once 'partials/navbar.php'; ?>
      
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
                  <video id="myVideo" src=<?php echo $video["video_path"] ?> onclick="myFunction()" class="card-img"></video>
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