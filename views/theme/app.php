<?php $v->layout('theme/master'); ?>

<div class="dashboard">
  <h1>Olá, <?= $user->first_name; ?></h1>
  <p>Bem-vindo a Dashboard inicial</p>
  <a href="<?= $router->route("app.logoff"); ?>">Sair</a>
</div>

