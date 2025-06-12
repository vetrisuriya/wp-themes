<section class="block-wrapper">
    <div class="container">
        <div class="row">

            <div class="col-lg-12">
                <div class="error-page text-center col ts-grid-box">
                    <div class="error-message">
                        <h3 class="text-left">Nothing Found</h3>
                    </div>
                    <div class="error-body text-left">
                        <?php
                        if(is_search()) {
                        ?>
                            <h4>Sorry, but nothing matched your search criteria. Please try again with some different keywords.</h4>
                        <?php 
                        } else {
                        ?>
                            <h4>Sorry, No Datas found.</h4>
                        <?php
                        }
                        ?>
                        <a href="<?php echo site_url(); ?>" class="btn btn-primary">Back to Home</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>