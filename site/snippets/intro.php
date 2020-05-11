<?php
/**
 * Snippets are a great way to store code snippets for reuse or to keep your templates clean.
 * in loops or simply to keep your templates clean.
 * This intro snippet is reused in multiple templates. While it does not contain much code,
 * it helps to keep your code DRY and thus facilitate maintenance when you have to make changes.
 * More about snippets: https://getkirby.com/docs/guide/templates/snippets
 */
?>

<header class="intro"
<?php 
  // we make sure to check if the file exists to prevent errors
  if ($cover = $page->cover()->toFile()): ?>
    style='background-image: url(<?= $cover->url() ?>)'
  <?php endif ?>
>
  <!-- The `or()` method is great to provide a fallback value if a field is empty -->
  <?php
  if (!$page->heading()->isEmpty()): ?>
    <h1><?= $page->heading() ?><hr/></h1>
  <?php endif ?>
</header> 
