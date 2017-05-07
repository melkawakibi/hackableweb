<?php
# Made by Mohamed El kawakibi
# Versie 0.1

# Class database
class database
{
    var $db;
    
    function __construct( $user, $pass, $database, $host = 'localhost')
    {
        $this->db = new mysqli( $host, $user, $pass, $database);
       
        if( $this->db->connect_errno > 0 )
            die( $this->db->connect_error );
    }

    function run_query_find_one( $sql )
    {

        $res = $this->db->query($sql);

        if( !$res )
            die( $this->db->error );

        return $res->fetch_object();
    }
        
  function run_query_find_all( $sql )
    {
        $res = $this->db->query($sql);

        if( !$res )
            die( $this->db->error );

        return $res;
    }

    function run_query_num_row( $sql )
    {   
        $res = $this->db->query($sql);
        

        if( !$res )
            die( $this->db->error );

        return $res->num_rows;
    }
    
     function run_query_insert( $sql )
    {   
        $res = $this->db->query($sql);
        
        if( !$res )
            die( $this->db->error );

        return $res;
    }

    function run_query_update( $sql )
    {   
        $res = $this->db->query($sql);
        
        if( !$res )
            die( $this->db->error );

        return $res;
    }

    function database_close( )
    {
        $this->db->close();
    }
}


?>