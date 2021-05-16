<?php
// Verificação de login
session_start();

if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] !== false) {
    header('location: index.php');
    exit;
}
?>

<?php include 'includes/menudashboard.php'; ?>
<?php include 'config/config.php'; ?>


<form method="POST" action="edt_perfil.php">
<div class="container">
    <div class="main-body">

        <br><br>
        <p id="p_perfil">Editar Perfil</p>
        <div class="form-signin text-center">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <h6 class="mb-0">Username</h6>
                        </div>
                        <div class="col-sm-8 text-secondary">
                            <?php echo $_SESSION['username']; ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-4">
                            <h6 class="mb-0">E-mail</h6>
                        </div>
                        <div class="col-sm-8 text-secondary">
                            <input type="text" width="30" name="newemail" id="newemail" required>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-4">
                            <h6 class="mb-0">Nome</h6>
                        </div>
                        <div class="col-sm-8 text-secondary">
                            <input type="text" width="30" name="newnome" id="newnome" required>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-4">
                            <h6 class="mb-0">Sobrenome</h6>
                        </div>
                        <div class="col-sm-8 text-secondary">
                            <input type="text" width="30"  name="newsobrenome" id="newsobrenome" required>
                        </div>
                    </div>

                    <hr>
                    <div class="row">
                        <div class="col-sm-4">
                            <h6 class="mb-0">Telefone / Celular</h6>
                        </div>
                        <div class="col-sm-8 text-secondary">
                            <input type="text" width="30"  name="newtelefone" id="newtelefone" required>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <button class="btn btn-editar">Salvar</button>
            </div>
        </div>
    </div>
</div>
</div>
</form>


<?php include 'includes/footerdashboard.php'; ?>