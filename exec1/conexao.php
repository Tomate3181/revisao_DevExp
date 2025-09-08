<?php
$hostname = 'localhost';
$username = 'root';
$password  = '';
$bdname = 'bd_devexec1';

$conn = new mysqli($hostname,$username,$password,$bdname);

if ($conn -> connect_error) {
    die("erro na conexao com o banco $conn->connect_error");
}
?>