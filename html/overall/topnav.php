<section class="mbr-navbar mbr-navbar--freeze mbr-navbar--absolute mbr-navbar--sticky mbr-navbar--auto-collapse" id="ext_menu-0">
    <div class="mbr-navbar__section mbr-section">
        <div class="mbr-section__container container">
            <div class="mbr-navbar__container">
                <div class="mbr-navbar__column mbr-navbar__column--s mbr-navbar__brand">
                    <span class="mbr-navbar__brand-link mbr-brand mbr-brand--inline">
                        <span class="mbr-brand__logo"><a href="?view=index"><img class="mbr-navbar__brand-img mbr-brand__img" src="views/images/logo.png" alt="Imagen Pendiente"></a></span>
                    </span>
                </div>
                <div class="mbr-navbar__hamburger mbr-hamburger text-white"><span class="mbr-hamburger__line"></span></div>
                <div class="mbr-navbar__column mbr-navbar__menu">
                    <nav class="mbr-navbar__menu-box mbr-navbar__menu-box--inline-right">
                        <div class="mbr-navbar__column">
                            <ul class="mbr-navbar__items mbr-navbar__items--right mbr-buttons mbr-buttons--freeze mbr-buttons--right btn-decorator mbr-buttons--active">    <li class="mbr-navbar__item">
                                    <a class="mbr-buttons__link btn text-white" href="?view=index">INICIO
                                    </a>
                                </li>
                          
                        <?php 
                            if (!isset($_SESSION['app_id'])) {
                                echo'
                                <li class="mbr-navbar__item">
                                    <a class="mbr-buttons__link btn text-white" data-toggle="modal" data-target="#Login">INICIAR SESIÓN
                                    </a>
                                </li>
                                <li class="mbr-navbar__item">
                                    <div class="mbr-navbar__column">
                                        <ul class="mbr-navbar__items mbr-navbar__items--right mbr-buttons mbr-buttons--freeze mbr-buttons--right btn-inverse mbr-buttons--active">
                                            <li class="mbr-navbar__item">
                                                <a class="mbr-buttons__btn btn btn-danger" data-toggle="modal" data-target="#Registro">REGISTRO
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>

                                ';
                            } else {
                                echo'
                                 <li class="mbr-navbar__item">
                                    <a class="mbr-buttons__link btn text-white" data-toggle="modal" href="?view=perfil&id='.$_SESSION['app_id'].'">'.strtoupper($users[$_SESSION['app_id']]['user']).'
                                    </a>
                                </li>
                                 <li class="mbr-navbar__item">
                                    <a class="mbr-buttons__btn btn btn-danger" data-toggle="modal" href="?view=cuenta">CUENTA
                                    </a>
                                </li>
                                <li class="mbr-navbar__item">
                                    <a class="mbr-buttons__btn btn btn-warning" data-toggle="modal" href="?view=logout">SALIR
                                    </a>
                                </li>

                           
                                ';
                            }
                         ?>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Seccion de Modales-->
<?php 
    if (!isset($_SESSION['app_id'])) {
        include(HTML_DIR.'public/login.html');
        include(HTML_DIR.'public/lostpass.html');
        include(HTML_DIR.'public/reg.html'); 
    }
?>