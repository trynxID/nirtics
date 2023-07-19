<?php
session_start();
$id = $_SESSION['id'];
if (!empty($_SESSION['status'])) {
    include "layout/header.php";
    include "../lib/koneksi.php";
?>
    <main>
        <div class="container-fluid" style="min-height: 76vh;">
            <div class="row" text-center mb-3>
                <?php include "sidebar.php" ?>
                <div class="col-lg-10 mt-4">
                    <?php
                    include "../lib/koneksi.php";
                    $sql = "SELECT * FROM kategori;";
                    $result = mysqli_query($link, $sql);
                    ?>
                    <div class="container">
                        <div class="row">
                            <div class="card">
                                <div class="card-body">
                                    <div class="container">
                                        <div class="row">
                                            <h3 class="mb-3">Change Password</h3>
                                            <hr>
                                            <div class="col">
                                                <form method="POST" action="passwordAct.php">
                                                    <div class="mb-3">
                                                        <label for="oldpass" class="form-label">Old Password</label>
                                                        <input type="password" class="form-control" id="oldpass" name="oldpass" required>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col mb-3">
                                                            <label for="newpass" class="form-label">New Password</label>
                                                            <input type="password" class="form-control" id="newpass" name="newpass" required>
                                                        </div>
                                                        <div class="col mb-3">
                                                            <label for="newpass" class="form-label">Re-type New Password</label>
                                                            <input type="password" class="form-control" id="renewpass" name="renewpass" required>
                                                        </div>
                                                    </div>
                                                    <div class="text-start mb-3">
                                                        <button type="submit" class="btn btn-primary">Save</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php
    include "layout/footer.php";
} else {
    header('Location: ../login.php');
}
?>