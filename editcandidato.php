<?php
require_once("templates/header.php");

// Verifica se usuário está autenticado
require_once("models/User.php");
require_once("dao/UserDAO.php");
require_once("models/Candidato.php");
require_once("dao/CandidatoDAO.php");

$user = new User();
$userDao = new UserDao($conn, $BASE_URL);

$userData = $userDao->verifyToken(true);

$candidatoDao = new CandidatoDAO($conn, $BASE_URL);

$id = filter_input(INPUT_GET, "id");

if (empty($id)) {

  $message->setMessage("O Candidato não foi encontrado!", "error", "index.php");
} else {

  $candidato = $candidatoDao->findById($id);


  if (!$candidato) {

    $message->setMessage("O Candidato não foi encontrado!", "error", "index.php");
  }
}

?>
<div id="main-container" class="container-fluid">
  <div class="col-md-12">
    <div class="row">
      <h1><?= $candidato->nome ?></h1>
      <p class="page-description">Altere os dados do curriculo abaixo:</p>
      <form action="<?= $BASE_URL ?>candidato_process.php" method="POST">
        <input type="hidden" name="type" value="update">
        <input type="hidden" name="id" value="<?= $candidato->id ?>">
        <div class="container-table">
          <div class="row">
            <div class="col-3 form-group">
              <label for="nome">Nome:</label>
              <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite seu nome" value="<?= $candidato->nome ?>">
            </div>
            <div class="col-3 form-group">
              <label for="cpf">CPF:</label>
              <input type="text" class="form-control" name="cpf" id="cpf" placeholder="Digite seu CPF" value="<?= $candidato->cpf ?>">
            </div>
            <div class="col-3 form-group">
              <label for="email">E-mail:</label>
              <input type="email" class="form-control" name="email" id="email" placeholder="Digite seu email" value="<?= $candidato->email ?>">
            </div>
            <div class="col-3 form-group">
              <label for="telefone">Telefone:</label>
              <input type="i" class="form-control" name="telefone" id="telefone" placeholder="Digite seu telefone" value="<?= $candidato->telefone ?>">
            </div>
          </div>
          <div class="row">
            <div class="col-4 form-group">
              <label for="endereco">Endereço:</label>
              <input type="text" class="form-control" name="endereco" id="endereco" placeholder="Digite seu Endereço" value="<?= $candidato->endereco ?>">
            </div>
            <div class="col-1 form-group">
              <label for="numero">Número:</label>
              <input type="text" class="form-control" name="numero" id="numero" placeholder="Número" value="<?= $candidato->numero ?>">
            </div>
            <div class="col-2 form-group">
              <label for="CEP">CEP:</label>
              <input type="text" class="form-control" name="CEP" id="CEP" placeholder="Digite seu CEP" value="<?= $candidato->CEP ?>">
            </div>
            <div class="col-2 form-group">
              <label for="estado">estado:</label>
              <input type="text" class="form-control" name="estado" id="estado" placeholder="Digite seu estado" value="<?= $candidato->estado ?>">
            </div>
            <div class="col-3 form-group">
              <label for="cidade">cidade:</label>
              <input type="text" class="form-control" name="cidade" id="cidade" placeholder="Digite sua cidade" value="<?= $candidato->cidade ?>">
            </div>
          </div>
          <div class="row">
            <div class="col-3 form-group">
              <label for="curso">curso:</label>
              <input type="text" class="form-control" name="curso" id="curso" placeholder="Digite seu curso" value="<?= $candidato->curso ?>">
            </div>
            <div class="col-9 form-group">
              <label for="experiencia">experiencia:</label>
              <input type="text" class="form-control" name="experiencia" id="experiencia" placeholder="Digite seu experiencia" value="<?= $candidato->experiencia ?>">
            </div>
            <input type="submit" class="btn card-btn" value="Editar curriculo">
      </form>
    </div>
  </div>
</div>
<?php
require_once("templates/footer.php");
?>