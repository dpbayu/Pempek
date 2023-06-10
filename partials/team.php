<section id="team" class="parallax-section">
    <div class="container">
        <div class="row">
            <div class="col-md-offset-2 col-md-8 col-sm-offset-1 col-sm-10">
                <div class="wow fadeInUp section-title" data-wow-delay="0.3s">
                    <h2><?= $user['title_team'] ?></h2>
                    <h4><?= $user['subtitle_team'] ?></h4>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-9">
                    <?php 
                        $query_ = "SELECT * FROM tbl_team";
                        $run_team = mysqli_query($db,$query_);
                        while ($team = mysqli_fetch_array($run_team)) {
                    ?>
                    <!-- Content Team Start -->
                    <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-delay="0.4s">
                        <div class="team-thumb mb-5">
                            <img src="assets/images/team/<?= $team['img_team'] ?>" class="img-responsive" alt="Team">
                            <div class="team-des">
                                <h3><?= $team['name_team'] ?></h3>
                                <h4><?= $team['job_team'] ?></h4>
                                <ul class="social-icon">
                                    <li><a href="whatsapp://send?text=Hello&phone=+62<?= $team['phone_team'] ?>"
                                            class="fa fa-whatsapp"></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Content Team End -->
                    <?php 
                    }
                    ?>
                </div>
                <div class="col-md-3 col-sm-6 wow fadeInUp" data-wow-delay="1.1s">
                    <div class="join-team">
                        <i class="fa fa-plus"></i>
                        <p>Fusce interdum libero id libero volutpat varius convallis at sem.</p>
                        <a href="#" class="btn btn-default hvr-bounce-to-bottom">JOIN US</a>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="wow fadeInUp col-md-6 col-sm-6" data-wow-delay="0.3s">
                <p><?= $user['desc_taste'] ?></p>
            </div>
            <div class="wow fadeInUp col-md-6 col-sm-6" data-wow-delay="0.6s">
                <p><?= $user['desc_service'] ?></p>
            </div>
        </div>
    </div>
</section>