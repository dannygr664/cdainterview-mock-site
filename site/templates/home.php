<?php
/**
 * Templates render the content of your pages. 
 * They contain the markup together with some control structures like loops or if-statements.
 * The `$page` variable always refers to the currently active page. 
 * To fetch the content from each field we call the field name as a method on the `$page` object, e.g. `$page->title()`.
 * More about templates: https://getkirby.com/docs/guide/templates/basics
 */
?>

<?php snippet('header') ?>

<main>
<header class="intro"
  <?php 
  // we make sure to check if the file exists to prevent errors
  if ($cover = $page->cover()): ?>
    style='background-image: url(<?= $page->cover()->toFile()->url() ?>)'
  <?php endif ?>
>
  <!-- The `or()` method is great to provide a fallback value if a field is empty -->
  <h1><?= $page->heading()->or($page->title()) ?></h1>
</header> 

<div class="text">
  <?= $page->text()->kt() ?>
</div>
</main>

<?php snippet('footer') ?>
