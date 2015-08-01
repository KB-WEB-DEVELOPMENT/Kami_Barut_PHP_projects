<?php

    class QueryIterator implements Iterator     {
        
        private $result;
        private $connection;
        private $data;
        private $key=0;
        private $valid;
        
        function __construct($dbname, $user, $password) {
            $this->connection = pg_connect("dbname={$dbname} user={$user} password={$password}");
        }
        
        public function execute($query) {
            $this->result = pg_query($this->connection,$query);
            if (pg_num_rows($this->result)>0)
            $this->next();
        }
        
        public function rewind() {}
        
        
        public function current() {
            return $this->data;
        }
        
        public function key() {
            return $this->key;
        }
        
        public function next() {
            if ($this->data = pg_fetch_assoc($this->result))    {
                $this->valid = true;
                $this->key+=1;
                
            }   else $this->valid = false;
        }
        
        public function valid() {
            return $this->valid;
        }
    }
    
//implementation

    $qi= new QueryIterator("usersDB","user1","password1");
    $qi->execute("select name, email from users");
    
    while ($qi->valid())    {
        print_r($qi->current());
        $qi->next();
    }
    
/* example output

Array
(
    [name] => Afif
    [email] => mayflower@phpxperts.net
)

Array
(
    [name] => Ayesha
    [email] => florence@phpxperts.net
)

*/

?>


