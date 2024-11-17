<?php
session_start();

if (isset($_POST['timer'])) {
    $_SESSION['timer'] = intval($_POST['timer']);
}
?>