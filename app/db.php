<?php 

//file include

include_once('./config.php');

//db connection function

function connect(){
   return new mysqli(HOST,USER,PASSWORD,DB);
}