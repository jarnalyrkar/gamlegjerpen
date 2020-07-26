<?php
function register_kildetype_taxonomy() {
    $labels = [
      'name'              => 'Kildetyper',
      'singular_name'     => 'Kildetype',
      'search_items'      => 'Søk i kildetyper',
      'all_items'         => 'Alle kildetyper',
      'parent_item'       => 'Hovedkildetype',
      'parent_item_colon' => 'Hovedkildetype:',
      'edit_item'         => 'Endre kildetype',
      'update_item'       => 'Oppdater kildetype',
      'add_new_item'      => 'Lag ny kildetype',
      'new_item_name'     => 'Nytt kildetypenavn',
      'menu_name'         => 'Kildetype',
      ];
    $args = [
      'hierarchical'      => true, // make it hierarchical (like categories)
      'labels'            => $labels,
      'show_ui'           => true,
      'show_admin_column' => true,
      'show_in_rest'      => true,
      'query_var'         => true,
      'rewrite'           => ['slug' => 'kildetype'],
    ];

  register_taxonomy('kildetype', ['sources'], $args);

}

add_action('init', 'register_kildetype_taxonomy');