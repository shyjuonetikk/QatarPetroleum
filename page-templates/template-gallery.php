<?php

/**
 * Template Name: QP - Gallery
 * Description: Template for displaying about page
 */

get_header();
?>

    <section id="qp-img-gallery" class="float-left w-100">
        <div class="container">
            <div class="col-xl-12">
                <h2 class="head-clr">Image Gallery</h2>
                <hr>
            </div>
            <div id="qp-gal-img" class="gallery col-xl-12 float-left">
                <div class="col-xl-4 col-md-6 float-left px-2 mb-2">
                    <a href="<?php echo get_template_directory_uri(); ?>/img/img-gal-1.png">
                        <img class="img-fluid qp-gal-img" src="<?php echo get_template_directory_uri(); ?>/img/img-gal-1.png" alt="" title="" />
                    </a>
                    <p class="font-weight-bold">Vivamus mattis mauris sit amet purus elementum ultricies. Donec dictum mi ultricies mauris ultrices</p>
                </div>
                <div class="col-xl-4 col-md-6 float-left px-2 mb-2">
                    <a href="<?php echo get_template_directory_uri(); ?>/img/img-gal-2.png">
                        <img class="img-fluid qp-gal-img" src="<?php echo get_template_directory_uri(); ?>/img/img-gal-2.png" alt="" title=""/>
                    </a>
                    <p class="font-weight-bold">Integer tincidunt, orci a congue auctor, odio risus porttitor sapien</p>
                </div>
                <div class="col-xl-4 col-md-6 float-left px-2 mb-2">
                    <a href="<?php echo get_template_directory_uri(); ?>/img/img-gal-3.png">
                        <img class="img-fluid qp-gal-img" src="<?php echo get_template_directory_uri(); ?>/img/img-gal-3.png" alt="" title=""/>
                    </a>
                    <p class="font-weight-bold">Vestibulum feugiat mi et consequat efficitur. Aenean ex elit, malesuada at efficitur quis, rhoncus sit amet lectus</p>
                </div>
                <div class="col-xl-4 col-md-6 float-left px-2 mb-2">
                    <a href="<?php echo get_template_directory_uri(); ?>/img/img-gal-4.png">
                        <img class="img-fluid qp-gal-img" src="<?php echo get_template_directory_uri(); ?>/img/img-gal-4.png" alt="" title=""/>
                    </a>
                    <p class="font-weight-bold">Vivamus tempor ornare nisi, non dapibus est mollis ac. Vivamus vel vestibulum ligula. Nunc dignissim commodo laoreet</p>
                </div>
                <div class="col-xl-4 col-md-6 float-left px-2 mb-2">
                    <a href="<?php echo get_template_directory_uri(); ?>/img/img-gal-5.png">
                        <img class="img-fluid qp-gal-img" src="<?php echo get_template_directory_uri(); ?>/img/img-gal-5.png" alt="" title=""/>
                    </a>
                    <p class="font-weight-bold">Mauris nec fermentum odio, sit amet scelerisque erat. Aenean congue odio et neque sodales faucibus.</p>
                </div>
                <div class="col-xl-4 col-md-6 float-left px-2 mb-2">
                    <a href="<?php echo get_template_directory_uri(); ?>/img/img-gal-6.png">
                        <img class="img-fluid qp-gal-img" src="<?php echo get_template_directory_uri(); ?>/img/img-gal-6.png" alt="" title=""/>
                    </a>
                    <p class="font-weight-bold">Morbi tincidunt et augue id vehicula</p>
                </div>
            </div>
            <div class="col-12 text-center float-left my-4">
                <button id="qp-img-more" class="btn btn-success prm-clr sec-bg px-3 py-1 border-0">Show More</button>
            </div>
        </div>
    </section>
    <section id="qp-vid-gallery" class="float-left w-100 grey-bg">
        <div class="container">
            <div id="qp-vid-head" class="col-xl-12 float-left">
                <div class="col-md-10 float-left">
                    <h2 class="head-clr">Video gallery</h2>
                </div>
                <div class="col-md-2 float-left">
                    <ul id="qp-vid-list" class="list-inline">
                        <li class="qp-vid-item list-inline-item col-4 m-0 float-left text-center my-1 font-weight-bold head-clr">01</li>
                        <li class="qp-vid-item list-inline-item col-4 m-0 float-left text-center my-1 font-weight-bold head-clr">02</li>
                        <li class="qp-vid-item list-inline-item col-4 m-0 float-left text-center my-1 font-weight-bold head-clr">03</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

<?php get_footer();?>


