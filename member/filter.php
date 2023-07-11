<div class="col-lg-2">
    <div class="d-flex flex-column flex-shrink p-3 text-black h-100">
        <a href="/" class="d-flex mb-1 mb-md-0 me-md-auto text-black text-decoration-none">
            <span class="fs-4">Filter</span>
            <a href="index.php" class="btn btn-danger">Clear Filter</a>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a class="btn w-100 text-start" data-bs-toggle="collapse" href="#colkat" role="button" aria-expanded="false" aria-controls="colkat">
                    <h6>Category
                        <span class="text-end fa-solid fa-caret-down"></span>
                    </h6>
                    <span><?php  ?></span>
                </a>
                <div class="collapse" id="colkat">
                    <?php
                    $sql = "SELECT * FROM kategori order by nama asc";
                    $result = mysqli_query($link, $sql);
                    ?>
                    <div class="d-flex flex-column text-start mb-3">
                        <?php while ($cat =  mysqli_fetch_assoc($result)) { ?>
                            <span><a class="btn flex-column fw-light" href="index.php?kategori=<?php echo $cat['nama'] ?>"><?php echo $cat['nama'] ?></a></span>
                        <?php } ?>
                    </div>
                </div>
            </li>
            <li>
                <?php
                $sql = "SELECT distinct provinsi FROM event order by nama asc";
                $result = mysqli_query($link, $sql);
                ?>
                <a class="btn w-100 text-start" data-bs-toggle="collapse" href="#colprov" role="button" aria-expanded="false" aria-controls="colprov">
                    <h6>Province
                        <span class="text-end fa-solid fa-caret-down"></span>
                    </h6>
                </a>
                <div class="collapse" id="colprov">
                    <div class="d-flex flex-column text-start mb-3">
                        <?php while ($prov =  mysqli_fetch_assoc($result)) { ?>
                            <span><a class="btn flex-column fw-light" href="index.php?provinsi=<?php echo $prov['provinsi'] ?>"><?php echo $prov['provinsi'] ?></a></span>
                        <?php } ?>
                    </div>
            </li>
        </ul>
    </div>
</div>