<section id="feature" class="parallax-section">
    <div class="container">
        <div class="row">
            <div class="col-md-offset-2 col-md-8 col-sm-offset-1 col-sm-10">
                <div class="wow fadeInUp section-title" data-wow-delay="0.6s">
                    <h2><?= $user['title_feature'] ?></h2>
                    <h4><?= $user['subtitle_feature'] ?></h4>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="feature-thumb">
                    <div class="feature-icon">
                        <span><img src="assets/images/icon/fork.png" alt="icon" width="50" style="filter: invert(1);"></span>
                    </div>
                    <p><?= $user['desc_feature'] ?></p>
                </div>
            </div>
        </div>
    </div>
</section>