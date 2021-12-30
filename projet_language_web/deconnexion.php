<?php
session_start();

session_destroy();
header('location: formulaire/form.html');
exit;

?>