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
 * @package  LUNCH_LADY\Modal
 */

namespace LUNCH_LADY\Modal;

wp_enqueue_style( MODAL_ID . '-documentation' );
wp_enqueue_script( MODAL_ID . '-documentation' );

echo '<div class="wrap ' . MODAL_ID . '-documentation">';

	echo '<div id="scroll-up">&nbsp;</div>';

	echo '<div class="header">';

		settings_errors();

		// Silly admin notices hack.
		echo '<h1 class="notices-title"></h1>';

		echo '<div class="container">';

			echo '<div class="logo">';

				echo '<a href="' . esc_url( admin_url( 'plugins.php?page=' . MODAL_ID ) ) . '">';

					echo MODAL_NAME;

				echo '</a>';

			echo '</div>';

			echo '<div class="tagline">';

				echo '<p>';

					esc_html_e( 'All is knoweth as is giveth.', 'modal' );

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

						echo '<li filter="Modals">';

							// Modals.

							esc_html_e( 'Modals', 'modal' );

							echo '<ul>';

								echo '<li filter="Modals What is a modal?">';

									// What is a modal?.

									echo '<a href="' . esc_url( admin_url( 'plugins.php?page=' . MODAL_ID ) ) . '#what-is-a-modal">';

										esc_html_e( 'What is a modal?', 'modal' );

									echo '</a>';

								echo '</li>';

								echo '<li filter="Modals Why are modals used?">';

									// Why are modals used?.

									echo '<a href="' . esc_url( admin_url( 'plugins.php?page=' . MODAL_ID ) ) . '#why-are-modals-used">';

										esc_html_e( 'Why are modals used?', 'modal' );

									echo '</a>';

								echo '</li>';

								echo '<li filter="Modals How are modals created?">';

									// How are modals created?.

									echo '<a href="' . esc_url( admin_url( 'plugins.php?page=' . MODAL_ID ) ) . '#how-are-modals-created">';

										esc_html_e( 'How are modals created?', 'modal' );

									echo '</a>';

								echo '</li>';

							echo '</ul>';

						echo '</li>';

						echo '<li filter="Implementation">';

							// Implementation.

							esc_html_e( 'Implementation', 'modal' );

							echo '<ul>';

								echo '<li filter="Implementation Blocks">';

									// Blocks.

									echo '<a href="' . esc_url( admin_url( 'plugins.php?page=' . MODAL_ID ) ) . '#blocks">';

										esc_html_e( 'Blocks', 'modal' );

									echo '</a>';

								echo '</li>';

								echo '<li filter="Implementation Shortcodes">';

									// Shortcodes.

									echo '<a href="' . esc_url( admin_url( 'plugins.php?page=' . MODAL_ID ) ) . '#shortcodes">';

										esc_html_e( 'Shortcodes', 'modal' );

									echo '</a>';

								echo '</li>';

								echo '<li filter="Implementation Auto">';

									// Auto.

									echo '<a href="' . esc_url( admin_url( 'plugins.php?page=' . MODAL_ID ) ) . '#auto">';

										esc_html_e( 'Auto', 'modal' );

									echo '</a>';

								echo '</li>';

							echo '</ul>';

						echo '</li>';

						echo '<li filter="Credit">';

							// Credit.

							esc_html_e( 'Credit', 'modal' );

							echo '<ul>';

								echo '<li filter="Credit LUNCH LADY">';

									// LUNCH LADY.

									echo '<a href="' . esc_url( admin_url( 'plugins.php?page=' . MODAL_ID ) ) . '#lunch-lady">';

										esc_html_e( 'LUNCH LADY', 'modal' );

									echo '</a>';

								echo '</li>';

								echo '<li filter="Credit Fancyapps">';

									// Fancyapps.

									echo '<a href="' . esc_url( admin_url( 'plugins.php?page=' . MODAL_ID ) ) . '#fancyapps">';

										esc_html_e( 'Fancyapps', 'modal' );

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

								esc_html_e( 'Always learning.', 'modal' );

							echo '</h6>';

						echo '</div>';

						echo '<div class="settings">';

							echo '<ul class="horizontal-list">';

								echo '<li>';

									// Settings.

									echo '<strong>';

										esc_html_e( 'Settings:', 'modal' );

									echo '</strong>';

									echo '<ul class="comma-list">';

										echo '<li>';

											// N/A.

											esc_html_e( 'N/A', 'modal' );

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

							esc_html_e( 'Introduction', 'modal' );

						echo '</h2>';

						echo '<p>';

							echo sprintf( __( 'Sometimes called a lightbox or popups, this easy to use plugin helps to quickly and efficiently add modals to a WordPress website. Through three different methods of implementation, you’ll be able to add modals throughout your site in whichever way is most convenient for your process.', 'modal' ) );

						echo '</p>';

						echo '<hr id="what-is-a-modal" class="section-break" />';

						$title = __( 'What is a modal?', 'modal' );
						$description = __( 'Coming soon, an overarching description.', 'modal' );
						$details = '';

						echo wp_kses_post( documentation_detail( $title, $description, $details ) );

						echo '<hr id="why-are-modals-used" class="section-break" />';

						$title = __( 'Why are modals used?', 'modal' );
						$description = __( 'Coming soon, an overarching description.', 'modal' );
						$details = '';

						echo wp_kses_post( documentation_detail( $title, $description, $details ) );

						echo '<hr id="how-are-modals-created" class="section-break" />';

						$title = __( 'How are modals created?', 'modal' );
						$description = __( 'Coming soon, an overarching description.', 'modal' );
						$details = '';

						echo wp_kses_post( documentation_detail( $title, $description, $details ) );

						echo '<hr id="blocks" class="section-break" />';

						$title = __( 'Blocks', 'modal' );
						$description = __( 'Coming soon, an overarching description.', 'modal' );
						$details = array(
							sprintf( __( '%1$sBlocks%2$s', 'modal' ), '<h6>', '</h6>' ) => array(
								'<span class="dashicons dashicons-edit"></span> ' . __( 'TBD', 'modal' ) => array(
									__( 'A wrapping element block, this is required to engage TBD.', 'modal' ),
									__( 'Options', 'modal' ) => array(
										__( 'N/A', 'modal' ) => array(
											__( 'No need for any custom attributes with this block.', 'modal' ),
										),
									),
								),
							),
						);

						echo wp_kses_post( documentation_detail( $title, $description, $details ) );

						echo '<hr id="shortcodes" class="section-break" />';

						$title = __( 'Shortcodes', 'modal' );
						$description = __( 'Coming soon, an overarching description.', 'modal' );
						$details = array(
							sprintf( __( '%1$sShortcodes%2$s', 'modal' ), '<h6>', '</h6>' ) => array(
								'[' . MODAL_PREFIX .'_tbd] ' . __( 'CONTENT', 'modal' ) . ' [/' . MODAL_PREFIX .'_tbd]' => array(
									__( 'A wrapping element shortcode, this is required to engage TBD.', 'modal' ),
									__( 'Options', 'modal' ) => array(
										__( 'ID ', 'modal' ) . '(id)' => array(
											__( 'An attribute typically used to define the uniqueness of an element.', 'modal' ),
										),
										__( 'Class ', 'modal' ) . '(class)' => array(
											__( 'An attribute typically used to define styles of an element.', 'modal' ),
										),
									),
								),
							),
						);

						echo wp_kses_post( documentation_detail( $title, $description, $details ) );

						echo '<hr id="auto" class="section-break" />';

						$title = __( 'Auto', 'modal' );
						$description = __( 'Coming soon, an overarching description.', 'modal' );
						$details = array(
							sprintf( __( '%1$sBlocks%2$s', 'modal' ), '<h6>', '</h6>' ) => array(
								'<span class="dashicons dashicons-edit"></span> ' . __( 'TBD', 'modal' ) => array(
									__( 'A wrapping element block, this is required to engage TBD.', 'modal' ),
									__( 'Options', 'modal' ) => array(
										__( 'N/A', 'modal' ) => array(
											__( 'No need for any custom attributes with this block.', 'modal' ),
										),
									),
								),
							),
						);

						echo wp_kses_post( documentation_detail( $title, $description, $details ) );

						echo '<hr id="lunch-lady" class="section-break" />';

						$title = __( 'LUNCH LADY', 'modal' );
						$description = __( 'Coming soon, an overarching description.', 'modal' );
						$details = '';

						echo wp_kses_post( documentation_detail( $title, $description, $details ) );

						echo '<hr id="fancyapps" class="section-break" />';

						$title = __( 'Fancyapps', 'modal' );
						$description = __( 'Coming soon, an overarching description.', 'modal' );
						$details = '';

						echo wp_kses_post( documentation_detail( $title, $description, $details ) );

					echo '</div>';

				echo '</div>';

			echo '</div>';

		echo '</div>';

	echo '</div>';

	echo '<a class="scroll-up" href="' . esc_url( admin_url( 'plugins.php?page=' . MODAL_ID ) ) . '#scroll-up">';

		echo '^';

	echo '</a>';

echo '</div>';
