<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['auto'])) {
    $auto = $_SESSION['auto'];

    include './partials/header.php'; 
?>
<div class="row" style="margin-left:1rem;">
    <div class="col-12">
        <h2>Prvi auto za marku: <?= htmlspecialchars($auto['marka']) ?></h2>
        <table class="table">
            <tr>
                <th>ID</th>
                <th>Marka</th>
                <th>Cena</th>
            </tr>
            <tr>
                <td><?= htmlspecialchars($auto['id']) ?></td>
                <td><?= htmlspecialchars($auto['marka']) ?></td>
                <td><?= htmlspecialchars($auto['cena']) ?> €</td>
            </tr>
        </table>
        <a href="controller.php?action=logout">LOGOUT</a>
        <a href="./index.php">Index</a>
    </div>
</div>
<?php 
    include './partials/footer.php'; 
} else {
    header('Location:index.php'); 
}
?>
