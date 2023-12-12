<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once(__DIR__ . "/util/Connection.php");
$connection = Connection::getConnection();


include_once(__DIR__ . "/view/include/header.php");
?>

<div class="row mt-3 justify-content-center">
    <div class="col-3">
    <a class="card-link text-danger fs-1" href="<?= BASE_URL ?>/view/visitas/listar.php">
        <div class="card text-center" style="width: max-content;">
            <img class="card-image-top mx-0" src="https://i.pinimg.com/564x/92/57/2b/92572b3069658c2413fa845bdaa51ca4.jpg" 
                style="max-width: 200px; height: auto;" />
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                        Listagem de visitas</a>
                </li>
            </ul>
        </div>
    </div>
</div>

<?php
include_once(__DIR__ . "/view/include/footer.php");
?>