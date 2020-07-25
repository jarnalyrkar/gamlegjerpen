<?php
/* Template Name: Kildearkiv */
$context = Timber::context();
$context['post'] = new Timber\Post();

$context['categories'] = get_terms([
  'taxonomy' => 'kildetype',
  'parent' => 0,
  'meta_key' => 'order',
  'orderby' => 'meta_value_num',
]);

Timber::render('pages/source-archive.twig', $context);
