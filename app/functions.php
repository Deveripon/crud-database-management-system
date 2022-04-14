<?php 


function warning_massage($txt,$type){
return "<p class=' d-flex justify-content-between alert alert-$type'>$txt <button class='btn-close'data-bs-dismiss='alert' ></button> </p> ";

};