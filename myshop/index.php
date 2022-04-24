<?php 

include('header.php'); 
include('banner.php');
include('menu.php');
include('searchprice.php');


 $act = (isset($_GET['act']) ? $_GET['act'] : '');
 if($act=='showbytype'){
 	include('list_prd_by_type.php');
 }elseif($act=='q'){
 	include('list_prd_by_search_multi.php');
 }elseif($act=='p'){
    include('list_prd_by_price.php');
 }else{
    include('list_prd_v2.php');
 }

include('footer.php');

?>

   
    

