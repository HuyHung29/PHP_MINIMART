<?php
$sql = "Select * FROM category ORDER BY id DESC";

$categories = executeResult($sql);
?>

<div class="navbar--wrap">
    <div class="container">
        <div class="align-items-center row">
            <div class="col-xl-3">
                <nav class="py-0 navbar navbar-expand">
                    <div class="container-fluid"><button aria-label="Toggle navigation" type="button"
                            class="navbar-toggler"><span class="navbar-toggler-icon"></span></button>
                        <div class="collapse navbar-collapse">
                            <ul class="w-100 navbar-nav">
                                <li class="dropdown nav-item"><a aria-haspopup="true" href="./products.php"
                                        class="nav-link" aria-expanded="false"><i class="fas fa-bars nav__icon"></i>Danh
                                        mục</a>
                                    <div tabindex="-1" role="menu" aria-hidden="true"
                                        class="dropdown-menu dropdown-menu-end">
                                        <?php
foreach ($categories as $row) {
    echo '<button type="button" tabindex="0" role="menuitem" class="dropdown-item">
            <a href="./products.php?cate=' . urlencode($row['name']) . '">' . $row['name'] . '</a>
            </button>';
}
?>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</div>