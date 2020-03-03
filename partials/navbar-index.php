<?php
    require_once "autoload.php";
?>
<header>
    <div class="social">
        <a href="" style="color: #ddd;"><i class="fab fa-instagram fa-4x"></i></a>
        <a href="" style="color: #ddd;"><i class="fab fa-facebook-square fa-4x"></i></a>
        <?php if (isset($_SESSION['login_user']) && $_SESSION['login_user'] == true) : ?>
                <?php echo '<form method="POST" action="profile.php">
                    <input class="btn right waves-effect waves-light" type="submit" name="logout_btn" value="Logout" />
                </form>'; ?>
                
                <?php echo '<a href="profile.php">Mi cuenta</a>'; ?>
            
        <?php else: ?>
            <?php echo '<a class="right" href="login.php">Ingresar</a>' ?>
                
        <?php endif; ?>
    </div>
    <nav class="nav-extended blue-grey darken-3">
        <div class="nav-wrapper">
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><span class="fas fa-bars"></span></a>
            <ul class="right hide-on-med-and-down">
                <li><a href="index.php">Inicio</a></li>
                <li><a href="#about">Nosotros</a></li>
                <li><a href="#coaches">Cuerpo Técnico</a></li>
                <li><a href="gallery.php">Galería</a></li>
                <li><a href="#schedule">Días & Horarios</a></li>
                <li><a href="#location">Ubicación</a></li>
            </ul>
        </div>
    </nav>
  </header>
  <ul class="sidenav" id="mobile-demo">
      <li><a href="index.php"><span class="fas fa-home"></span> Home</a></li>
      <li><a href="login.php"><span class="fas fa-sign-in-alt"></span> Login</a></li>
      <li><a href="register.php"><span class="fas fa-user-plus"></span> Register</a></li>
  </ul>