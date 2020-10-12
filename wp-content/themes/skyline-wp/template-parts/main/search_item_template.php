<div class="h-column h-column-container d-flex h-col-lg-12 h-col-md-12 h-col-12  masonry-item style-140-outer style-local-25-m3-outer">
  <div data-colibri-id="25-m3" class="d-flex h-flex-basis h-column__inner h-px-lg-3 h-px-md-3 h-px-3 v-inner-lg-3 v-inner-md-3 v-inner-3 style-140 style-local-25-m3 position-relative">
    <div class="w-100 h-y-container h-column__content h-column__v-align flex-basis-100 align-self-lg-start align-self-md-start align-self-start">
      <?php colibriwp_layout_wrapper(array (
        'name' => 'categories_container',
        'slug' => 'categories-container-3',
      )); ?>
      <div data-colibri-id="25-m9" class="h-blog-title style-144 style-local-25-m9 position-relative h-element">
        <div class="h-global-transition-all">
          <?php colibriwp_post_title(array (
            'heading_type' => 'h4',
            'classes' => 'colibri-word-wrap',
          )); ?>
        </div>
      </div>
      <?php if ( \ColibriWP\Theme\Core\Hooks::prefixed_apply_filters( 'show_post_meta', true ) ): ?>
      <div data-colibri-id="25-m10" class="h-blog-meta style-619 style-local-25-m10 position-relative h-element">
        <div name="1" class="metadata-item">
          <span class="metadata-prefix">
            <?php esc_html_e('by','skyline-wp'); ?>
          </span>
          <a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) )); ?>">
            <?php echo esc_html(get_the_author_meta( 'display_name', get_the_author_meta( 'ID' ) )); ?>
          </a>
          <span class="meta-separator">| </span>
        </div>
        <div name="2" class="metadata-item">
          <span class="metadata-prefix">
            <?php esc_html_e('on','skyline-wp'); ?>
          </span>
          <a href="<?php colibriwp_post_meta_date_url(); ?>">
            <?php colibriwp_the_date('F j, Y'); ?>
          </a>
        </div>
      </div>
      <?php endif; ?>
      <div data-colibri-id="25-m11" class="style-146 style-local-25-m11 position-relative h-element">
        <div class="h-global-transition-all">
          <?php colibriwp_post_excerpt(array (
            'max_length' => '',
          )); ?>
        </div>
      </div>
      <div data-colibri-id="25-m12" class="h-x-container style-147 style-local-25-m12 position-relative h-element">
        <div class="h-x-container-inner style-dynamic-25-m12-group">
          <span class="h-button__outer style-123-outer style-local-25-m13-outer d-inline-flex h-element">
            <a h-use-smooth-scroll="true" href="<?php the_permalink(); ?>" data-colibri-id="25-m13" class="d-flex w-100 align-items-center h-button justify-content-lg-center justify-content-md-center justify-content-center style-123 style-local-25-m13 position-relative">
              <span>
                <?php esc_html_e('read more','skyline-wp'); ?>
              </span>
              <span class="h-svg-icon h-button__icon style-123-icon style-local-25-m13-icon">
                <!--Icon by Icons8 Line Awesome (https://icons8.com/line-awesome)-->
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="arrow-right" viewBox="0 0 512 545.5">
                  <path d="M299.5 140.5l136 136 11 11.5-11 11.5-136 136-23-23L385 304H64v-32h321L276.5 163.5z"></path>
                </svg>
              </span>
            </a>
          </span>
        </div>
      </div>
    </div>
  </div>
</div>
