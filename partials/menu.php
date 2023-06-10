<section id="menu" class="parallax-section">
    <div class="container">
        <div class="row">
            <div class="col-md-offset-2 col-md-8 col-sm-offset-1 col-sm-10">
                <div class="wow fadeInUp section-title" data-wow-delay="0.3s">
                    <h2><?= $user['title_menu'] ?></h2>
                    <h4><?= $user['subtitle_menu'] ?></h4>
                </div>
            </div>
            <?php 
                $query_menu = "SELECT * FROM tbl_menu";
                $run_menu = mysqli_query($db,$query_menu);
                while ($menu = mysqli_fetch_array($run_menu)) {
            ?>
            <!-- Menu Start -->
            <div class="col-md-6 col-sm-12">
                <div class="media wow fadeInUp" data-wow-delay="0.6s">
                    <div class="media-object pull-left">
                        <img src="assets/images/menu/<?= $menu['img_menu'] ?>" class="img-responsive" alt="Food Menu">
                        <span class="menu-price"><?= $menu['price_menu'] ?></span>
                    </div>
                    <div class="media-body">
                        <h3 class="media-heading"><?= $menu['name_menu'] ?></h3>
                        <p><?= $menu['desc_menu'] ?></p>
                    </div>
                </div>
            </div>
            <!-- Menu End -->
            <?php 
            }
            ?>
        </div>
    </div>
</section>