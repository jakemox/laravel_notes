<?php foreach((array) $songs as $song) : ?>
  <h2><?= $song->name_of_song ?></h2>
  <a href="https://www.youtube.com/watch?v=<?= $song->code_of_video ?>">Link to Youtube video</a><br><br>
  <iframe width="560" height="315" src="https://www.youtube.com/embed/<?= $song->code_of_video ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
<?php endforeach; ?>  