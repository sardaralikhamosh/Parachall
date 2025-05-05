<?php
/**
 * 404 template with Bootstrap
 * @package Parachall
 */

get_header(); ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <div class="card border-danger">
                <div class="card-body py-5">
                    <h1 class="display-1 text-danger">404</h1>
                    <h2 class="card-title"><?php esc_html_e('Page Not Found', 'parachall'); ?></h2>
                    <p class="lead">
                        <?php esc_html_e('The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.', 'parachall'); ?>
                    </p>
                    
                    <div class="mt-4">
                        <?php get_search_form(); ?>
                    </div>
                    
                    <div class="mt-4">
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-primary">
                            <?php esc_html_e('Return to Homepage', 'parachall'); ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>