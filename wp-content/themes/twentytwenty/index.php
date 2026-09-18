<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

get_header();
?>

<main id="site-content">

	<?php

	$archive_title = '';
	$archive_subtitle = '';

	if (is_search()) {
		/**
		 * @global WP_Query $wp_query WordPress Query object.
		 */
		global $wp_query;

		$archive_title = sprintf(
			'%1$s &ldquo;%2$s&rdquo;',
			'<span class="color-accent">' . __('Search:', 'twentytwenty') . '</span>',
			esc_html(get_search_query(false))
		);

		if ($wp_query->found_posts) {
			$archive_subtitle = sprintf(
				/* translators: %s: Number of search results. */
				_n(
					'We found %s result for your search.',
					'We found %s results for your search.',
					$wp_query->found_posts,
					'twentytwenty'
				),
				number_format_i18n($wp_query->found_posts)
			);
		} else {
			$archive_subtitle = __('We could not find any results for your search. You can give it another try through the search form below.', 'twentytwenty');
		}
	} elseif (is_archive() && !have_posts()) {
		$archive_title = __('Nothing Found', 'twentytwenty');
	} elseif (!is_home()) {
		$archive_title = get_the_archive_title();
		$archive_subtitle = get_the_archive_description();
	}

	if ($archive_title || $archive_subtitle) {
		?>

		<header class="archive-header has-text-align-center header-footer-group">

			<div class="archive-header-inner section-inner medium">

				<?php if ($archive_title) { ?>
					<h1 class="archive-title"><?php echo wp_kses_post($archive_title); ?></h1>
				<?php } ?>

				<?php if ($archive_subtitle) { ?>
					<div class="archive-subtitle section-inner thin max-percentage intro-text">
						<?php echo wp_kses_post(wpautop($archive_subtitle)); ?></div>
				<?php } ?>

			</div><!-- .archive-header-inner -->

		</header><!-- .archive-header -->

		<?php
	}

	if (have_posts()) {
		/*
		 * =====================================================
		 * TRANG TÌM KIẾM
		 * =====================================================
		 */

		if (is_search()) {

			?>

			<div class="search-post-list section-inner">

				<?php while (have_posts()):
					the_post(); ?>

					<article class="search-post-item">

						<!-- ẢNH ĐẠI DIỆN -->
						<div class="search-post-image">

							<a href="<?php the_permalink(); ?>">

								<?php if (has_post_thumbnail()): ?>

									<?php
									the_post_thumbnail(
										'medium',
										array(
											'alt' => esc_attr(get_the_title()),
										)
									);
									?>

								<?php else: ?>

									<div class="search-no-image">
										Không có ảnh
									</div>

								<?php endif; ?>

							</a>

						</div>


						<!-- NGÀY -->
						<div class="search-post-date">

							<span class="search-post-day">
								<?php echo esc_html(get_the_date('d')); ?>
							</span>

							<span class="search-post-month">
								THÁNG <?php echo esc_html(get_the_date('m')); ?>
							</span>

						</div>


						<!-- NỘI DUNG -->
						<div class="search-post-content">

							<h2 class="search-post-title">

								<a href="<?php the_permalink(); ?>">
									<?php the_title(); ?>
								</a>

							</h2>


							<div class="search-post-excerpt">

								<?php
								if (has_excerpt()) {

									the_excerpt();

								} else {

									echo esc_html(
										wp_trim_words(
											get_the_content(),
											30,
											'...'
										)
									);

								}
								?>

							</div>

						</div>

					</article>

				<?php endwhile; ?>

			</div>

			<?php

			/*
			 * Trang chủ:
			 * Hiển thị bài viết theo kiểu danh sách ngày + tiêu đề + mô tả.
			 */
		} elseif (is_home() || is_front_page()) {

			?>

			<div class="homepage-news-list section-inner">

				<?php while (have_posts()):
					the_post(); ?>

					<article class="homepage-news-item">

						<div class="homepage-news-date">

							<span class="homepage-news-day">
								<?php echo esc_html(get_the_date('d')); ?>
							</span>

							<span class="homepage-news-month">
								THÁNG <?php echo esc_html(get_the_date('m')); ?>
							</span>

						</div>

						<div class="homepage-news-content">

							<h2 class="homepage-news-title">

								<a href="<?php the_permalink(); ?>">
									<?php the_title(); ?>
								</a>

							</h2>

							<div class="homepage-news-excerpt">

								<?php
								if (has_excerpt()) {

									the_excerpt();

								} else {

									echo esc_html(
										wp_trim_words(
											get_the_content(),
											30,
											'...'
										)
									);

								}
								?>

							</div>

						</div>

					</article>

				<?php endwhile; ?>

			</div>

			<?php

		} else {

			/*
			 * Các trang khác:
			 * Giữ nguyên giao diện mặc định của Twenty Twenty.
			 */

			$i = 0;

			while (have_posts()) {
				++$i;

				if ($i > 1) {
					echo '<hr class="post-separator styled-separator is-style-wide section-inner" aria-hidden="true" />';
				}

				the_post();

				get_template_part(
					'template-parts/content',
					get_post_type()
				);
			}
		}

	} elseif (is_search()) {
	} elseif (is_search()) {
		?>

		<div class="no-search-results-form section-inner thin">

			<?php
			get_search_form(
				array(
					'aria_label' => __('search again', 'twentytwenty'),
				)
			);
			?>

		</div><!-- .no-search-results -->

		<?php
	}
	?>

	<?php get_template_part('template-parts/pagination'); ?>

</main><!-- #site-content -->

<?php get_template_part('template-parts/footer-menus-widgets'); ?>

<?php
get_footer();
