<?php 
//Formulário para alunos

require_once(__DIR__ . "/../../controller/IdolosController.php");
require_once(__DIR__ . "/../../controller/TipoVisitaController.php");
require_once(__DIR__ . "/../include/header.php");

$idoloCont = new IdolosController();
$idolo = $idoloCont->listar();

$tipoVisitaCont = new TipoVisitaController();
$tipo = $tipoVisitaCont->listar();
?>

<h2><?php echo (!$visita || $visita->getId() <= 0 ? 'Inserir' : 'Alterar') ?> Visita</h2>

<div class="row mb-3">
    <div class="col-6">
        <form id="frmVisita" method="POST" >

            <div class="form-group">
                <label for="txtNome">Nome:</label>
                <input type="text" name="nomeVisitante" id="txtNome" class="form-control"
                    value="<?php echo ($visita ? $visita->getNomeVisitante() : ''); ?>" />
            </div>

            <div class="form-group">
                <label for="txtCpf">CPF:</label>
                <input type="number" name="cpf" id="txtCpf" class="form-control"
                    value="<?php echo ($visita ? $visita->getCpf() : ''); ?>" />
            </div>

            <div class="form-group">
                <label for="txtData">Data da visita:</label>
                <input type="date" name="dataVisita" id="txtData" class="form-control"
                    value="<?php echo ($visita ? $visita->getDataVisita() : ''); ?>" />
            </div>

            <div class="form-group">
                <label for="selIdolo">Ídolo:</label>
                <select id="selIdolo" name="idolo" class="form-control">
                    <option value="">---Selecione---</option>
                    
                    <?php foreach($idolo as $i): ?>
                        <option value="<?= $i->getId(); ?>"
                            <?php 
                                if($visita && $visita->getIdolos() && 
                                    $visita->getIdolos()->getId() == $i->getId())
                                    echo 'selected';
                            ?>>
                            <?= $i->getNomeIdolo(); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="txtTipoVisita">Tipo da visita:</label>
                <select id="txtTipoVisita" name="tipoVisita" class="form-control">
                    <option value="">---Selecione---</option>
                    
                    <?php foreach($tipo as $t): ?>
                        <option value="<?= $t->getId(); ?>"
                            <?php 
                                if($visita && $visita->getTipoVisita() && 
                                    $visita->getTipoVisita()->getId() == $t->getId())
                                    echo 'selected';
                            ?>>
                            <?= $t->getDescVisita(); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <input type="hidden" name="id" 
                value="<?php echo ($visita ? $visita->getId() : 0); ?>" />
            
            <input type="hidden" name="submetido" value="1" />

            <!-- Gravar AJAX -->

            <button type="button" class="btn btn-success" onclick="inserirVisitante();">GRAVAR AJAX</button>

            <input type="hidden" id="hddBaseUrl" value="<?= BASE_URL ?>" />
                        
            <button type="submit" class="btn btn-success">Gravar</button>
            <button type="reset" class="btn btn-info">Limpar</button>
        </form>
    </div>

    <div class="col-6">
        <?php if($msgErro): ?>
            <div class="alert alert-danger">
                <?php echo $msgErro; ?>
            </div>
        <?php endif; ?>
    </div>    
</div>

<a href="listar.php" class="btn btn-outline-secondary">Voltar</a>

<script src="js/visita.js"></script>

<?php require_once(__DIR__ . "/../include/footer.php"); ?>