<?php $v->layout('theme/master'); ?>

<div class="common_form">

  <h1>Cadastrar</h1>

  <div class="response_callback"></div>
  
  <form action="<?= $router->route("auth.register"); ?>" method="post">
    <label for="first_name">Primeiro nome</label>
    <input type="text" name="first_name" placeholder="Digite seu primeiro nome">

    <label for="last_name">Último nome</label>
    <input type="text" name="last_name" placeholder="Digite seu segundo nome">

    <label for="email">E-mail</label>
    <input type="email" name="email" placeholder="Digite seu e-mail aqui">
  
    <label for="passwd">Senha</label>
    <input type="password" name="passwd" placeholder="Digite sua senha aqui">
  
    <input type="submit" value="Entrar">
    <a href="<?= $router->route("web.login"); ?>">Login</a>
  </form>
</div>

<?php $v->start('js'); ?>
  <script src="<?= asset('/js/scripts.js'); ?>"></script>
<?php $v->stop() ?>