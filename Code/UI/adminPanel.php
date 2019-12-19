<?php
$fileName = basename($_SERVER['PHP_SELF']);
?>
<div class="sidebar" data-color="purple" data-image="assets/img/sidebar-5.jpg">

    <!--

Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

-->

    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="index.php" class="simple-text">
                JetDelivery
            </a>
        </div>

        <ul class="nav">
            <li <?php if ($fileName == "dashboard.php") echo 'class="active"'; ?>>
                <a href="dashboard.php">
                    <i class="pe-7s-graph"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li <?php if ($fileName == "listUsers.php") echo 'class="active"'; ?>>
                <a href="listUsers.php">
                    <i class="pe-7s-note2"></i>
                    <p>Users List</p>
                </a>
            </li>
            <li <?php if ($fileName == "manageAll.php") echo 'class="active"'; ?>>
                <a href="manageAll.php">
                    <i class="pe-7s-global"></i>
                    <p>Management Centre</p>
                </a>
            </li>
            <li <?php if ($fileName == "reports.php") echo 'class="active"'; ?>>
                <a href="reports.php">
                    <i class="pe-7s-note2"></i>
                    <p>Reports</p>
                </a>
            </li>
        </ul>
    </div>
</div>