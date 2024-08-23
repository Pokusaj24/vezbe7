<?php
require_once 'DAO.php';
session_start();
$action = isset($_REQUEST["action"]) ? $_REQUEST["action"] : "";

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if ($action === 'doPost') {
        $marka = isset($_POST['marka']) ? test_input($_POST['marka']) : '';

        if (!empty($marka)) {
            $dao = new DAO();
            $auto = $dao->vratiPrvi($marka);

            if ($auto) {
                $_SESSION['auto'] = $auto;
                include 'prikaz.php';
            } else {
                $msg = "Marka automobila ne postoji.";
                include 'index.php';
            }
        } else {
            $msg = "Popunite sva polja.";
            include 'index.php';
        }
    }
} elseif ($_SERVER['REQUEST_METHOD'] === "GET") {
    if ($action === 'logout') {
        session_unset();
        session_destroy();
        header("Location: index.php");
        exit();
    } else {
        header("Location: index.php");
        exit();
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
