<?php
function gg_acf_blocks() {
	// check function exists
	if( function_exists('acf_register_block') ) {

		// register a testimonial block
		acf_register_block(array(
			'name'				=> 'faktaboks',
			'title'				=> __('Faktaboks'),
			'description'		=> __('Fullbredde faktaboks med bakgrunnsfarge'),
			'render_callback'	=> 'faktaboks_callback',
			'category'			=> 'common',
			'icon'				=> 'admin-comments',
			'keywords'			=> array( 'fakta', 'boks' ),
		));
		acf_register_block(array(
			'name'				=> 'edited',
			'title'				=> __('Sist endret'),
			'description'		=> __('Viser når innlegget var sist oppdatert'),
			'render_callback'	=> 'edited_callback',
			'category'			=> 'common',
			'icon'				=> 'admin-comments',
			'keywords'			=> array( 'Sist oppdatert', 'endret' ),
		));
		acf_register_block(array(
			'name'				=> 'category_links',
			'title'				=> 'Kategorilinker',
			'description'		=> 'Lister ut linker til kilder i samme underkategori',
			'render_callback'	=> 'category_links_callback',
			'category'			=> 'common',
			'icon'				=> 'admin-comments',
			'keywords'			=> array( 'Linker', 'kategorilinker' ),
		));
	}
}
add_action('acf/init', 'gg_acf_blocks');

function faktaboks_callback( $block, $content = '', $is_preview = false ) {
    $context = Timber::context();
    $context['block'] = $block;
    $context['fields'] = get_fields();
    $context['is_preview'] = $is_preview;
    Timber::render( 'blocks/faktaboks.twig', $context );
}
function edited_callback( $block, $content = '', $is_preview = false, $post_id = 0) {
    $context = Timber::context();
    $context['block'] = $block;
    $context['fields'] = get_fields();
    $context['is_preview'] = $is_preview;
    $context['date'] = get_the_modified_date('d.m.Y', $post_id);
    Timber::render( 'blocks/sist_oppdatert.twig', $context );
}
function category_links_callback( $block, $content = '', $is_preview = false, $post_id = 0) {
    $context = Timber::context();
    $context['block'] = $block;
    $context['fields'] = get_fields();
    $context['is_preview'] = $is_preview;
		$category = get_the_terms($post_id, 'kildetype')[0];
		$context['category'] = $category->name;
    $args = [
      'post_type' => 'sources',
			'tax_query' => [[
					'taxonomy' => 'kildetype',
					'field' => 'name',
					'terms' => $category->name,
				]],
			'order' => 'ASC',
    ];
    $context['related_posts'] = get_posts($args);

    Timber::render( 'blocks/category_links.twig', $context );
}
