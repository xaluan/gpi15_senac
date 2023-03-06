<?php
require_once("templates/header.php");
 
require_once("models/User.php");
require_once("dao/UserDAO.php");

$user = new User();
$userDao = new UserDao($conn, $BASE_URL);

$userData = $userDao->verifyToken(true);

?>
<div id="main-container" class="container-fluid">
  <h1 class="page-title" style="text-align: center;">Cadastre seu Currículo</h1>
  <form action="<?= $BASE_URL ?>candidato_process.php" id="add-candidato-form" method="POST">
    <input type="hidden" name="type" value="create">
    <div class="container-table">
      <div class="row">
        <div class="col-3 form-group">
          <label for="nome">Nome:</label>
          <input type="text" class="form-control" name="nome" id="nome" placeholder="Digite seu nome">
        </div>
        <div class="col-3 form-group">
          <label for="cpf">CPF:</label>
          <input type="text" class="form-control" name="cpf" id="cpf" placeholder="Digite seu CPF">
        </div>
        <div class="col-3 form-group">
          <label for="email">E-mail:</label>
          <input type="email" class="form-control" name="email" id="email" placeholder="Digite seu email">
        </div>
        <div class="col-3 form-group">
          <label for="telefone">Telefone:</label>
          <input type="i" class="form-control" name="telefone" id="telefone" placeholder="Digite seu telefone">
        </div>
      </div>
      <div class="row">
        <div class="col-4 form-group">
          <label for="endereco">Endereço:</label>
          <input type="text" class="form-control" name="endereco" id="endereco" placeholder="Digite seu Endereço">
        </div>
        <div class="col-1 form-group">
          <label for="numero">Número:</label>
          <input type="text" class="form-control" name="numero" id="numero" placeholder="Número">
        </div>
        <div class="col-2 form-group">
          <label for="CEP">CEP:</label>
          <input type="text" class="form-control" name="CEP" id="CEP" placeholder="Digite seu CEP">
        </div>
        <div class="col-2 form-group">
          <label for="estado">estado:</label>
          <input type="text" class="form-control" name="estado" id="estado" placeholder="Digite seu estado">
        </div>
        <div class="col-3 form-group">
          <label for="cidade">cidade:</label>
          <input type="text" class="form-control" name="cidade" id="cidade" placeholder="Digite sua cidade">
        </div>
      </div>
      <div class="row">
        <div class="col-3 form-group">
          <label for="curso">curso:</label>
          <input type="text" class="form-control" name="curso" id="curso" placeholder="Digite seu curso">
        </div>
        <div class="col-9 form-group">
          <label for="experiencia">experiencia:</label>
          <input type="text" class="form-control" name="experiencia" id="experiencia" placeholder="Digite seu experiencia">
        </div>        
      </div>  
    </div>
    <input type="submit" class="btn card-btn" value="Salvar">
  </form>

</div>
<?php
require_once("templates/footer.php");
?>