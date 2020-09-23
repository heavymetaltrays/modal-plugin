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

						echo '<li filter="Modal">';

							// Modal.

							esc_html_e( 'Modal', 'modal' );

							echo '<ul>';

								echo '<li filter="Modal What is a modal?">';

									// What is a modal?.

									echo '<a href="' . esc_url( admin_url( 'plugins.php?page=' . MODAL_ID ) ) . '#what-is-a-modal">';

										esc_html_e( 'What is a modal?', 'modal' );

									echo '</a>';

								echo '</li>';

								echo '<li filter="Modal Why are modals used?">';

									// Why are modals used?.

									echo '<a href="' . esc_url( admin_url( 'plugins.php?page=' . MODAL_ID ) ) . '#why-are-modals-used">';

										esc_html_e( 'Why are modals used?', 'modal' );

									echo '</a>';

								echo '</li>';

								echo '<li filter="Modal How are modals created?">';

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

								echo '<li filter="Implementation Etc">';

									// Etc.

									echo '<a href="' . esc_url( admin_url( 'plugins.php?page=' . MODAL_ID ) ) . '#etc">';

										esc_html_e( 'Etc', 'modal' );

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

							echo sprintf( __( 'A lightweight plugin meant to quickly and easily implement modal functionality. This plugin integrates the "Fancybox" JavaScript library from the company Fancyapps in order to help create it\'s modal functionality.', 'modal' ) );

						echo '</p>';

						echo '<hr id="what-is-a-modal" class="section-break" />';

						$title = __( 'What is a modal?', 'modal' );
						$description = __( 'This information is tbd.', 'modal' );
						$details = '';

						echo wp_kses_post( documentation_detail( $title, $description, $details ) );

						echo '<hr id="why-are-modals-used" class="section-break" />';

						$title = __( 'Why are modals used?', 'modal' );
						$description = __( 'This information is tbd.', 'modal' );
						$details = '';

						echo wp_kses_post( documentation_detail( $title, $description, $details ) );

						echo '<hr id="how-are-modals-created" class="section-break" />';

						$title = __( 'How are modals created?', 'modal' );
						$description = __( 'This information is tbd.', 'modal' );
						$details = '';

						echo wp_kses_post( documentation_detail( $title, $description, $details ) );

						echo '<hr id="blocks" class="section-break" />';

						$title = __( 'Blocks', 'modal' );
						$description = sprintf( __( '%1$sBlocks%2$s are components for adding content where blocks have been given the applicability. The following documentation contains the blocks that have been made available within this plugin.', 'modal' ), '<a href="https://wordpress.org/support/article/blocks/" target="_blank"> ', '</a>' );
						$details = array(
							sprintf( __( '%1$s%3$s TBD%2$s', 'modal' ), '<h6>', '</h6>', '<span class="dashicons dashicons-editor-code"></span>' ) => array(
								__( 'A wrapping element block, this information is tbd.', 'modal' ),
								sprintf( __( '%1$sOptions%2$s', 'modal' ), '<strong>', '</strong>' ) => array(
									__( 'TBD', 'modal' ) => array(
										__( 'This information is tbd.', 'modal' ),
										sprintf( __( '%1$sDefault%2$s: N/A.', 'modal' ), '<i>', '</i>' ),
										sprintf( __( '%1$sOptions%2$s: A string of characters.', 'modal' ), '<i>', '</i>' ),
										sprintf( __( '%1$sEX%2$s: tbd.', 'modal' ), '<i>', '</i>' ),
									),
								),
							),
						);

						echo wp_kses_post( documentation_detail( $title, $description, $details ) );

						echo '<hr id="shortcodes" class="section-break" />';

						$title = __( 'Shortcodes', 'modal' );
						$description = sprintf( __( '%1$sShortcodes%2$s are components for adding content where shortcodes have been given the applicability. The following documentation contains the shortcodes that have been made available within this plugin.', 'modal' ), '<a href="https://codex.wordpress.org/Shortcode" target="_blank"> ', '</a>' );
						$details = array(
							sprintf( __( '%1$s %3$s %2$s', 'modal' ), '<h6>', '</h6>', '[' . MODAL_PREFIX .'_tbd]' ) => array(
								__( 'A wrapping element shortcode, this information is tbd.', 'modal' ),
								sprintf( __( '%1$sExample%2$s', 'modal' ), '<strong>', '</strong>' ) => array(
									__( '[' . MODAL_PREFIX .'_tbd tbd=""] CONTENT [/' . MODAL_PREFIX .'_tbd]', 'modal' ),
								),
								sprintf( __( '%1$sOptions%2$s', 'modal' ), '<strong>', '</strong>' ) => array(
									__( 'ID', 'modal' ) . ' (id)' => array(
										__( 'An attribute typically used to define the uniqueness of an element.', 'modal' ),
										sprintf( __( '%1$sDefault%2$s: N/A.', 'modal' ), '<i>', '</i>' ),
										sprintf( __( '%1$sOptions%2$s: A string of characters.', 'modal' ), '<i>', '</i>' ),
										sprintf( __( '%1$sEX%2$s: custom-id.', 'modal' ), '<i>', '</i>' ),
									),
									__( 'Class', 'modal' ) . ' (class)' => array(
										__( 'An attribute typically used to define styles of an element.', 'modal' ),
										sprintf( __( '%1$sDefault%2$s: N/A.', 'modal' ), '<i>', '</i>' ),
										sprintf( __( '%1$sOptions%2$s: A string of characters.', 'modal' ), '<i>', '</i>' ),
										sprintf( __( '%1$sEX%2$s: custom-class.', 'modal' ), '<i>', '</i>' ),
									),
									__( 'TBD', 'modal' ) . ' (tbd)' => array(
										__( 'This information is tbd.', 'modal' ),
										sprintf( __( '%1$sDefault%2$s: N/A.', 'modal' ), '<i>', '</i>' ),
										sprintf( __( '%1$sOptions%2$s: A string of characters.', 'modal' ), '<i>', '</i>' ),
										sprintf( __( '%1$sEX%2$s: tbd.', 'modal' ), '<i>', '</i>' ),
									),
								),
							),
						);

						echo wp_kses_post( documentation_detail( $title, $description, $details ) );

						echo '<hr id="etc" class="section-break" />';

						$title = __( 'Etc', 'modal' );
						$description = sprintf( __( 'Etc refers to the miscellaneous capabilities that this plugin includes within a website. The following documentation contains the capabilities that have been made available within this plugin.', 'modal' ), '<a href="https://codex.wordpress.org/Shortcode" target="_blank"> ', '</a>' );
						$details = array(
							sprintf( __( '%1$sURL Parameter "modal"%2$s', 'modal' ), '<h6>', '</h6>' ) => array(
								__( 'A URL parameter is a string found within a URL. By adding "modal=paired-id" within a URL the targeted modal will automatically be given an "active" state.', 'modal' ),
								sprintf( __( '%1$sExample%2$s', 'modal' ), '<strong>', '</strong>' ) => array(
									__( site_url() . '/?modal=999999', 'modaln' ),
								),
							),
							sprintf( __( '%1$sAuto "data-fancybox"%2$s', 'modal' ), '<h6>', '</h6>' ) => array(
								__( 'While this plugin is active, it automatically adds the attribute "data-fancybox" to all site links that are meant to open a media file.', 'modal' ),
								sprintf( __( '%1$sExample%2$s', 'modal' ), '<strong>', '</strong>' ) => array(
									__( '&lt;a href="' . site_url() . '/image.jpg" data-fancybox&gt;&lt;/a&gt;', 'modaln' ),
								),
								sprintf( __( '%1$sOptions%2$s', 'modal' ), '<strong>', '</strong>' ) => array(
									__( 'Ignore', 'modal' ) => array(
										__( 'If you\'d like to prevent the automatic modal functionality on a linked media file, simple add the class "ignore-fancybox."', 'modal' ),
										sprintf( __( '%1$sEX%2$s: class="ignore-fancybox"', 'modal' ), '<i>', '</i>' ),
									),
									__( 'Group', 'modal' ) => array(
										__( 'If you\'d like to group a series of modals you can add a value to the data-fancybox attribute.', 'modal' ),
										sprintf( __( '%1$sEX%2$s: data-fancybox="group-one"', 'modal' ), '<i>', '</i>' ),
									),
									__( 'Google Map', 'modal' ) => array(
										__( 'If you\'d like to make a modal with a Google Map you can do so with the map URL, the shortend URL will not work.', 'modal' ),
										sprintf( __( '%1$sEX%2$s: href="https://www.google.com/maps/place/..."', 'modal' ), '<i>', '</i>' ),
									),
									__( 'Dimensions', 'modal' ) => array(
										__( 'If you\'d like to specify the dimensions of a modal you can add data-width and data-height attributes.', 'modal' ),
										sprintf( __( '%1$sEX%2$s: data-width="540" data-height="360"', 'modal' ), '<i>', '</i>' ),
									),
									__( 'Caption', 'modal' ) => array(
										__( 'If you\'d like to add a caption under your modal you can add the attribute data-caption.', 'modal' ),
										sprintf( __( '%1$sEX%2$s: data-caption="A really great photo."', 'modal' ), '<i>', '</i>' ),
									),
									__( 'Cont.', 'modal' ) => array(
										__( 'If you\'d like to find more options, visit the fancybox website.', 'modal' ),
										sprintf( __( '%1$sEX%2$s: https://fancyapps.com/fancybox/3/."', 'modal' ), '<i>', '</i>' ),
									),
								),
							),
						);

						echo wp_kses_post( documentation_detail( $title, $description, $details ) );

						echo '<hr id="fancyapps" class="section-break" />';

						$title = __( 'Fancyapps', 'modal' );
						$description = sprintf( __( '%1$sFancyapps%2$s is a small web development shop specialized in JavaScript. They are kind enough to produce and maintain code libraries that are open-source and free for public use.', 'modal' ), '<a href="https://fancyapps.com/" target="_blank">', '</a>' );
						$details = '';

						echo wp_kses_post( documentation_detail( $title, $description, $details ) );

						echo '<hr id="lunch-lady" class="section-break" />';

						$title = __( 'LUNCH LADY', 'modal' );
						$description = sprintf( __( '%1$sLUNCH LADY%2$s is an independent digital studio specialized in hyper-custom WordPress assets. This plugin was created by LUNCH LADY to help integrate custom functionality into a WordPress website.', 'modal' ), '<a href="http://lunchlady.co" target="_blank">', '</a>' );
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
