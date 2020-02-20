<!DOCTYPE html>
<html lang="pt_BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Auth com PHP</title>

  <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?= asset('/css/style.css'); ?>">
</head>
<body>
  

  <main class="container">

    <?= $v->section('content'); ?>
  </main>

  <script src="<?= asset("/js/jquery-3.4.1.min.js"); ?>"></script>

  <?= $v->section('js'); ?>
</body>
</html>