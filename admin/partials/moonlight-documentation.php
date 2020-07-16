<?php
/**
 * Partial.
 * Modulating the work.
 *
 * @author   LUNCH LADY <support@lunchlady.co>
 * @license  https://www.gnu.org/licenses/gpl-2.0.en.html GPL-2.0
 * @link     https://lunchlady.co/
 * @version  1.0.0
 *
 * @package  LUNCH_LADY\Moonlight
 */

namespace LUNCH_LADY\Moonlight;

wp_enqueue_style( self::ID . '-documentation' );
wp_enqueue_script( self::ID . '-documentation' );

echo '<div class="wrap ' . self::ID . '-documentation">';

	echo '<div id="scroll-up">&nbsp;</div>';

	echo '<div class="header">';

		settings_errors();

		// Silly admin notices hack.
		echo '<h1 class="notices-title"></h1>';

		echo '<div class="container">';

			echo '<div class="logo">';

				echo '<a href="' . esc_url( admin_url( 'plugins.php?page=' . self::ID ) ) . '">';

					echo self::NAME;

				echo '</a>';

			echo '</div>';

			echo '<div class="tagline">';

				echo '<p>';

					esc_html_e( 'All is knoweth as is giveth.', 'moonlight' );

				echo '</p>';

			echo '</div>';

		echo '</div>';

	echo '</div>';

	echo '<div class="main">';

		echo '<div class="container">';

			echo '<div class="search">';

				echo '<div class="search-form">';

					echo '<input class="search-input" id="search-input" onkeyup="menuFilter()" placeholder="Search..." />';

				echo '</div>';

				echo '<hr class="search-break" />';

				echo '<div class="menu-links">';

					echo '<ul id="menu-links">';

						echo '<li filter="Popups">';

							// Popups.

							esc_html_e( 'Popups', 'moonlight' );

							echo '<ul>';

								echo '<li filter="Popups What is a popup?">';

									// What is a popup?.

									echo '<a href="' . esc_url( admin_url( 'plugins.php?page=' . self::ID ) ) . '#what-is-a-popup">';

										esc_html_e( 'What is a popup?', 'moonlight' );

									echo '</a>';

								echo '</li>';

								echo '<li filter="Popups Why are popups used?">';

									// Why are popups used?.

									echo '<a href="' . esc_url( admin_url( 'plugins.php?page=' . self::ID ) ) . '#why-are-popups-used">';

										esc_html_e( 'Why are popups used?', 'moonlight' );

									echo '</a>';

								echo '</li>';

								echo '<li filter="Popups How are popups created?">';

									// How are popups created?.

									echo '<a href="' . esc_url( admin_url( 'plugins.php?page=' . self::ID ) ) . '#how-are-popups-created">';

										esc_html_e( 'How are popups created?', 'moonlight' );

									echo '</a>';

								echo '</li>';

							echo '</ul>';

						echo '</li>';

						echo '<li filter="Implementation">';

							// Implementation.

							esc_html_e( 'Implementation', 'moonlight' );

							echo '<ul>';

								echo '<li filter="Implementation Posts">';

									// Posts.

									echo '<a href="' . esc_url( admin_url( 'plugins.php?page=' . self::ID ) ) . '#posts">';

										esc_html_e( 'Posts', 'moonlight' );

									echo '</a>';

								echo '</li>';

								echo '<li filter="Implementation Blocks">';

									// Blocks.

									echo '<a href="' . esc_url( admin_url( 'plugins.php?page=' . self::ID ) ) . '#blocks">';

										esc_html_e( 'Blocks', 'moonlight' );

									echo '</a>';

								echo '</li>';

								echo '<li filter="Implementation Shortcodes">';

									// Shortcodes.

									echo '<a href="' . esc_url( admin_url( 'plugins.php?page=' . self::ID ) ) . '#shortcodes">';

										esc_html_e( 'Shortcodes', 'moonlight' );

									echo '</a>';

								echo '</li>';

								echo '<li filter="Implementation Auto">';

									// Auto.

									echo '<a href="' . esc_url( admin_url( 'plugins.php?page=' . self::ID ) ) . '#auto">';

										esc_html_e( 'Auto', 'moonlight' );

									echo '</a>';

								echo '</li>';

							echo '</ul>';

						echo '</li>';

						echo '<li filter="Credit">';

							// Credit.

							esc_html_e( 'Credit', 'moonlight' );

							echo '<ul>';

								echo '<li filter="Credit LUNCH LADY">';

									// LUNCH LADY.

									echo '<a href="' . esc_url( admin_url( 'plugins.php?page=' . self::ID ) ) . '#lunch-lady">';

										esc_html_e( 'LUNCH LADY', 'moonlight' );

									echo '</a>';

								echo '</li>';

								echo '<li filter="Credit Fancyapps">';

									// Fancyapps.

									echo '<a href="' . esc_url( admin_url( 'plugins.php?page=' . self::ID ) ) . '#fancyapps">';

										esc_html_e( 'Fancyapps', 'moonlight' );

									echo '</a>';

								echo '</li>';

							echo '</ul>';

						echo '</li>';

					echo '</ul>';

				echo '</div>';

			echo '</div>';

			echo '<div class="content">';

				echo '<div class="title">';

					echo '<div class="container">';

						echo '<div class="tagline">';

							echo '<h6>';

								esc_html_e( 'Always learning.', 'moonlight' );

							echo '</h6>';

						echo '</div>';

						echo '<div class="settings">';

							echo '<ul class="horizontal-list">';

								echo '<li>';

									// Popups.

									echo '<a href="' . esc_url( admin_url( 'edit.php?post_type=' . self::ID . '-popup' ) ) . '" target="_blank">';

										echo '<strong>';

											esc_html_e( 'Popups:', 'moonlight' );

										echo '</strong>';

									echo '</a>';

									echo '<ul class="comma-list">';

										echo '<li>';

											// All Popups.

											echo '<a href="' . esc_url( admin_url( 'edit.php?post_type=' . self::ID . '-popup' ) ) . '" target="_blank">';

												esc_html_e( 'All Popups', 'moonlight' );

											echo '</a>';

										echo '</li>';

										echo '<li>';

											// Add New.

											echo '<a href="' . esc_url( admin_url( 'post-new.php?post_type=' . self::PREFIX . '-popup' ) ) . '" target="_blank">';

												esc_html_e( 'Add New', 'moonlight' );

											echo '</a>';

										echo '</li>';

									echo '</ul>';

								echo '</li>';

							echo '</ul>';

						echo '</div>';

					echo '</div>';

				echo '</div>';

				echo '<div class="articles">';

					echo '<div class="container">';

						// Introduction.

						echo '<h2>';

							esc_html_e( 'Introduction', 'moonlight' );

						echo '</h2>';

						echo '<p>';

							echo sprintf( __( 'Sometimes called a lightbox or modal, this easy to use plugin helps to quickly and efficiently add popups to a WordPress website. Through four different methods of implementation, you’ll be able to add popups throughout your site in whichever way is most convenient for your process.', 'moonlight' ) );

						echo '</p>';

						echo '<hr id="what-is-a-popup" class="section-break" />';

						$title = __( 'What is a popup?', 'moonlight' );
						$description = __( 'Coming soon, an overarching description.', 'moonlight' );
						$details = '';

						echo wp_kses_post( documentation_detail( $title, $description, $details ) );

						echo '<hr id="why-are-popups-used" class="section-break" />';

						$title = __( 'Why are popups used?', 'moonlight' );
						$description = __( 'Coming soon, an overarching description.', 'moonlight' );
						$details = '';

						echo wp_kses_post( documentation_detail( $title, $description, $details ) );

						echo '<hr id="how-are-popups-created" class="section-break" />';

						$title = __( 'How are popups created?', 'moonlight' );
						$description = __( 'Coming soon, an overarching description.', 'moonlight' );
						$details = '';

						echo wp_kses_post( documentation_detail( $title, $description, $details ) );

						echo '<hr id="posts" class="section-break" />';

						$title = __( 'Posts', 'moonlight' );
						$description = __( 'Coming soon, an overarching description.', 'moonlight' );
						$details = array(
							sprintf( __( '%1$sBlocks%2$s', 'moonlight' ), '<h6>', '</h6>' ) => array(
								'<span class="dashicons dashicons-edit"></span> ' . __( 'TBD', 'moonlight' ) => array(
									__( 'A wrapping element block, this is required to engage TBD.', 'moonlight' ),
									__( 'Options', 'moonlight' ) => array(
										__( 'N/A', 'moonlight' ) => array(
											__( 'No need for any custom attributes with this block.', 'moonlight' ),
										),
									),
								),
							),
							sprintf( __( '%1$sShortcodes%2$s', 'moonlight' ), '<h6>', '</h6>' ) => array(
								'[' . self::PREFIX .'_tbd] ' . __( 'CONTENT', 'moonlight' ) . ' [/' . self::PREFIX .'_tbd]' => array(
									__( 'A wrapping element shortcode, this is required to engage TBD.', 'moonlight' ),
									__( 'Options', 'moonlight' ) => array(
										__( 'ID ', 'moonlight' ) . '(id)' => array(
											__( 'An attribute typically used to define the uniqueness of an element.', 'moonlight' ),
										),
										__( 'Class ', 'moonlight' ) . '(class)' => array(
											__( 'An attribute typically used to define styles of an element.', 'moonlight' ),
										),
									),
								),
							),
						);

						echo wp_kses_post( documentation_detail( $title, $description, $details ) );

						echo '<hr id="blocks" class="section-break" />';

						$title = __( 'Blocks', 'moonlight' );
						$description = __( 'Coming soon, an overarching description.', 'moonlight' );
						$details = array(
							sprintf( __( '%1$sBlocks%2$s', 'moonlight' ), '<h6>', '</h6>' ) => array(
								'<span class="dashicons dashicons-edit"></span> ' . __( 'TBD', 'moonlight' ) => array(
									__( 'A wrapping element block, this is required to engage TBD.', 'moonlight' ),
									__( 'Options', 'moonlight' ) => array(
										__( 'N/A', 'moonlight' ) => array(
											__( 'No need for any custom attributes with this block.', 'moonlight' ),
										),
									),
								),
							),
						);

						echo wp_kses_post( documentation_detail( $title, $description, $details ) );

						echo '<hr id="shortcodes" class="section-break" />';

						$title = __( 'Shortcodes', 'moonlight' );
						$description = __( 'Coming soon, an overarching description.', 'moonlight' );
						$details = array(
							sprintf( __( '%1$sShortcodes%2$s', 'moonlight' ), '<h6>', '</h6>' ) => array(
								'[' . self::PREFIX .'_tbd] ' . __( 'CONTENT', 'moonlight' ) . ' [/' . self::PREFIX .'_tbd]' => array(
									__( 'A wrapping element shortcode, this is required to engage TBD.', 'moonlight' ),
									__( 'Options', 'moonlight' ) => array(
										__( 'ID ', 'moonlight' ) . '(id)' => array(
											__( 'An attribute typically used to define the uniqueness of an element.', 'moonlight' ),
										),
										__( 'Class ', 'moonlight' ) . '(class)' => array(
											__( 'An attribute typically used to define styles of an element.', 'moonlight' ),
										),
									),
								),
							),
						);

						echo wp_kses_post( documentation_detail( $title, $description, $details ) );

						echo '<hr id="auto" class="section-break" />';

						$title = __( 'Auto', 'moonlight' );
						$description = __( 'Coming soon, an overarching description.', 'moonlight' );
						$details = array(
							sprintf( __( '%1$sBlocks%2$s', 'moonlight' ), '<h6>', '</h6>' ) => array(
								'<span class="dashicons dashicons-edit"></span> ' . __( 'TBD', 'moonlight' ) => array(
									__( 'A wrapping element block, this is required to engage TBD.', 'moonlight' ),
									__( 'Options', 'moonlight' ) => array(
										__( 'N/A', 'moonlight' ) => array(
											__( 'No need for any custom attributes with this block.', 'moonlight' ),
										),
									),
								),
							),
						);

						echo wp_kses_post( documentation_detail( $title, $description, $details ) );

						echo '<hr id="lunch-lady" class="section-break" />';

						$title = __( 'LUNCH LADY', 'moonlight' );
						$description = __( 'Coming soon, an overarching description.', 'moonlight' );
						$details = '';

						echo wp_kses_post( documentation_detail( $title, $description, $details ) );

						echo '<hr id="fancyapps" class="section-break" />';

						$title = __( 'Fancyapps', 'moonlight' );
						$description = __( 'Coming soon, an overarching description.', 'moonlight' );
						$details = '';

						echo wp_kses_post( documentation_detail( $title, $description, $details ) );

					echo '</div>';

				echo '</div>';

			echo '</div>';

		echo '</div>';

	echo '</div>';

	echo '<a class="scroll-up" href="' . esc_url( admin_url( 'plugins.php?page=' . self::ID ) ) . '#scroll-up">';

		echo '^';

	echo '</a>';

echo '</div>';
