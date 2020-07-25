<?php

/* Brukes f.eks {{ post.title|findyear }} */
function findyear($title) {
  $stringFix = str_replace("&#8211;", '-', $title);

  if (strpos($stringFix, '-') === false) {
    return substr($stringFix, -4);
  } else {
    return substr($stringFix, -12);
  }

}
