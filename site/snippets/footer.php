<?php
/**
 * Snippets are a great way to store code snippets for reuse or to keep your templates clean.
 * in loops or simply to keep your templates clean.
 * This footer snippet is reused in all templates. In fetches information from the `site.txt` content file
 * and from the `contact` page.
 * More about snippets: https://getkirby.com/docs/guide/templates/snippets
 */
?>

  </div>

  <footer class="footer">
    <p>&copy; 2013-2016 <?= $site->author() ?> All rights reserved.
    <a href="http://www.cdainterview.com/disclaimer-privacy-policy.html">Disclaimer & Privacy Policy</a>
    <a href="mailto:info@bemoacademicconsulting.com">Contact Us</a>
    </p>
    <nav class="social">
      <?php foreach ($site->social()->toStructure() as $social): ?>
      <a href="<?= $social->url() ?>"><?= $social->platform() ?></a>
      <?php endforeach ?>
    </nav>
  </footer>

</body>
</html>
