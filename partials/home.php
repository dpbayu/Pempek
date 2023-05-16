<section id="home" class="parallax-section carousel slide carousel-fade" data-mdb-ride="carousel">
    <div style="z-index: -1; position: absolute;">
        <img class="mySlides w3-animate-fading" src="assets/images/home-bg-slideshow1.jpg" alt="">
        <img class="mySlides w3-animate-fading" src="assets/images/home-bg-slideshow2.jpg" alt="">
        <img class="mySlides w3-animate-fading" src="assets/images/home-bg-slideshow3.jpg" alt="">
    </div>
    <div class="gradient-overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-offset-2 col-md-8 col-sm-12">
                <h1 class="wow fadeInUp" data-wow-delay="0.6s"><?= $user['title_home'] ?></h1>
                <p class="wow fadeInUp" data-wow-delay="1.0s"><?= $user['subtitle_home'] ?></p>
                <a href="#feature" class="wow fadeInUp btn btn-default hvr-bounce-to-top smoothScroll"
                    data-wow-delay="1.3s">Discover Now</a>
            </div>
        </div>
    </div>
</section>
</div>