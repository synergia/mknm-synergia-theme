<?php
/**
 * Generated by the WordPress Meta Box generator
 * at http://jeremyhixon.com/tool/wordpress-meta-box-generator/
 *
 * TODO: POZMIENIAĆ NAZWY!!!
 */
function pokaz_autora_wpisu_get_meta( $value ) {
	global $post;

	$field = get_post_meta( $post->ID, $value, true );
	if ( ! empty( $field ) ) {
		return is_array( $field ) ? stripslashes_deep( $field ) : stripslashes( wp_kses_decode_entities( $field ) );
	} else {
		return false;
	}
}

function pokaz_autora_wpisu_add_meta_box() {
	add_meta_box(
		'blog_post-pokaz-autora-wpisu',
		__( 'Pokaż autora wpisu', 'blog_post' ),
		'pokaz_autora_wpisu_html',
		'post',
		'side',
		'core'
	);
}
add_action( 'add_meta_boxes', 'pokaz_autora_wpisu_add_meta_box' );

function pokaz_autora_wpisu_html( $post) {
	wp_nonce_field( '_pokaz_autora_wpisu_nonce', 'pokaz_autora_wpisu_nonce' ); ?>

	<p>

		<input type="checkbox" name="pokaz_autora_wpisu_show_author_of_post" id="pokaz_autora_wpisu_show_author_of_post" value="show-author-of-post" <?php echo ( pokaz_autora_wpisu_get_meta( 'pokaz_autora_wpisu_show_author_of_post' ) === 'show-author-of-post' ) ? 'checked' : ''; ?>>
		<label for="pokaz_autora_wpisu_show_author_of_post"><?php _e( 'Zaznacz, jeśli autor wpisu ma być widoczny', 'pokaz_autora_wpisu' ); ?></label>	</p><?php
}

function pokaz_autora_wpisu_save( $post_id ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	if ( ! isset( $_POST['pokaz_autora_wpisu_nonce'] ) || ! wp_verify_nonce( $_POST['pokaz_autora_wpisu_nonce'], '_pokaz_autora_wpisu_nonce' ) ) return;
	if ( ! current_user_can( 'edit_post', $post_id ) ) return;

	if ( isset( $_POST['pokaz_autora_wpisu_show_author_of_post'] ) )
		update_post_meta( $post_id, 'pokaz_autora_wpisu_show_author_of_post', esc_attr( $_POST['pokaz_autora_wpisu_show_author_of_post'] ) );
	else
		update_post_meta( $post_id, 'pokaz_autora_wpisu_show_author_of_post', null );
}
add_action( 'save_post', 'pokaz_autora_wpisu_save' );

/*
	Usage: pokaz_autora_wpisu_get_meta( 'pokaz_autora_wpisu_show_author_of_post' )
*/
