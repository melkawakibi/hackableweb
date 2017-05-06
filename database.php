<?php
# Made by Mohamed El kawakibi
# Versie 0.1

# Class database
class database
{
    # Database connectie variabele
    var $db;
    
    # Constructor
    function __construct( $user, $pass, $database, $host = 'localhost')
    {
        # Connectie leggen
        $this->db = new mysqli( $host, $user, $pass, $database);

        # Kijken of de connectie gelukt is, en of de database geselecteerd kon worden        
        if( $this->db->connect_errno > 0 )
            die( $this->db->connect_error );
    }

        # Functie die de query uitvoert
    function run_query_find_one( $sql )
    {

        # Query uitvoeren en het resultaat wegschrijven in de $res var
        $res = $this->db->query($sql);

        # Kijken of het een geldige query is
        if( !$res )
            die( $this->db->error );

        return $res->fetch_object();
    }
        
    # Functie die de query uitvoert
    function run_query_find_all( $sql )
    {
        # Query uitvoeren en het resultaat wegschrijven in de $res var
        $res = $this->db->query($sql);

        # Kijken of het een geldige query is
        if( !$res )
            die( $this->db->error );

        return $res;
    }

        # Functie die de query uitvoert
    function run_query_num_row( $sql )
    {
        
        # Query uitvoeren en het resultaat wegschrijven in de $res var
        $res = $this->db->query($sql);
        
        # Kijken of het een geldige query is
        if( !$res )
            die( $this->db->error );

        return $res->num_rows;
    }
    
     function run_query_insert( $sql )
    {
        
        # Query uitvoeren en het resultaat wegschrijven in de $res var
        $res = $this->db->query($sql);
        
        # Kijken of het een geldige query is
        if( !$res )
            die( $this->db->error );

        return $res;
    }

         function run_query_delete( $sql )
    {
        
        # Query uitvoeren en het resultaat wegschrijven in de $res var
        $res = $this->db->query($sql);
        
        # Kijken of het een geldige query is
        if( !$res )
            die( $this->db->error );

        return $res;
    }

    # Functie die de verbinding sluit & $res leegt
    function database_close( )
    {
        $this->db->close();
    }
}


?>