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
                    $sql = "SELECT * FROM event;";
                    $result = mysqli_query($link, $sql);
                    ?>
                    <div class="container">
                        <div class="row">
                            <div class="card">
                                <div class="card-body">
                                    <div class="container">
                                        <div class="row">
                                            <h3 class="mb-0">List Event</h3>
                                            <div class="col">
                                                <div class="text-start mt-3 mb-3">
                                                    <a href="eventAdd.php" class="btn btn-success">Add Event</a>
                                                </div>
                                                <table class="table table-bordered table-striped">
                                                    <thead>
                                                        <tr class="text-center">
                                                            <th class="text-white" style="background-color: #021780;">Event Name</th>
                                                            <th class="text-white" style="background-color: #021780;">Status</th>
                                                            <th class="text-white" style="background-color: #021780;">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                                            <tr>
                                                                <td><?php echo $row['nama']; ?></td>
                                                                <td class="text-center"><?php echo $row['status'] ?></td>
                                                                <td class="mx-0 px-0 text-center">
                                                                    <a href="eventEdit.php?id_event=<?php echo $row['id_event']; ?>" class="btn btn-warning">Manage</a>
                                                                    <a href="eventDelete.php?id_event=<?php echo $row['id_event']; ?>" class="btn btn-danger" onclick="return confirmDelete();">Delete</a>
                                                                    <a href="ticket.php?id_event=<?php echo $row['id_event']; ?>" class="btn btn-success">Ticket</a>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script>
        $(function() {
            $('#sidebar a').click(function(e) {
                $('#sidebar a').removeClass('active');
                $(this).addClass('active');
            })
        })
    </script>
<?php
    include "layout/footer.php";
} else {
    header('Location: ../login.php');
}
?>

<script>
    function confirmDelete() {
        return confirm("Are you sure you want to delete this event?");
    }
</script>