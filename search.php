<?php
require_once("templates/header.php");

require_once("models/User.php");
require_once("dao/UserDAO.php");
require_once("models/Candidato.php");
require_once("dao/CandidatoDAO.php");


$user = new User();
$userDao = new UserDao($conn, $BASE_URL);
$candidatoDao = new CandidatoDAO($conn, $BASE_URL);


$pesquisa = filter_input(INPUT_GET, "search");


$candidatos = $candidatoDao->findByName($pesquisa);

?>
<div id="main-container" class="container-fluid">
  <h2 class="section-title" id="search-title">Você está buscando por: <span id="search-result"><?= $pesquisa ?></span></h2>
  <p class="section-description">Resultados de busca retornados com base na sua pesquisa.</p>
  <div class="col-md-12" id="dbmax-dashboard">
      <table class="table">
        <thead>
          <th scope="col">#</th>
          <th scope="col">Nome</th>
          <th scope="col">E-mail</th>
          <th scope="col">Curso</th>
          <th scope="col">Experiência</th>
        </thead>
        <tbody>
          <?php foreach($candidatos as $candidato): ?>
          <tr>
            <td scope="row"><?= $candidato->id ?></td>
            <td><a href="<?= $BASE_URL ?>Candidato.php?id=<?= $candidato->id ?>" class="table-dbmax-title"><?= $candidato->nome ?></a></td>
            <td><i></i> <?= $candidato->email ?></td>
            <td><i></i> <?= $candidato->curso ?></td>
            <td><i></i> <?= $candidato->experiencia ?></td>           
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>  
</div>
<?php
require_once("templates/footer.php");
?>