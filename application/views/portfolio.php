<?php include "templates/header.php"; ?>
<!-- Portfolio Section ================================================== -->
<section id="portfolio" class="albums"> 
    <div class="container-fluid"> <!-- Start Container -->
            <?php
            if(!empty($photo_gallery)) :
                $a =1 ;
            foreach ($photo_gallery as $pho_key => $pho_data) :
            ?>
            <div class="row"> <!-- Start Row -->
            <?php
            if($a %2 == 0) :
            ?>
            <div class="col-sm-4 col-md-4 col-lg-4 nopadding"> <!-- First Column -->
                <div class="large-box">
                    <div class="hover-bg">
                        <div class="hover-text on">
                            <div class="client-logo">
                                <img src="<?php echo base_url(); ?>assets/img/portfolio/bespoke.png"  alt="...">
                            </div>
                            <div class="ptitle">
                                <a href="<?php echo base_url(); ?>photo_shoot_gallery/<?php echo $pho_key; ?>">
                                    <h2> <?php echo $pho_data['display_title']; ?> </h2>
                                </a>
                            </div>
                            <p class="excerpt"><?php echo $pho_data['display_description']; ?></p>
                            <a href="<?php echo base_url(); ?>photo_shoot_gallery/<?php echo $pho_key; ?>" class="btn btn-default read-more-btn">
                                <span class="fa fa-bars"></span>View Album
                            </a>
                        </div>
                    </div>
                </div>
            </div> <!-- End First Column -->
            <?php
            endif;
            ?>
            <div class="col-sm-8 col-md-4 col-lg-8 nopadding">
                <?php
                $max_limit = 1;
                foreach ($pho_data['person_id'] as $per_key => $per_data) :
                if($max_limit <= 4) :
                ?>
                <div class="col-sm-6 col-md-4 col-lg-6 nopadding"> <!-- First Column -->
                    <div class="small-box">
                        <div class="hover-bg">
                            <img src="<?php echo base_url().$per_data['photo_shoot_upload_image'] ?>" alt="img" class="img-responsive">
                            <div class="hover-text animated">
                                <?php
                                if(!empty($per_data['person_groom_name']) && !empty($per_data['person_bride_name'])) :
                                ?>
                                <div class="ptitle">
                                    <a>
                                        <h2> <?php echo $per_data['person_groom_name']; ?> & <?php echo $per_data['person_bride_name']; ?></h2>
                                    </a>
                                </div>
                                <?php
                                else :
                                ?>
                                <div class="ptitle">
                                    <a>
                                        <h2> <?php echo $per_data['person_name']; ?> </h2>
                                    </a>
                                </div>
                                <?php
                                endif;
                                ?>
                                <p class="excerpt"><?php echo $per_data['person_address']; ?> </p>
                                <a href="<?php echo base_url(); ?>photo_shoot_gallery/<?php echo $pho_key; ?>" class="btn btn-default read-more-btn">
                                    <span class="fa fa-bars"></span>View More
                                </a>
                            </div>
                        </div>
                    </div>
                </div> <!-- End First Column -->
                <?php
                endif;
                $max_limit++;
                endforeach;
                ?>
            </div> <!-- small box -->
            <?php
            if($a %2 != 0) :
            ?>
            <div class="col-sm-4 col-md-4 col-lg-4 nopadding"> <!-- First Column -->
                <div class="large-box">
                    <div class="hover-bg">
                        <div class="hover-text on">
                            <div class="client-logo">
                                <img src="<?php echo base_url(); ?>assets/img/portfolio/bespoke.png"  alt="...">
                            </div>
                            <div class="ptitle">
                                <a href="<?php echo base_url(); ?>photo_shoot_gallery/<?php echo $pho_key; ?>">
                                    <h2> <?php echo $pho_data['display_title']; ?> </h2>
                                </a>
                            </div>
                            <p class="excerpt"><?php echo $pho_data['display_description']; ?></p>
                            <a href="<?php echo base_url(); ?>photo_shoot_gallery/<?php echo $pho_key; ?>" class="btn btn-default read-more-btn">
                                <span class="fa fa-bars"></span>View Album
                            </a>
                        </div>
                    </div>
                </div>
            </div> <!-- End First Column -->
            <?php
            endif;
            $a++;
            ?>
            </div>
            <?php
            endforeach;
            endif;
            ?>
        </div>    
    </div> <!-- End Container -->
    <div class="clearfix"></div>
</section>
<?php include "templates/footer.php"; ?>