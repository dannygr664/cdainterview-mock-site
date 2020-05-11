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
  
  <?php if($success): ?>
    <div class="text">
      <p id="success"><?= $success ?></p>
    </div>
  <?php else: ?>
    <?php if (isset($alert['error'])): ?>
      <div class="text"><p id="general-error"><?= $alert['error'] ?></p></div>
    <?php else: ?>
      <div class="text">
        <div class="contact">
          <p><b><?= $site->author() ?></b></p>
          <p><b>Toll free</b>: <?= $page->phone() ?></p>
          <p><b>Email</b>: <?= $page->email() ?></p>
        </div>
      </div>
    <?php endif ?>
  <?php endif ?>
  
  <form action="<?= $page->url() ?>" method="post">
    <div class="honeypot">
      <label for="website">WEBSITE *</label>
      <input type="website" id="website" name="website">
    </div>  
    
    <label for="name">NAME: *</label><br>
    <input type="text" id="name" name="name" value="<?= $data['name'] ?? '' ?>" required/><br>
    <?= isset($alert['name']) ? '<span class="alert-error">' . html($alert['name']) . '</span><br><br>' : '' ?>
    
    <label for="email">EMAIL ADDRESS: *</label><br>
    <input type="email" id="email" name="email" value="<?= $data['email'] ?? '' ?>" required/><br>
    <?= isset($alert['email']) ? '<span class="alert-error">' . html($alert['email']) . '</span><br><br>' : '' ?>
    
    <label for="inquiry">HOW CAN WE HELP YOU?: *</label><br>
    <textarea name="text" id="text" required><?= $data['text'] ?? '' ?></textarea><br><br>
    <?= isset($alert['text']) ? '<span class="alert-error">' . html($alert['text']) . '</span><br><br>' : '' ?>
    
    <input type="reset" name="reset" id="reset">
    
    <input type="submit" name="submit" value="Submit" id="submit"><br><br>
  </form>

  <div class="text">
    <?= $page->text()->kt() ?>
  </div>
</main>

<?php snippet('footer') ?>
