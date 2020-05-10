<?php
/**
 * Templates render the content of your pages. 
 * They contain the markup together with some control structures like loops or if-statements.
 * The `$page` variable always refers to the currently active page. 
 * To fetch the content from each field we call the field name as a method on the `$page` object, e.g. `$page->title()`.
 * This example templates only echos the field values from the content file and doesn't need any special logic from a controller.
 * Snippets like the header, footer and intro contain markup used in multiple templates. They also help to keep templates clean.
 * More about templates: https://getkirby.com/docs/guide/templates/basics
 */
?>

<?php snippet('header') ?>

<main>
  <?php snippet('intro') ?>

  <div class="text">
    
    <div class="contact">
      <p><b><?= $site->author() ?></b></p>
      <p><b>Toll free</b>: <?= $page->phone() ?></p>
      <p><b>Email</b>: <?= $page->email() ?></p>
    </div>
  </div>
  
  <form action="./contact-us_files/mailer.php" method="post" enctype="multipart/form-data" id="contact-form">
    <label for="name">NAME: <abbr title="required">*</abbr></label><br>
    <input type="text" id="name" name="name"/><br>
    <label for="email">EMAIL ADDRESS: <abbr title="required">*<</abbr>/label><br>
    <input type="email" id="email" name="email"/><br>
    <label for="inquiry">HOW CAN WE HELP YOU?: <abbr title="required">*</abbr></label><br>
    <textarea form="contact-form" id="inquiry">
    </textarea><br><br>
    <input type="reset" id="reset-button">
    <input type="submit" value="Submit" id="submit-button"><br><br>
  </form>

  <div class="text">
    <?= $page->text()->kt() ?>
  </div>
</main>

<?php snippet('footer') ?>
