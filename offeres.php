<?php
    session_start();
    require('actions/users/securityAction.php');
    require('actions/emplois/OffresAction.php');  
    require('actions/users/showOneusersProfileAction.php');

?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--=============== BOXICONS ===============-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
        <!--=============== CSS ===============-->
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="stylemenu.css">
        <title>bricole</title>
        <link rel="icon" type="image/png" href="idea.png"/>
    </head>
    <body>
        <!--=============== HEADER ===============-->
        <header class="header" id="header">
            <nav class="nav container">
                <!-- <img class="ii" src="logo2.png" alt="brico"> -->
                <a href="index.php" class="nav__logo"><img class="iiiii" src="idea.png" alt="brico">Brico</a>

                <div class="nav__menu" id="nav-menu">
                    <ul class="nav__list">
                        <li class="nav__item"><a href="index.php" class="nav__link">Home</a></li>
                        <li class="nav__item"><a href="index.php#services" class="nav__link">Services</a></li>       
                        <li class="nav__item"><a href="index.php#about" class="nav__link">About Us</a> </li>
                        <li class="nav__item"><a href="index.php#contact" class="nav__link">Contact us</a></li>
                        <i class='bx bx-toggle-left change-theme' id="theme-button"></i>
                        
                        
                        <?php
                        if(isset($_SESSION['auth'])){                            
                            $image =$_SESSION['image'];
                            ?>
                        <div class="action">
                            <div class="profile" onclick="menuToggle();">
                                <img src="img/<?php echo $image;?>" alt="">
                            </div>
                            <div class="menu">
                                <h3><?= $_SESSION['firstname'];?> <?= $_SESSION['lastname']; ?><br><span>active now</span></h3>
                                <ul>
                                    <li><img src="user.png" alt=""><a href="profile.php?id=<?= $_SESSION['id']; ?> ">My Profile</a></li>
                                    <li><img src="paper-plane.png" alt=""><a href="publieremploi.php">Publish</a></li>
                                    <li><img src="envelope.png" alt=""><a href="users.php">Inbox</a></li>
                                    <li><img src="offer.png" alt=""><a href="mes-offres.php">My offres</a></li>
                                    <!-- <li><img src="settings.png" alt=""><a href="">Settings</a></li> -->
                                    <li><img src="log-out.png" alt=""><a href="actions/users/logoutAction.php">Logout</a></li>
                                </ul>
                            </div>
                        </div>
                        <script>
                            function menuToggle(){
                                const toggleMenu = document.querySelector('.menu');
                                toggleMenu.classList.toggle('active')
                            }
                        </script>
                            </ul>
                        </div>
                <?php
                }
                ?>
                    
                    
                    
                    
                    </ul>
                </div>

                <div class="nav__toggle" id="nav-toggle">
                    <i class='bx bx-grid-alt'></i>
                </div>
            </nav>
        </header>
        <main class="main">
        <!--=============== offres ===============-->
        <section class="services section container">
                <h2 class="section__title">Services offered by <?= $user_nom . ' ' .$user_prenom;?></h2>
        <?php
    require('actions/users/securityAction.php');
    require('actions/emplois/OffresAction.php');
    
?>

<div class="services__container grid">
        <?php 
        while($emploi = $getAllEmplois->fetch()){
        ?>
        <div class="services__data">       
                    <p class="services__description">publier le <?= $emploi['date_publication']; ?></span>
                    <h3 class="services__subtitle"><a class="section__title" href="article.php?id=<?= $emploi['id']; ?>"><?= $emploi['titre']; ?></a></h3>
                    <img src="imgOffer/<?= $emploi['image']; ?>" alt="">
                    <p class="services__description"><?= $emploi['description']; ?></p> 
                    <a class="button" href="article.php?id=<?= $emploi['id']; ?>">Acc??der</a> 
        </div>
        <?php 
            }
            ?>
</div>  
    </section>
        <!--=============== FOOTER ===============-->
        <footer class="footer section">
            <div class="footer__container container grid">
                <div class="footer__content">
                    <a href="index.php" class="footer__logo">Brico</a>
                    <p class="footer__description">Recruitment Site In Morocco <br>Dedicated To Employment</p>
                </div>

                <div class="footer__content">
                    <h3 class="footer__title">Our Services</h3>
                    <ul class="footer__links">
                        <li><a href="index.php#home" class="footer__link">Home</a></li>
                        <li><a href="index.php#services" class="footer__link">Services</a></li>
                        <li><a href="index.php#about" class="footer__link">About Us</a></li>
                        <li><a href="index.php#contact" class="footer__link">Contact Us</a></li>
                    </ul>
                </div>

                <div class="footer__content">
                    <h3 class="footer__title">Our Company</h3>
                    <ul class="footer__links">
                        <li><a href="#" class="footer__link">Blog</a></li>
                        <li><a href="#" class="footer__link">Our mision</a></li>
                        <li><a href="#" class="footer__link">Get in touch</a></li>
                    </ul>
                </div>

                <div class="footer__content">
                    <h3 class="footer__title">Community</h3>
                    <ul class="footer__links">
                        <li><a href="#" class="footer__link">Support</a></li>
                        <li><a href="#" class="footer__link">Questions</a></li>
                        <li><a href="#" class="footer__link">Customer help</a></li>
                    </ul>
                </div>

                <div class="footer__social">
                <ul class="footer__links">
                        <li>
                            <a href="#" class="footer__social-link"><i class='bx bxl-facebook-circle '></i></a>
                            <a href="#" class="footer__social-link"><i class='bx bxl-twitter'></i></a>
                            <a href="#" class="footer__social-link"><i class='bx bxl-instagram-alt'></i></a>
                        </li>
                        <li>
                            <a href="#" class="footer__social-link"><i class='bx bxl-linkedin'></i></a>
                            <a href="#" class="footer__social-link"><i class='bx bxl-whatsapp'></i></a>
                            <a href="#" class="footer__social-link"><i class='bx bxl-youtube'></i></a>
                        </li>
                    </ul>
                </div>
            </div>

            <p class="footer__copy">&#169; Bricocode. All right reserved</p>
        </footer>

        <!--=============== SCROLL UP ===============-->
        <a href="#" class="scrollup" id="scroll-up">
            <i class='bx bx-up-arrow-alt scrollup__icon'></i>
        </a>

        <!--=============== MAIN JS ===============-->
        <script src="app.js"></script>
    </body>
</html>