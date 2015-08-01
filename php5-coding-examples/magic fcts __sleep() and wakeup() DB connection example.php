<?php
 
 // note: use as reference, this will not work as pg_connect() opens a connection to a PostgreSQL database specified by the connection_string.
 // $dbconn3 = pg_connect("host=sheep port=5432 dbname=mary user=lamb password=foo");
  
    class ResourceObject    {
    
        private $resource;
        private $dsn;
    
        public function __construct($dsn)   {
    
            $this->dsn = $dsn;
            $this->resource = pg_connect("host=localhost port=5432 dbname=mary");
        }
    
        public function __sleep()   {
            
            pg_close($this->resource);
            return array_keys( get_object_vars( $this ) );
        }
    
        public function __wakeup()  {
            
            $this->resource = pg_connect($this->dsn);
        }
    }
    
    $resourceObj = new ResourceObject("test");
    var_dump($resourceObj);

?>
