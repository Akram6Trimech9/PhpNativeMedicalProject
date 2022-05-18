<?php 
 session_start(); 
 define("BURL","http://localhost/medicalproject/"); 
 define("BURLA","http://localhost/medicalproject/admin/"); 
 define("ASSETS","http://localhost/medicalproject/assets"); 
 define("BL",__DIR__.'/');
 define("BLA",__DIR__.'/admin');
 //connect to database
 require_once(BL.'functions/db.php');
?>