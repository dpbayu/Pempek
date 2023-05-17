<section id="menu" class="parallax-section">
    <div class="container">
        <div class="row">
            <div class="col-md-offset-2 col-md-8 col-sm-offset-1 col-sm-10">
                <div class="wow fadeInUp section-title" data-wow-delay="0.3s">
                    <h2><?= $user['title_menu'] ?></h2>
                    <h4><?= $user['subtitle_menu'] ?></h4>
                </div>
            </div>
            <!-- Menu Start -->
            <div class="col-md-6 col-sm-12">
                <div class="media wow fadeInUp" data-wow-delay="0.6s">
                    <div class="media-object pull-left">
                        <img src="assets/images/gallery-img1.jpg" class="img-responsive" alt="Food Menu">
                        <span class="menu-price"><?= $user['price_menu'] ?></span>
                    </div>
                    <div class="media-body">
                        <h3 class="media-heading"><?= $user['name_menu'] ?></h3>
                        <p><?= $user['desc_menu'] ?></p>
                    </div>
                </div>
            </div>
            <!-- Menu End -->
        </div>
    </div>
</section>