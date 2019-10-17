<?php
function myLoader($c){
    require str_replace("\\", "/", $c) . ".php";
}
spl_autoload_register("myLoader");
