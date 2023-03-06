<?php
require_once("templates/header.php");

require_once("models/User.php");
require_once("dao/UserDAO.php");

$user = new User();
$userDao = new UserDao($conn, $BASE_URL);

$userData = $userDao->verifyToken(true);

?>

<div id="main-container" class="container-fluid">        
    <div class="form-group">
    <form action="<?= $BASE_URL ?>search.php" method="GET" id="search-form" class="form-inline my-2 my-lg-0" style="width: 80%;" >
        <input type="text" name="search" id="search" class="form-control mr-sm-2" type="search" placeholder="Buscar Cadastros de Curriculos" aria-label="Search">
        <button class="btn my-2 my-sm-0" type="submit">
          <i class="fas fa-search"></i>
        </button>
      </form>
    </div>
</div>
<?php
  require_once("templates/footer.php");
?>
