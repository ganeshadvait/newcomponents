<?php
/*
 * Section: new single post design code

 */
 ?>
<?php get_header(); ?>

<main class="custom-single-main">
    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <?php echo do_shortcode('[blocksy_breadcrumbs]'); ?>
    </div>

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article class="custom-single-article">

            <!-- Title -->
            <h1 class="custom-single-title"><?php the_title(); ?></h1>

            <!-- Meta (author, date, category) -->
            <div class="custom-single-meta">
                <span class="author">
                    <img src="<?php echo get_avatar_url(get_the_author_meta('ID')); ?>" alt="<?php the_author(); ?>" class="author-avatar">
                    <?php the_author(); ?>
                </span>
                <span class="date"><?php echo get_the_date(); ?></span>
                <span class="categories">
                    <?php the_category(', '); ?>
                </span>
            </div>

            <!-- Feature Image -->
            <?php if ( has_post_thumbnail() ) : ?>
                <div class="custom-single-feature-img">
                    <?php the_post_thumbnail('full'); ?>
                </div>
            <?php endif; ?>

            <!-- Content + Custom Sidebar -->
            <div class="custom-single-container">
                <div class="custom-single-content">
                    <?php the_content(); ?>
                </div>
                <aside class="custom-single-sidebar">

                    <!-- Doctors (example static; replace with dynamic if needed) -->
                    <div class="custom-sidebar-block doctors">
                  
                          <div class="doctor-card">
                           <div class="doctor-card-row">
                            <img class="doctor-avatar" src="https://randomuser.me/api/portraits/men/32.jpg" alt="Dr. Robert Henry">
                            <div class="doctor-details">
                                <h4 class="doctor-name">Dr. Robert Henry</h4>
                                <div class="doctor-qual">MBBS, MS, FMAS, FISCP, DMAS</div>
                                <div class="doctor-spec">Colorectal Surgeon & Proctologist<br>Speciality: Piles</div>
                                <div class="doctor-exp"><b>Experience:</b> 8 Years</div>
                                <div class="doctor-actions">
                                    <a href="#" class="btn doctor-book">Book an Appointment</a>
                                    <a href="#" class="btn-outline doctor-profile-btn">View Profile</a>
                                </div>
                            </div>
                               </div>
                            </div>

                          <div class="doctor-card">
                            <div class="doctor-card-row">
                             <img class="doctor-avatar" src="https://randomuser.me/api/portraits/men/32.jpg" alt="Dr. Robert Henry">
                             <div class="doctor-details">
                                 <h4 class="doctor-name">Dr. Robert Henry</h4>
                                 <div class="doctor-qual">MBBS, MS, FMAS, FISCP, DMAS</div>
                                 <div class="doctor-spec">Colorectal Surgeon & Proctologist<br>Speciality: Piles</div>
                                 <div class="doctor-exp"><b>Experience:</b> 8 Years</div>
                                 <div class="doctor-actions">
                                     <a href="#" class="btn doctor-book">Book an Appointment</a>
                                     <a href="#" class="btn-outline doctor-profile-btn">View Profile</a>
                                 </div>
                             </div>
                         </div>
                          </div>

                    </div>

                    <!-- Category List -->
                    <div class="custom-sidebar-block categories">
                    <div class="category-header">Category</div>
                    <ul class="category-list">
                        <?php
                        $categories = get_categories();
                        foreach ( $categories as $category ) {
                            echo '<li class="category-item"><a href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . esc_html( $category->name ) . '</a></li>';
                        }
                        ?>
                    </ul>
                    </div>

                     </aside>
                       </div>

            <!-- Similar Blogs Section -->
                        <div class="custom-similar-blogs">
                            <h3>Similar Blogs</h3>
                            <div class="similar-blogs-grid">
                                <?php
                                // Get similar posts by category
                                $categories = wp_get_post_categories($post->ID);
                                $args = array(
                                    'category__in'   => $categories,
                                    'post__not_in'   => array($post->ID),
                                    'posts_per_page' => 3,
                                );
                                $similar_posts = new WP_Query($args);
                                if ($similar_posts->have_posts()):
                                    while ($similar_posts->have_posts()): $similar_posts->the_post(); ?>
                                        <div class="similar-blog-card">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php if (has_post_thumbnail()) {
                                                    the_post_thumbnail('medium');
                                                } ?>
                                                <div class="similar-blog-info">
                                                    <span class="date"><?php echo get_the_date(); ?></span>
                                                    <h4><?php the_title(); ?></h4>
                                                </div>
                                            </a>
                                        </div>
                                    <?php endwhile;
                                    wp_reset_postdata();
                                else: ?>
                                    <p>No similar posts found.</p>
                                <?php endif; ?>
                            </div>
                        </div>

        </article>
    <?php endwhile; endif; ?>
</main>

<?php get_footer(); ?>

