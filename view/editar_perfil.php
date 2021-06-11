<?php
// Verificação de login
session_start();

if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] !== false) {
    header('location: ../index.php');
    exit;
}
?>

<?php include '../includes/menudashboard.php'; ?>
<?php include '../config/config.php'; ?>


<form method="POST" action="../controller/edt_perfil.php">
    <div class="container">
        <div class="main-body">

            <br><br>
            <p id="p_perfil">Editar Perfil</p>


            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

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
                                <input type="email" width="30" class="form-control" name="newemail" id="newemail" value="<?php

                                $id = $_SESSION['id'];

                                $emailperfil = "SELECT email FROM users WHERE id = '$id'";
                                $result = $mysql_db->query($emailperfil);


                                while ($row = $result->fetch_row()) {
                                printf("%s\n", $row[0]);
                                }
                                ?>"  required>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-4">
                                <h6 class="mb-0">Nome</h6>
                            </div>
                            <div class="col-sm-8 text-secondary">
                                <input type="text" class="form-control" width="30" name="newnome" id="newnome" value="<?php

                                $id = $_SESSION['id'];

                                $nomeperfil = "SELECT nome FROM users WHERE id = '$id'";
                                $result = $mysql_db->query($nomeperfil);


                                while ($row = $result->fetch_row()) {
                                printf("%s\n", $row[0]);
                                }
                                ?>" required>
                                <script>
                                $('#newnome').keypress(function(e) {
                                    var keyCode = (e.keyCode ? e.keyCode : e.which); // Variar a chamada do keyCode de acordo com o ambiente.
                                    if (keyCode > 47 && keyCode < 58) {
                                        e.preventDefault();
                                    }
                                });</script>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-4">
                                <h6 class="mb-0">Sobrenome</h6>
                            </div>
                            <div class="col-sm-8 text-secondary">
                                <input type="text" class="form-control"  width="30" name="newsobrenome" id="newsobrenome" value="<?php

                                $id = $_SESSION['id'];

                                $sobrenomeperfil = "SELECT sobrenome FROM users WHERE id = '$id'";
                                $result = $mysql_db->query($sobrenomeperfil);


                                while ($row = $result->fetch_row()) {
                                printf("%s\n", $row[0]);
                                }
                                ?>" required>
                                <script>
                                $('#newsobrenome').keypress(function(e) {
                                    var keyCode = (e.keyCode ? e.keyCode : e.which); // Variar a chamada do keyCode de acordo com o ambiente.
                                    if (keyCode > 47 && keyCode < 58) {
                                        e.preventDefault();
                                    }
                                });</script>
                            </div>
                        </div>

                        <hr>
                        <div class="row">
                            <div class="col-sm-4">
                                <h6 class="mb-0">Telefone / Celular</h6>
                            </div>
                            <div class="col-sm-8 text-secondary">
                                <input type="text" class="form-control" id="newtelefone" name="newtelefone" placeholder="(00) 00000-0000" value="<?php

                                $id = $_SESSION['id'];

                                $telefoneperfil = "SELECT telefone FROM users WHERE id = '$id'";
                                $result = $mysql_db->query($telefoneperfil);


                                while ($row = $result->fetch_row()) {
                                printf("%s\n", $row[0]);
                                }
                                ?>" required>
                                <script type="text/javascript">
                                    $("#newtelefone").mask("(00) 90000-0000");
                                </script>
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


<?php include '../includes/footerdashboard.php'; ?>