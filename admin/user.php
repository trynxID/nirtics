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
                    $sql = "SELECT * FROM user where level='user';";
                    $result = mysqli_query($link, $sql);
                    ?>
                    <div class="container">
                        <div class="row">
                            <div class="card">
                                <div class="card-body">
                                    <div class="container">
                                        <div class="row">
                                            <h3 class="mb-3">List User</h3>
                                            <div class="col">
                                                <table class="table table-bordered table-striped">
                                                    <thead>
                                                        <tr class="text-center">
                                                            <th class="text-white" style="background-color: #021780;">Fullname</th>
                                                            <th class="text-white" style="background-color: #021780;">Username</th>
                                                            <th class="text-white" style="background-color: #021780;">Email</th>
                                                            <th class="text-white" style="background-color: #021780;">No. HP</th>
                                                            <th class="text-white" style="background-color: #021780;">Date Join</th>
                                                            <th class="text-white" style="background-color: #021780;">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                                            <tr class="text-center">
                                                                <td><?php echo $row['fullname']; ?></td>
                                                                <td><?php echo $row['username'] ?></td>
                                                                <td><?php echo $row['email']; ?></td>
                                                                <td><?php echo $row['no_hp']; ?></td>
                                                                <td><?php echo $row['date_join']; ?></td>
                                                                <td class="mx-0 px-0 text-center">
                                                                    <a href="userDelete.php?id_user=<?php echo $row['id_user']; ?>" class="btn btn-danger" onclick="return confirmDelete();">Delete</a>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
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

<script>
    function confirmDelete() {
        return confirm("Are you sure you want to delete this user?");
    }
</script>