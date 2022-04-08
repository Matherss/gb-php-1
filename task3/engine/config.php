<?php
const SERVER = 'localhost';
const DB = 'gb_php_online_store';
const LOGIN = 'root';
const PASS ='root';

$connect = mysqli_connect(SERVER,LOGIN,PASS,DB) or die('Ошибка при коннекте к бд');