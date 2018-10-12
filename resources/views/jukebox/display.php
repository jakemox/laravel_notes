<?php foreach((array) $songs as $song) : ?>
  <h2><?= $song->name_of_song ?></h2>
  <a href="https://www.youtube.com/watch?v=<?= $song->code_of_video ?>">Link to Youtube video</a><br><br>
  <a href="http://www.hackathon-jukebox.test/jukebox/edit?id=<?= $song->ID ?>">Edit</a><br><br>
  <a href="http://www.hackathon-jukebox.test/jukebox/delete?id=<?= $song->ID ?>">Delete</a><br><br>
<?php endforeach; ?>