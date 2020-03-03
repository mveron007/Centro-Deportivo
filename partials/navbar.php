<?php
    require_once "autoload.php";
?>
<header>
    <div class="social">
    <?php if (isset($_SESSION['login_user']) && $_SESSION['login_user'] == true) : ?>
                <?php echo '<form class="right waves-effect waves-light btn N/A transparent" method="POST" action="profile.php">
                    <input type="submit" name="logout_btn" value="Logout" />
                </form>'; ?>
            
        <?php else: ?>
            <?php echo '<a class="right" href="login.php">Ingresar</a>' ?>
                
        <?php endif; ?>
        
    </div>
    <nav class="nav-extended blue-grey darken-3">
        <div class="nav-wrapper">
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><span class="fas fa-bars"></span></a>
            <ul class="right hide-on-med-and-down">
                <li><a href="index.php">Inicio</a></li>
                <li><a href="profile.php">Mi cuenta</a></li>
            </ul>
        </div>
    </nav>
  </header>
  <ul class="sidenav" id="mobile-demo">
      <li><a href="index.php"><span class="fas fa-home"></span> Home</a></li>
      <li><a href="login.php"><span class="fas fa-sign-in-alt"></span> Login</a></li>
      <li><a href="register.php"><span class="fas fa-user-plus"></span> Register</a></li>
  </ul>