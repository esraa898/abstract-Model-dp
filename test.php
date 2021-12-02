<?php
require_once 'dp.php';
require_once 'abstractmodel.php';
require_once 'empolyee.php';

$mohamed= new Empolyee();
echo "<pre>";
 //$mohamed =Empolyee::getByPK(5);
//  $mohamed->SetName("first_name","mohamed") ;
//  $mohamed->SetName("last_name","tarek") ;
//  $mohamed->SetName("salary","2500") ;
//  $mohamed->SetName("role","1") ;
//  $mohamed= Empolyee::getByPK(13) ;
 
//  var_dump($mohamed->save()) ;

//  $mohamed= Empolyee::get('SELECT * FROM empolye  WHERE  role = :role',
//  array('role'=> array(Empolyee::DATA_TYPE_INT,1)));
// $mohamed= Empolyee::getbypk(7);
// $mohamed->first_name="momed" ;
//  $mohamed->last_name="tak";  
//  $mohamed->salary=900 ;
//  $mohamed->role=1 ;

// var_dump($mohamed->save()) ;