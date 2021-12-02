<?php


 class AbstractModel
 {
     const DATA_TYPE_BOOL    = PDO::PARAM_BOOL;
     CONST DATA_TYPE_STR     = PDO::PARAM_STR;
     CONST DATA_TYPE_INT     = PDO::PARAM_INT;
     CONST DATA_TYPE_DECIMAL = 4;
     protected static $tablename;
     protected static $tableSchema;
     protected static $primaryKey;





    

     
  // prepare values and put : after named parameter
    protected static function bulidNamedParameter(){
         $namedparam='';
        foreach (static::$tableSchema as $columnName =>$type){
            $namedparam.= $columnName .' = :'.$columnName .',';

        }
        $namedparam= trim($namedparam, ',');
        return $namedparam;
     }


      //bend values
     protected function prepareValues(PDOStatement $stmt){
        foreach (static::$tableSchema as $columnName =>$type){
            if ($type == 4){
        $sanitizedvalue=     filter_var($this->$columnName, FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION);
             $stmt->bindvalue(":{$columnName}",$sanitizedvalue);
       }else{

       
         $stmt->bindvalue(":{$columnName}",$this->$columnName,$type);
       }
    }
     }

    // insert new value 
    private function  create(){
        global $connection;
          $sql = 'INSERT INTO '. static::$tablename.' SET '. self::bulidNamedParameter();
         $stmt= $connection->prepare($sql);
        $this->prepareValues($stmt);
     
         return  $stmt->execute();
        
     }


     //update value 

   private function  Update(){
        global $connection;
          $sql = 'UPDATE '. static::$tablename.' SET '. self::bulidNamedParameter() .' WHERE '.static::$primaryKey .' = '. $this->{static::$primaryKey};
          $stmt= $connection->prepare($sql);
         $this->prepareValues($stmt);
          return  $stmt->execute();
        
        
     }


     // usable insted of up[date and insert and determine which one will work dynamiclly ]
     public function save (){
       return $this->{static::$primaryKey} === null ? $this->create() : $this->Update();
     }

      //delete 
     public function  delete(){
        global $connection;
          $sql = 'DELETE FROM '. static::$tablename.' WHERE '.static::$primaryKey .' = '. $this->{static::$primaryKey};
          $stmt= $connection->prepare($sql);
         
          return  $stmt->execute();
       
        
     }

     // get all rows in table 
     public  static function getAll(){
      global $connection;
      $sql ='SELECT * FROM '.static::$tablename;
      $stmt=$connection->prepare($sql);
      $stmt->execute();
       $result=$stmt->fetchAll(PDO::FETCH_CLASS| PDO::FETCH_PROPS_LATE,get_called_class(),array_keys(static::$tableSchema));
   
      return is_array($result) && !empty($result) === true ? $result : false ;

    }


     // get value by id to affect it 
    public static function  getByPK($pk){
      global $connection;
      $sql ='SELECT * FROM '.static::$tablename. ' Where ' . static::$primaryKey .'= "' .$pk.'"';
      $stmt=$connection->prepare($sql);
      $stmt->execute();
      $obj= $stmt->fetchAll(PDO::FETCH_CLASS| PDO::FETCH_PROPS_LATE,get_called_class(),array_keys(static::$tableSchema));
       if ( is_array($obj) && !empty($obj) === true) {
       
         return array_shift($obj);
      }  
      return false ; 

    }



    // get element by intering full query 
    public static function get($sql ,$options=array()){

      global  $connection ;
      $stmt=$connection->prepare($sql);
      if(!empty($options)){
        foreach ($options as $columnName =>$type){
          if ($type[0] == 4){
      $sanitizedvalue=     filter_var($type[1], FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION);
           $stmt->bindvalue(":{$columnName}",$sanitizedvalue);
     }else{

     
       $stmt->bindvalue(":{$columnName}",$type[1],$type[0]);
     }
  }

       
      }
      var_dump($stmt);
      $stmt->execute();
      $result=$stmt->fetchAll(PDO::FETCH_CLASS| PDO::FETCH_PROPS_LATE,get_called_class(),array_keys(static::$tableSchema));
  
     return is_array($result) && !empty($result) === true ? $result : false ;

   }

    }
    

 

