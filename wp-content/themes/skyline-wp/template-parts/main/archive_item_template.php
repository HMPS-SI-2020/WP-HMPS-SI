<div class="<?php colibriwp_print_archive_entry_class("h-column h-column-container d-flex  masonry-item style-110-outer style-local-19-m4-outer");?>" data-masonry-width="<?php colibriwp_print_masonry_col_class(true); ?>">
  <div data-colibri-id="19-m4" class="d-flex h-flex-basis h-column__inner h-px-lg-0 h-px-md-0 h-px-0 v-inner-lg-0 v-inner-md-0 v-inner-0 style-110 style-local-19-m4 h-overflow-hidden position-relative">
    <div class="w-100 h-y-container h-column__content h-column__v-align flex-basis-100 align-self-lg-start align-self-md-start align-self-start">
      <div data-href="<?php the_permalink(); ?>" data-colibri-component="link" data-colibri-id="19-m5" class="colibri-post-thumbnail <?php colibriwp_post_thumbnail_classes(); ?> style-111 style-local-19-m5 h-overflow-hidden position-relative h-element">
        <div class="h-global-transition-all colibri-post-thumbnail-shortcode style-dynamic-19-m5-height">
          <?php colibriwp_post_thumbnail(array (
            'link' => true,
          )); ?>
        </div>
        <div class="colibri-post-thumbnail-content align-items-lg-center align-items-md-center align-items-center flex-basis-100">
          <div class="w-100 h-y-container"></div>
        </div>
      </div>
      <div data-colibri-id="19-m6" class="h-row-container gutters-row-lg-3 gutters-row-md-3 gutters-row-3 gutters-row-v-lg-3 gutters-row-v-md-3 gutters-row-v-3 style-112 style-local-19-m6 position-relative">
        <div class="h-row justify-content-lg-center justify-content-md-start justify-content-center align-items-lg-stretch align-items-md-stretch align-items-stretch gutters-col-lg-3 gutters-col-md-3 gutters-col-3 gutters-col-v-lg-3 gutters-col-v-md-3 gutters-col-v-3">
          <div class="h-column h-column-container d-flex h-col-lg-auto h-col-md-auto h-col-auto style-113-outer style-local-19-m7-outer">
            <div data-colibri-id="19-m7" class="d-flex h-flex-basis h-column__inner h-px-lg-0 h-px-md-0 h-px-0 v-inner-lg-0 v-inner-md-0 v-inner-3 style-113 style-local-19-m7 position-relative">
              <div class="w-100 h-y-container h-column__content h-column__v-align flex-basis-100 align-self-lg-start align-self-md-start align-self-start">
                <?php colibriwp_layout_wrapper(array (
                  'name' => 'categories_container',
                  'slug' => 'categories-container-2',
                )); ?>
                <div data-colibri-id="19-m13" class="h-blog-title style-116 style-local-19-m13 position-relative h-element">
                  <div class="h-global-transition-all">
                    <?php colibriwp_post_title(array (
                      'heading_type' => 'h4',
                      'classes' => 'colibri-word-wrap',
                    )); ?>
                  </div>
                </div>
                <?php if ( \ColibriWP\Theme\Core\Hooks::prefixed_apply_filters( 'show_post_meta', true ) ): ?>
                <div data-colibri-id="19-m14" class="h-blog-meta style-619 style-local-19-m14 position-relative h-element">
                  <div name="1" class="metadata-item">
                    <a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) )); ?>">
                      <?php echo esc_html(get_the_author_meta( 'display_name', get_the_author_meta( 'ID' ) )); ?>
                    </a>
                    <span class="meta-separator">
                      <?php esc_html_e('/','skyline-wp'); ?>
                    </span>
                  </div>
                  <div name="2" class="metadata-item">
                    <a href="<?php colibriwp_post_meta_date_url(); ?>">
                      <?php colibriwp_the_date('F j, Y'); ?>
                    </a>
                    <span class="meta-separator">
                      <?php esc_html_e('/','skyline-wp'); ?>
                    </span>
                  </div>
                  <div name="4" class="metadata-item">
                    <a href="<?php comments_link(); ?>">
                      <?php echo esc_html(get_comments_number()); ?>
                    </a>
                    <span class="metadata-suffix">
                      <?php esc_html_e('comment(s)','skyline-wp'); ?>
                    </span>
                  </div>
                </div>
                <?php endif; ?>
                <div data-colibri-id="19-m15" class="style-117 style-local-19-m15 position-relative h-element">
                  <div class="h-global-transition-all">
                    <?php colibriwp_post_excerpt(array (
                      'max_length' => 38,
                    )); ?>
                  </div>
                </div>
                <div data-colibri-id="19-m16" class="h-x-container style-122 style-local-19-m16 position-relative h-element">
                  <div class="h-x-container-inner style-dynamic-19-m16-group">
                    <span class="h-button__outer style-123-outer style-local-19-m17-outer d-inline-flex h-element">
                      <a h-use-smooth-scroll="true" href="<?php the_permalink(); ?>" data-colibri-id="19-m17" class="d-flex w-100 align-items-center h-button justify-content-lg-center justify-content-md-center justify-content-center style-123 style-local-19-m17 position-relative">
                        <span>
                          <?php esc_html_e('read more','skyline-wp'); ?>
                        </span>
                        <span class="h-svg-icon h-button__icon style-123-icon style-local-19-m17-icon">
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
        </div>
      </div>
    </div>
  </div>
</div>
