<div class="col-lg-2 px-0" style="min-height: 76vh;">
    <div class="d-flex flex-column flex-shrink p-3 text-black h-100 bg-primary">
        <ul class="nav nav-pills flex-column mb-auto" id="sidebar">
            <li class="nav-item">
                <a class="nav-link text-start text-white" aria-selected="true" aria-current="page" href="dashboard.php">
                    <h5>
                        <i class="fa-solid fa-house me-3 fa-fw" style="color: #ffffff;"></i>
                        Dashboard
                    </h5>
                </a>
            </li>
            <li class="nav-item">
                <a class="text-start text-white nav-link" aria-selected="false" href="category.php">
                    <h5>
                        <i class="fa-solid fa-bars me-3 fa-fw" style="color: #ffffff;"></i>
                        Category
                    </h5>
                </a>
            </li>
            <li class="nav-item">
                <a class="text-start text-white nav-link" aria-selected="false" href="event.php">
                    <h5>
                        <i class="fa-solid fa-calendar-check me-3 fa-fw" style="color: #ffffff;"></i>
                        Event
                    </h5>
                </a>
            </li>
            <li class="nav-item">
                <a class="text-start text-white nav-link" aria-selected="false" href="payment.php">
                    <h5>
                        <i class="fa-solid fa-credit-card me-3 fa-fw" style="color: #ffffff;"></i>
                        Payment
                    </h5>
                </a>
            </li>
            <li class="nav-item">
                <a class="text-start text-white nav-link" aria-selected="false" href="transaksi.php">
                    <h5>
                        <i class="fa-solid fa-receipt me-3 fa-fw" style="color: #ffffff;"></i>
                        Transaksi
                    </h5>
                </a>
            </li>
            <li class="nav-item">
                <a class="text-start text-white nav-link" aria-selected="false" href="user.php">
                    <h5>
                        <i class="fa-solid fa-user me-3 fa-fw" style="color: #ffffff;"></i>
                        User
                    </h5>
                </a>
            </li>
            <hr class="text-white">
            <li class="nav-item">
                <a class="text-start text-white nav-link" aria-selected="false" href="profile.php">
                    <h5>
                        <i class="fa-solid fa-id-card me-3 fa-fw" style="color: #ffffff;"></i>
                        My Profile
                    </h5>
                </a>
            </li>
            <li class="nav-item">
                <a class="text-start text-white nav-link" aria-selected="false" href="password.php">
                    <h5>
                        <i class="fa-solid fa-lock me-3 fa-fw" style="color: #ffffff;"></i>
                        Password
                    </h5>
                </a>
            </li>
        </ul>
    </div>
</div>
<script>
    $(function() {
        $('#sidebar a').click(function(e) {
            $('#sidebar a').removeClass('active');
            $(this).addClass('active');
        })
    })
</script>