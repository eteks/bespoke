<?php include "templates/header.php"; ?>
<!-- Portfolio Albums ================================================== -->
<section id="portfolio" class="gallery">
    <div class="container-fluid"> <!-- Start Container -->
        <div class="row"><!-- Start Row-->  
            <?php
            if(!empty($title_detail)) :
            ?>
            <div class="col-sm-4 col-md-4 col-lg-4 nopadding"> <!-- Third Column -->
                <div class="large-box">
                    <div class="hover-bg">
                        <div class="hover-text on">
                            <div class="client-logo">
                                <img src="<?php echo base_url(); ?>assets/img/portfolio/bespoke.png"  alt="...">
                            </div>
                            <div class="ptitle">
                                <a href="<?php echo base_url(); ?>photo_shoot_gallery/<?php echo $title_detail['display_id']; ?>">
                                    <h2> <?php echo $title_detail['display_title']; ?> </h2>
                                </a>
                            </div>
                            <p class="excerpt"><?php echo $title_detail['display_description']; ?></p>
                            <a href="<?php echo base_url(); ?>photo_shoot_gallery/<?php echo $title_detail['display_id']; ?>" class="btn btn-default read-more-btn">
                                <span class="fa fa-bars"></span> View Album
                            </a>
                        </div>
                    </div>
                </div>
            </div> <!-- End Third Column -->
            <?php
            endif;
            ?>
            <?php
            if(!empty($image_album)) :
            foreach ($image_album as $img_alb) :
            ?>
            <div class="col-sm-4 col-md-4 col-lg-4 nopadding"> <!-- First Column -->
                <div class="small-box">
                    <div class="hover-bg">
                        <img src="<?php echo base_url().$img_alb['photo_shoot_upload_image'] ?>" alt="img" class="img-responsive">
                        <?php
                        if(!empty($img_alb['person_groom_name']) && !empty($img_alb['person_bride_name'])) :
                        ?>
                        <a href="<?php echo base_url().$img_alb['photo_shoot_upload_image'] ?>" title="<?php echo $img_alb['person_groom_name']; ?> & <?php echo $img_alb['person_bride_name']; ?>" data-lightbox-gallery="gallery1">
                        <?php
                        else :
                        ?>
                        <a href="<?php echo base_url().$img_alb['photo_shoot_upload_image'] ?>" title="<?php echo $img_alb['person_name']; ?>" data-lightbox-gallery="gallery1">
                        <?php
                        endif;
                        ?>
                            <div class="hover-text animated"></div>
                        </a>
                    </div>
                </div>
            </div> <!-- End First Column -->
            <?php
            endforeach;
            endif;
            ?>
        </div> <!-- End Row -->
        <div class="row"><!-- Start Row -->

                <!-- Previous Album -->
                <div class="col-xs-4 col-sm-4 col-md-4 nopadding">
                    <a href="#">
                        <div class="prev-btn control-nav text-right">

                        </div>
                    </a>
                </div><!-- End Previous Album -->

                <!-- Back to Main Portfolio -->
                <div class="col-xs-4 col-sm-4 col-md-4 nopadding">
                    <a href="<?php echo base_url(); ?>portfolio">
                        <div class="menu-btn control-nav active text-center">
                            <i class="fa fa-bars fa-2x"></i>
                            <h5>Main Portfolio</h5>
                        </div>
                    </a>
                </div><!-- End Back to Main Portfolio -->

                <!-- Next Album -->
                <div class="col-xs-4 col-sm-4 col-md-4 nopadding">
                    <a href="#">
                        <div class="next-btn control-nav">

                        </div>
                    </a>
                </div><!-- End Next Album -->

            </div> <!-- End Row -->
     </div> <!-- End Container -->
     <div class="clearfix"></div>
</section>
<div class="gap"></div>
<?php include "templates/footer.php"; ?>