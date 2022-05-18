<?php 

function checkEmpty($value){
    if(empty($value)){
        return false ; 

    }   
    return true ; 
     
}
function Checklength($value){
    if(trim(strlen($value)<3)){
           return false ; 
    } else { 
        return true ;
    }
}
function ValidEmail($email){
//    if((strpos($email,'@')!==false) and (strpos($email,'.')!==false)){
//        return true ;
//    }
//    return false ;
 if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
 return false ; 
 }
 return true ;
}