<?php
require_once("templates/header.php");

?>
<div id="main-container" class="container-fluid">
<div class="offset-md-4 col-md-4 new-movie-container">
      <h1 class="page-title" style="text-align: center;">Contato</h1>
      <p class="page-description">Deixe seu contato, nossa equipe retornará assim que possível!</p>
      <form action="<?= $BASE_URL ?>suporte_process.php" id="add-dbmax-form" method="POST">
        <input type="hidden" name="type" value="create">
        <div class="form-group">
          <label for="nome">Nome:</label>
          <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o seu nome">
        </div>
        <div class="form-group">
          <label for="email">E-mail:</label>
          <input type="email" class="form-control" name="email" id="email" placeholder="Digite seu e-mail">
        </div>     
        <div class="form-group">
            <label for="mensagem">Mensagem:</label>
            <textarea name="mensagem" id="mensagem" rows="3" class="form-control" placeholder="Deixe sua mensagem"></textarea>
          </div>             
        <input type="submit" class="btn card-btn" value="Enviar">
      </form>
    </div>

</div>
<?php
require_once("templates/footer.php");
?>