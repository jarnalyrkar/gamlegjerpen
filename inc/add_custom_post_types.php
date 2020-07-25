<?php

function add_gg_custom_post_types() {
  $farm_labels = [
    'name' => 'Gårder',
    'singular_name' => 'Gård',
    'add_new' => 'Legg til ny',
    'add_new_item' => 'Legg til ny gård',
    'edit_item' => 'Endre gård',
    'new_item' => 'Ny gård',
    'view_item' => 'Se gård',
    'view_items' => 'Se gårder',
    'search_items' => 'Søk i gårder',
    'all_items' => 'Alle gårder',
    'archives' => 'Gårder'
  ];

  register_post_type('farms', [
    'public' => true,
    'label' => 'Gårder',
    'labels' => $farm_labels,
    'description' => 'Bruk, underbruk, husmannsplasser etc',
    'hierarchical' => true,
    'menu_icon' => 'dashicons-admin-home',
    'supports' => ['title', 'editor', 'thumbnail', 'page-attributes'],
    'rewrite' => ['slug' => 'garder'],
    'show_in_rest' => true,
    'exclude_from_search' => false,
  ]);

  $kilder_labels = [
    'name' => 'Kilder',
    'singular_name' => 'Kilde',
    'add_new' => 'Legg til ny',
    'add_new_item' => 'Legg til ny kilde',
    'edit_item' => 'Endre kilde',
    'new_item' => 'Ny kilde',
    'view_item' => 'Se kilde',
    'view_items' => 'Se kilder',
    'search_items' => 'Søk i kilder',
    'all_items' => 'Alle kilder',
    'archives' => 'Kilder'
  ];

  register_post_type('sources', [
    'public' => true,
    'label' => 'Kilder',
    'labels' => $kilder_labels,
    'description' => 'Kirkebøker, folketellinger, skattelister, matrikler',
    'hierarchical' => true,
    'menu_icon' => 'dashicons-book-alt',
    'supports' => ['title', 'editor', 'thumbnail'],
    'rewrite' => ['slug' => 'kilder'],
    'show_in_rest' => true,
    'exclude_from_search' => false,
  ]);

}
add_theme_support('post-thumbnails');
add_action('init', 'add_gg_custom_post_types');