<?php 
class Db {
    // The database connection
    protected static $connection;
    const LOCALHOST = '192.169.153.194';
    const USER = 'cdp2017_lab';
    const PASSWORD = 'Blanco2019';
    const DATABASE = 'cdl_db1';
    /**
     * Connect to the database
     * 
     * @return bool false on failure / mysqli MySQLi object instance on success
     */
    public function connect() {    
        // Try and connect to the database
         $connection = new mysqli(self::LOCALHOST, self::USER, self::PASSWORD, self::DATABASE);
 
          if (mysqli_connect_errno())
          {
             die(printf('MySQL Server connection failed: %s', mysqli_connect_error()));
          }
    }
    /**
     * Query the database
     *
     * @param $query The query string
     * @return mixed The result of the mysqli::query() function
     */
    public function query($query) {
        // Connect to the database
        $connection = new mysqli(self::LOCALHOST, self::USER, self::PASSWORD, self::DATABASE);
        if (mysqli_connect_errno())
        {
            die(printf('MySQL Server connection failed: %s', mysqli_connect_error()));
        }
        // Query the database
        $result = $connection -> query($query);
        return $result;
        $connection -> close();
    } 
    /**
     * Fetch rows from the database (SELECT query)
     *
     * @param $query The query string
     * @return bool False on failure / array Database rows on success
     */
    public function select($query) {
        $rows = array();
        $result = $this -> query($query);
        while ($row = $result -> fetch_assoc()) {
            $rows[] = $row;
        }
       return $rows;
       $this -> close();
    }
    public function select_next_result($sql) 
    {
        $mysql = new mysqli(self::LOCALHOST, self::USER, self::PASSWORD, self::DATABASE);
        if (mysqli_connect_errno())
        {
            die(printf('MySQL Server connection failed: %s', mysqli_connect_error()));
        }
         // Check our query results
        if ($mysql->multi_query($sql))
        {
            $show_results = true;
            $rs = array();
            do 
            {
                if ($result = $mysql->use_result())
                {
                    while ($row = $result->fetch_array(MYSQLI_ASSOC))
                    {
                        $rs[] = $row;
                    }
                    $result->close();
                }
            } while ($mysql->next_result());
        }
        else
        {
             echo '<p>There were problems with your query [' . $sql . ']:<br /><strong>Error Code ' . $mysql->errno . ' :: Error Message ' . $mysql->error . '</strong></p>';
        }
       $mysql->close();
       if ($show_results) 
       {
          /* echo '<pre>';
           print_r($rs);
           echo '< /pre>';*/
           return $rs;
       }
    }
    /**
     * Fetch the last error from the database
     * 
     * @return string Database error message
     */
    public function error() {
          $connection = new mysqli(self::LOCALHOST, self::USER, self::PASSWORD, self::DATABASE);
          if (mysqli_connect_errno())
          {
             die(printf('MySQL Server connection failed: %s', mysqli_connect_error()));
          }
          return $connection -> error;
    }

    /**
     * Quote and escape value for use in a database query
     *
     * @param string $value The value to be quoted and escaped
     * @return string The quoted and escaped string
     */
    public function quote($value) {
          $connection = new mysqli(self::LOCALHOST, self::USER, self::PASSWORD, self::DATABASE);
          if (mysqli_connect_errno())
          {
             die(printf('MySQL Server connection failed: %s', mysqli_connect_error()));
          }
          return "'" . $connection -> real_escape_string($value) . "'";
    }
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function get_vendor_by_iduser($id)
  {
    $sql = "SELECT * FROM tb_vendor WHERE id_user = '$id'";
    $rows = $this->select($sql);
        return $rows;
  }
  public function get_status_vendor_by_id($id_vendor)
  {
    
    $sql = "SELECT * FROM tbr_vendor_v_status WHERE id_vendor = '$id_vendor' AND end_date = '0000-00-00'";
    $rows = $this->select($sql);
        return $rows;
  }

}
?>