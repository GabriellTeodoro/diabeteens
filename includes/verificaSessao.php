<?php
@session_start();

if(!isset($_SESSION) || empty($_SESSION)){
    header('Location: index.php');
}
