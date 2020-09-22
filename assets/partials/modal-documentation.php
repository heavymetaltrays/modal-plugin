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
 * @package  Modal
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

						echo '<li filter="TBD">';

							// TBD.

							esc_html_e( 'TBD', 'modal' );

							echo '<ul>';

								echo '<li filter="TBD What is a tbd?">';

									// What is a tbd?.

									echo '<a href="' . esc_url( admin_url( 'plugins.php?page=' . MODAL_ID ) ) . '#what-is-a-tbd">';

										esc_html_e( 'What is a tbd?', 'modal' );

									echo '</a>';

								echo '</li>';

								echo '<li filter="TBD Why are tbds used?">';

									// Why are tbds used?.

									echo '<a href="' . esc_url( admin_url( 'plugins.php?page=' . MODAL_ID ) ) . '#why-are-tbds-used">';

										esc_html_e( 'Why are tbds used?', 'modal' );

									echo '</a>';

								echo '</li>';

								echo '<li filter="TBD How are tbds created?">';

									// How are tbds created?.

									echo '<a href="' . esc_url( admin_url( 'plugins.php?page=' . MODAL_ID ) ) . '#how-are-tbds-created">';

										esc_html_e( 'How are tbds created?', 'modal' );

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

							echo '</ul>';

						echo '</li>';

						echo '<li filter="Credit">';

							// Credit.

							esc_html_e( 'Credit', 'modal' );

							echo '<ul>';

								echo '<li filter="Credit Fancyapps">';

									// Fancyapps.

									echo '<a href="' . esc_url( admin_url( 'plugins.php?page=' . MODAL_ID ) ) . '#fancyapps">';

										esc_html_e( 'Fancyapps', 'modal' );

									echo '</a>';

								echo '</li>';

								echo '<li filter="Credit LUNCH LADY">';

									// LUNCH LADY.

									echo '<a href="' . esc_url( admin_url( 'plugins.php?page=' . MODAL_ID ) ) . '#lunch-lady">';

										esc_html_e( 'LUNCH LADY', 'modal' );

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

							echo sprintf( __( 'A lightweight plugin meant to quickly and easily implement tbd functionality.', 'modal' ) );

						echo '</p>';

						echo '<hr id="what-is-a-tbd" class="section-break" />';

						$title = __( 'What is a tbd?', 'modal' );
						$description = __( 'This information is tbd.', 'modal' );
						$details = '';

						echo wp_kses_post( documentation_detail( $title, $description, $details ) );

						echo '<hr id="why-are-tbds-used" class="section-break" />';

						$title = __( 'Why are tbds used?', 'modal' );
						$description = __( 'This information is tbd.', 'modal' );
						$details = '';

						echo wp_kses_post( documentation_detail( $title, $description, $details ) );

						echo '<hr id="how-are-tbds-created" class="section-break" />';

						$title = __( 'How are tbds created?', 'modal' );
						$description = __( 'This information is tbd.', 'modal' );
						$details = '';

						echo wp_kses_post( documentation_detail( $title, $description, $details ) );

						echo '<hr id="blocks" class="section-break" />';

						$title = __( 'Blocks', 'modal' );
						$description = __( 'Coming soon, an overarching description.', 'modal' );
						$details = array(
							sprintf( __( '%1$s%3$s TBD%2$s', 'modal' ), '<h6>', '</h6>', '<span class="dashicons dashicons-editor-code"></span>' ) => array(
								__( 'A wrapping element block, this information is tbd.', 'modal' ),
								sprintf( __( '%1$sOptions%2$s', 'modal' ), '<strong>', '</strong>' ) => array(
									__( 'TBD', 'modal' ) => array(
										__( 'This information is tbd.', 'modal' ),
										sprintf( __( '%1$sDefault%2$s: N/A.', 'accordion' ), '<i>', '</i>' ),
										sprintf( __( '%1$sOptions%2$s: A string of characters.', 'accordion' ), '<i>', '</i>' ),
										sprintf( __( '%1$sEX%2$s: tbd.', 'accordion' ), '<i>', '</i>' ),
									),
								),
							),
						);

						echo wp_kses_post( documentation_detail( $title, $description, $details ) );

						echo '<hr id="shortcodes" class="section-break" />';

						$title = __( 'Shortcodes', 'modal' );
						$description = __( 'Coming soon, an overarching description.', 'modal' );
						$details = array(
							sprintf( __( '%1$s %3$s %2$s', 'modal' ), '<h6>', '</h6>', '[' . MODAL_PREFIX .'_tbd]' ) => array(
								__( 'A wrapping element shortcode, this information is tbd.', 'modal' ),
								sprintf( __( '%1$sExample%2$s', 'modal' ), '<strong>', '</strong>' ) => array(
									__( '[' . MODAL_PREFIX .'_tbd tbd=""] CONTENT [/' . MODAL_PREFIX .'_tbd]', 'modal' ),
								),
								sprintf( __( '%1$sOptions%2$s', 'modal' ), '<strong>', '</strong>' ) => array(
									__( 'ID', 'modal' ) . ' (id)' => array(
										__( 'An attribute typically used to define the uniqueness of an element.', 'modal' ),
										sprintf( __( '%1$sDefault%2$s: N/A.', 'accordion' ), '<i>', '</i>' ),
										sprintf( __( '%1$sOptions%2$s: A string of characters.', 'accordion' ), '<i>', '</i>' ),
										sprintf( __( '%1$sEX%2$s: custom-id.', 'accordion' ), '<i>', '</i>' ),
									),
									__( 'Class', 'modal' ) . ' (class)' => array(
										__( 'An attribute typically used to define styles of an element.', 'modal' ),
										sprintf( __( '%1$sDefault%2$s: N/A.', 'accordion' ), '<i>', '</i>' ),
										sprintf( __( '%1$sOptions%2$s: A string of characters.', 'accordion' ), '<i>', '</i>' ),
										sprintf( __( '%1$sEX%2$s: custom-class.', 'accordion' ), '<i>', '</i>' ),
									),
									__( 'TBD', 'modal' ) . ' (tbd)' => array(
										__( 'This information is tbd.', 'modal' ),
										sprintf( __( '%1$sDefault%2$s: N/A.', 'accordion' ), '<i>', '</i>' ),
										sprintf( __( '%1$sOptions%2$s: A string of characters.', 'accordion' ), '<i>', '</i>' ),
										sprintf( __( '%1$sEX%2$s: tbd.', 'accordion' ), '<i>', '</i>' ),
									),
								),
							),
						);

						echo wp_kses_post( documentation_detail( $title, $description, $details ) );

						echo '<hr id="fancyapps" class="section-break" />';

						$title = __( 'Fancyapps', 'modal' );
						$description = sprintf( __( '%1$sFancyapps%2$s is ..', 'modal' ), '<a href="https://fancyapps.com/" target="_blank">', '</a>' );
						$details = '';

						echo wp_kses_post( documentation_detail( $title, $description, $details ) );

						echo '<hr id="lunch-lady" class="section-break" />';

						$title = __( 'LUNCH LADY', 'modal' );
						$description = sprintf( __( '%1$sLUNCH LADY%2$s is an independent digital studio specialized in hyper-custom WordPress assets. This plugin was created by LUNCH LADY to help integrate custom functionality into a modern WordPress website.', 'modal' ), '<a href="http://lunchlady.co" target="_blank">', '</a>' );
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
