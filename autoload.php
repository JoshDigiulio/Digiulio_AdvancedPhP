<?php
// function includes all classes inside the models folder 
// 'models/'.$class . 'php' = include'./models/classname'
function load_lib($base) {

    $baseName = explode( '\\', $base );
    $class = end( $baseName ); 
     
    include 'models/'.$class . '.php';
     
};
spl_autoload_register('load_lib');