<?php
//Página view para listagem de visitas
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once(__DIR__ . "/../../controller/VisitaController.php");

$visitaCont = new VisitaController();
$visita = $visitaCont->lista();
?>
<?php
require(__DIR__ . "/../include/header.php");
?>

<h4 class="text-light">Listagem de visitas</h4>

<div>
    <a class="btn btn-success" href="inserir.php">Inserir</a>
</div>

<div id="divDadosVisita" style="color:white; text-align: center;" class="m-5 p-3">
    
</div>

<table class="table table-striped table-dark table-hover mt-4">


    <thead>
        <tr class="text-danger">
            <th>Nome do visitante</th>
            <th>Editar</th>
            <th>Excluir</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($visita as $v) : ?>
            <tr id="divDadosVisita">

                <td> <a href="#" onclick="buscarDadosVisita(<?= $v->getId() ?>);" style="color: white;">
                        <?= $v->getNomeVisitante(); ?> </a>
                </td>
                
                <td><a href="alterar.php?idVisita=<?= $v->getId() ?>">Editar</a>
                </td>
                <td><a href="excluir.php?idVisita=<?= $v->getId() ?>" onclick="return confirm('Confirma a exclusão?');">Excluir</a>
                </td>
            </tr>

        <?php endforeach; ?>
    </tbody>
</table>

<script src="js/dadosVisita.js"></script>


<?php
require(__DIR__ . "/../include/footer.php");
?>