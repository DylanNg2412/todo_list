<?php

class DB
{
   public $host='devkinsta_db';
   public $database_name = 'My_ToDo_List';
   public $database_user = 'root';
   public $database_password = 'sU3R6Rm2wtOI8xQA';

    private function connectToDB()
    {
        return new PDO(
            "mysql:host=$this->host;dbname=$this->database_name",
            $this->database_user,
            $this->database_password
        ); 
    }

    public function fetchAll( $sql, $params )
    {
        $query = $this->connectToDB()->prepare( $sql );
        $query->execute($params);
        return $query->fetchAll();
    }

    public function fetch( $sql, $params )
    {
        $query = $this->connectToDB()->prepare( $sql );
        $query->execute($params);
        return $query->fetch();
    }

    public function add( $sql, $params )
    {
        $query = $this->connectToDB()->prepare( $sql );
        $query->execute($params);
    }

    public function update( $sql, $params )
    {
        $query = $this->connectToDB()->prepare( $sql );
        $query->execute($params);
    }

    public function delete( $sql, $params )
    {
        $query = $this->connectToDB()->prepare( $sql );
        $query->execute($params);
    }

}