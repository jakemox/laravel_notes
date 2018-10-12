<!DOCTYPE html>
 <html> 
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="">
  </head>
  <body>

    <form action="" method="post">
    <?= csrf_field() ?>
    <?php foreach($songs as $song) : ?>
      <label for="name_of_song">Name of song</label>
      <input type="text" name="name_of_song" id="name_of_song" value="<?= htmlspecialchars($song->name_of_song)?>">
      <br><br>

      <label for="code_of_video">Code of video</label>
      <input type="text" name="code_of_video" id="code_of_video" value="<?= htmlspecialchars( $song->code_of_video)?>">
      <br><br>

    <?php endforeach; ?>
    <input type="submit" value="Submit">
    
    </form>

  </body>
</html>