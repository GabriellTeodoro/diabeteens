<!DOCTYPE html>
<html lang="en">
    <head>
        <?php require_once 'includes/head.php'; ?>
    </head><!--/head-->

    <body>

        <!--.preloader-->
        <div class="preloader"><i class="fa fa-circle-o-notch fa-spin"></i></div>
        <!--/.preloader-->

        <header id="home">
            <div id="home-slider" class="carousel slide carousel-fade" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="item active" style="background-image: url(images/background-fruits3.jpg);">
                        <div class="caption">
                            <h1 class="animated fadeInDownBig">Desafio <span>Diabeteens</span></h1>
                        </div>
                    </div>
                </div>

                <a id="tohash" href="#services"><i class="fa fa-angle-down"></i></a>

            </div><!--/#home-slider-->

            <?php require_once './includes/menu.php'; ?>

        </header><!--/#home-->
        <section id="services">
            <div class="container">
                <div class="heading wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
                    <div class="row">
                        <div class="text-center col-sm-8 col-sm-offset-2">
                            <h2>O que é?</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sit amet vulputate nunc. Vivamus orci nunc, pretium in purus at, eleifend consectetur urna. Etiam convallis finibus tempor. Nam fermentum ipsum sagittis scelerisque scelerisque. Duis interdum id sem eu volutpat. Duis dolor nisi, egestas ut mollis eu, ultrices et enim. In ullamcorper lobortis magna, ut ultrices turpis pretium sit amet. Nullam mattis molestie ex nec cursus. Morbi condimentum, nulla pellentesque lacinia pellentesque, tellus lorem aliquet mi, eu vestibulum ipsum tellus quis leo. Vivamus sed tincidunt orci, in laoreet quam. Fusce eget gravida lorem, ut ornare ipsum.</p>

                            <p>Nunc quam sem, dignissim eu ligula id, ornare bibendum quam. Curabitur tristique varius lacinia. Maecenas ut mi orci. Vivamus efficitur nec odio eget fermentum. Nam hendrerit pellentesque pretium. Curabitur a congue purus, vitae pulvinar turpis. Mauris a lorem molestie, tincidunt sem non, luctus ligula. Sed porttitor, nisl sed lobortis euismod, orci lacus eleifend lacus, eu blandit libero nisi quis lacus. Donec imperdiet vehicula ligula, et lacinia lacus efficitur sed. Mauris eros nulla, condimentum vitae nunc nec, tristique euismod nisi. Donec vitae metus non nunc porta pharetra.</p>

                            <p>Mauris feugiat auctor mi, nec vestibulum nisi convallis sit amet. In hac habitasse platea dictumst. In vel pellentesque est. Integer nisi ligula, hendrerit sed fermentum et, scelerisque quis lorem. Aenean vitae tempor sapien. Vivamus facilisis nunc elit, id volutpat mauris vulputate ac. Sed sodales viverra quam, non pharetra nulla dapibus at. Fusce arcu lacus, volutpat ullamcorper tellus at, commodo condimentum enim. Nulla magna nulla, vulputate at ultricies non, tristique vel dolor. Aliquam nisl mi, porttitor nec erat vel, ultricies condimentum augue. Etiam tellus ante, ullamcorper a urna in, gravida efficitur leo.</p>

                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean commodo hendrerit nisi, nec vestibulum urna ornare rutrum. In eu gravida massa. Nam venenatis neque quis luctus lobortis. Sed blandit porttitor tortor, id ultrices sem lacinia sit amet. Etiam gravida est sed sem euismod vulputate. Donec aliquam magna sed neque lacinia faucibus. Nulla ligula mauris, ultrices ac felis sed, porttitor dignissim enim. Maecenas varius, augue eu gravida mattis, lectus ligula varius diam, ac convallis felis enim in risus. Nulla facilisis ultricies porta. Sed sed erat purus. Curabitur cursus rutrum justo. Aenean convallis, mauris eget euismod fermentum, eros nisl consectetur est, et placerat felis mi at neque. Donec lobortis diam varius tortor hendrerit feugiat. Integer ut convallis tellus.</p>
                        </div>
                    </div> 
                </div>
            </div>
        </section>
<!--        <section id="about-us" class="parallax">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">

                        <div class="about-info wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
                            <h2>Um mundo sem barreiras.</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>-->

        <?php
        require_once 'includes/bodyfooter.php';
        ?>

    </body>
</html>