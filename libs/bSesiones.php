<?php
function destruir(){
    unset($_SESSION);
    session_destroy();
 }
?>