<?php
require_once("templates/header.php");

require_once("models/User.php");
require_once("dao/UserDAO.php");
require_once("models/Suporte.php");
require_once("dao/SuporteDAO.php");


$user = new User();
$userDao = new UserDao($conn, $BASE_URL);
$suporteDao = new SuporteDAO($conn, $BASE_URL);


$pesquisa = filter_input(INPUT_GET, "search");


$suportes = $suporteDao->findAll();


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
          <th scope="col">Mensagem</th>
        </thead>
        <tbody>
          <?php foreach($suportes as $suporte): ?>
          <tr> 
            <td scope="row"><?= $suporte->id ?></td>           
            <td><?= $suporte->nome ?></td>
            <td><?= $suporte->email ?></td>
            <td><?= $suporte->mensagem ?></td>           
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>  
</div>
<?php
require_once("templates/footer.php");
?>