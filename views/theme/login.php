<?php $v->layout('theme/master'); ?>


<div class="common_form">
  
  <h1>Login</h1>

  <div class="response_callback"></div>
  
  <form action="<?= $router->route("auth.login"); ?>" method="post">
    <label for="email">E-mail</label>
    <input type="email" name="email" placeholder="Digite seu e-mail aqui">

    <label for="passwd">Senha</label>
    <input type="password" name="passwd" placeholder="Digite sua senha aqui">

    <input type="submit" value="Entrar">
    <a href="<?= $router->route("web.register"); ?>">Cadastre-se</a>
  </form>
</div>


<?php $v->start('js'); ?>
  <script src="<?= asset('/js/scripts.js'); ?>"></script>
<?php $v->stop() ?>