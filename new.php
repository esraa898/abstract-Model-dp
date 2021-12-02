<?php 

// class AbstractModel2 
// {
//      const  DATA_TYPE_BOOL    = PDO::PARAM_BOOL;
//      const DATA_TYPE_STR = PDO::PARAM_STR;
//      const DATA_TYPE_INT = PDO::PARAM_INT;
//      const DATA_TYPE_DECIMAL =4;

//      protected static $tablename;
//      protected static $tableSchema;
//      protected static $primaryKey;





//    protected static function   bulidNamedParameter(){
//       $namedparam='';
//      foreach (static::$tableSchema as $columnName => $type){

//        $namedparam .= $columnName  ."= :" . $columnName  .',';
//      }
//      $namedparam= trim($namedparam ,',');
//       return $namedparam;
//     }

//     protected function preparevalues(PDOStatement $stmt){

//       foreach (static::$tableSchema as $columnName => $type){

//         if($type==4){
//           $sanatizedvalue= filter_var($this->$columnName,FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION);
//           $stmt->bindValue(":{$columnName}",$sanatizedvalue);
//         }
//           else{
//             $stmt->bindValue(":{$columnName}",$this->$columnName,$type);
//           }

    
    
//         }
//     }
//   private function  create (){

//        global $connection;
//         $sql = " INSERT INTO ". static::$tablename. " SET " .self::bulidNamedParameter();
//         $stmt = $connection->prepare($sql);
//         $this->preparevalues($stmt);
//          return $stmt->execute();
//         var_dump($stmt) ;

//     }


//    public function  update (){
//       global $connection ;
//       $sql = " UPDATE  " .static::$tablename. " SET ". self::bulidNamedParameter() ." WHERE " .static::$primaryKey .' = '. $this->{static::$primaryKey};
//       $stmt= $connection->prepare($sql);
//       $this->preparevalues($stmt);
//         return $stmt->execute();
//       var_dump($stmt) ;

//     }
//     public function save (){
//       return $this->{static::$primaryKey} === null ? $this->create() : $this->update();
//     }
//     public function  delete (){
//       global $connection ;
//       $sql = " DELETE FROM  " .static::$tablename. " WHERE ".static::$primaryKey . " = ". $this->{static::$primaryKey};
//       $stmt= $connection->prepare($sql);
  
//       return $stmt->execute(); 
//           var_dump($stmt) ;
     

//     }



//     public static  function getALL(){
      

//       global $connection ;
//       $sql = " SELECT * FROM " .static::$tablename;
//       $stmt= $connection->prepare($sql);
//       $stmt->execute();
//       $result = $stmt->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, get_called_class(),array_keys(static::$tableSchema))  ;
//          return is_array($result) && !empty($result) === true ? $result : false ; 
//     }

//     public  static function  getbypk($pk){
//       global $connection;
//       $sql = "SELECT * FROM ".static::$tablename ." WHERE " .static::$primaryKey .'= "' .$pk.'"';
//       $stmt= $connection->prepare($sql);
//        var_dump($stmt);
//       $stmt->execute();
     
//       $obj = $stmt->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, get_called_class(),array_keys(static::$tableSchema))  ;
//       if(is_array($obj)&& !empty($obj) === true)
//       {
//         return array_shift($obj);
//       }
//       return false;

//     }


// }