<?php

class Empolyee  extends AbstractModel
{
  private $id;
private $first_name;
private $last_name;
private$salary;
private $role;

 protected static $tablename = 'empolye';

protected static $tableSchema= array(
   

  
     'first_name'=>self::DATA_TYPE_STR,
     'last_name'=>self::DATA_TYPE_STR,
     'salary'=>self::DATA_TYPE_DECIMAL,
     'role'=>self::DATA_TYPE_INT,
 );



 protected static $primaryKey= 'id';




 public function __construct()
 {  
   global $connection;
    
  
      
 }


 public function __set($name,$value){
  return $this->$name =$value;
}

public function &__get($prop)
{
   return  $this->$prop;
}

     
public  function getTableName(){
   return self::$tablename;
}
//  public function calculateSalary(){

//  }
//  public function fireEmpolyee(){
     
// }
// public function promoteEmpolyee(){
     
// }
}


