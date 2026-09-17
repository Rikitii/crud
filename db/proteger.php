<?php

session_start();


if (!isset($_SESSION['crud'])) {
    header('Location: /crud/index.php');
    exit;
}