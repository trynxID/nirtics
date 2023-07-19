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
                                            <h3 class="mb-0">List Categories</h3>
                                            <div class="col">
                                                <div class="text-start mt-3 mb-3">
                                                    <a href="categoryAdd.php" class="btn btn-success">Add Category</a>
                                                </div>
                                                <table class="table table-bordered table-striped">
                                                    <thead>
                                                        <tr class="text-center">
                                                            <th class="text-white" style="background-color: #021780;">Event Name</th>
                                                            <th class="text-white" style="background-color: #021780;">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                                            <tr>
                                                                <td><?php echo $row['nama']; ?></td>
                                                                <td class="mx-0 px-0 text-center">
                                                                    <a href="categoryEdit.php?id_kategori=<?php echo $row['id_kategori']; ?>" class="btn btn-warning">Edit</a>
                                                                    <a href="categoryDelete.php?id_kategori=<?php echo $row['id_kategori']; ?>" class="btn btn-danger" onclick="return confirmDelete();">Delete</a>
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
        return confirm("Are you sure you want to delete this category?");
    }
</script>