<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Workit</title>
    <?php /* NEW */ ?>
    <meta name="viewport" content="initial-scale=1.0, width=device-width" />
    <link href="https://fonts.googleapis.com/css?family=Istok+Web:400,700&display=swap" rel="stylesheet">
    <?php echo $css;?>
  </head>
  <body>
      <header class="header">
      <?php
        if(!empty($_SESSION['error'])) {
          echo '<div class="error box">' . $_SESSION['error'] . '</div>';
        }
        if(!empty($_SESSION['info'])) {
          echo '<div class="info box">' . $_SESSION['info'] . '</div>';
        }
      ?>
        <h1 class="header__title"><a class="header__title__link" href="index.php?page=home">Workit</a></h1>
      </header>
    <main>
      <?php echo $content;?>
    </main>
    <?php echo $js; ?>
  </body>
</html>
