<?php
include "helper.php";

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 'home';
}

$pageFile = 'pages/' . $page . '.php';
?>

<!DOCTYPE html>
<html lang="eng">

<?php include("layouts/head.php") ?>

<body>
    <?php include "layouts/sidenav.php"; ?>
    <div class="main">
        <?php include($pageFile); ?>
    </div>

    <?php
    if (isset($scriptFile)) {
        include 'scripts/' . $scriptFile . '.php';
    }
    ?>
</body>

</html>