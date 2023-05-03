<section id="about" class="parallax-section">
    <div class="container">
        <div class="row">
            <div class="col-md-offset-2 col-md-8 col-sm-offset-1 col-sm-10">
                <div class="wow fadeInUp section-title" data-wow-delay="0.3s">
                    <h2><?= $user['title_about'] ?></h2>
                    <h4><?= $user['subtitle_about'] ?></h4>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="wow fadeInUp col-md-5 col-sm-7" data-wow-delay="0.5s">
                <!-- Flexslider Start -->
                <div class="flexslider">
                    <ul class="slides">
                        <li>
                            <img src="assets/images/slide-img1.jpg" alt="Flexslider">
                        </li>
                        <li>
                            <img src="assets/images/slide-img2.jpg" alt="Flexslider">
                        </li>
                        <li>
                            <img src="assets/images/slide-img3.jpg" alt="Flexslider">
                        </li>
                    </ul>
                </div>
                <!-- Flexslider End -->
            </div>
            <div class="wow fadeInUp col-md-4 col-sm-12" data-wow-delay="0.9s">
                <p><?= $user['desc_about'] ?></p>
            </div>
        </div>
    </div>
</section>