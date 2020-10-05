<?php
include "config.php";
$news = $bdd->query('SELECT * FROM news ORDER BY date_news DESC');
?>
<h3>news</h3>
<br />
   <ul>
      <?php while($a = $news->fetch()) { ?>
      <li><a href="include/affichage_news.php?id_news=<?= $a['id_news'] ?>"><?= $a['titre_news'].' le '.$a['date_news'] ?></a></li>
      <?php } ?>
   <ul>