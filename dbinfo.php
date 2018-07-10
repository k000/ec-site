<?php


function get_db(){
  return new PDO("mysql:dbname=ecsite;charset=utf8","root","");
}


function out_img($id){

    if(file_exists("images/$id.jpg")){
      $name = $id;
    }else{
      $name = "noimage";
    }

    return '<img src="images/'. $name .'.jpg" />';
}



 ?>
