<?php
namespace Just_Coded\Theme_Framework\Supports;

/**
 * Class Just_Post_Preview
 *
 * Patch the folder to search custom templates.
 *
 * @package Just_Coded\Theme_Framework\Supports
 */
class Just_Post_Preview {

	/**
	 * Just_Post_Preview constructor.
	 *
	 * Register plugin hooks.
	 */
	public function __construct() {
		add_filter( 'jpp_post_preview_template', array( $this, 'jpp_post_preview_template' ) );
	}

	/**
	 * Add new templates inside /views/ folder
	 *
	 * @param array $templates Templates suggested by plugin.
	 *
	 * @return mixed
	 */
	public function jpp_post_preview_template( $templates ) {
		if ( ! empty( $templates ) ) {
			$template = basename( reset( $templates ) );

			$templates = array_merge( array(
				get_stylesheet_directory() . '/views/just-post-preview/' . $template,
				get_template_directory() . '/views/just-post-preview/' . $template,
			), $templates );
		}

		return $templates;
	}
}
