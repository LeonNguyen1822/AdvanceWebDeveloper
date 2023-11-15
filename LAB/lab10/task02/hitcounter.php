<?php
class HitCounter
{
    private $host;
    private $user;
    private $pswd;
    private $conn;
    private $dbnm;


    public function __construct($host, $user, $pswd, $dbnm)
    {
        $this->host = $host;
        $this->user = $user;
        $this->pswd = $pswd;
        $this->dbnm = $dbnm;

        $this->conn = @mysqli_connect($this->host, $this->user, $this->pswd)
            or die("<p>Unable to connect to the database server.</p>"
                . "<p>Error code " . mysqli_connect_errno()
                . ": " . mysqli_connect_error() . "</p>");
        echo "<p style=\"color:green\">Successfully connected to the database server.</p>";
        @mysqli_select_db($this->conn, $this->dbnm)
            or die("<p>Unable to select the database.</p>"
                . "<p>Error code " . mysqli_errno($this->conn)
                . ": " . mysqli_error($this->conn) . "</p>");
        echo "<p style=\"color:green\">Successfully opened the database. </p>";
    }

    public function setHits()
    {
        $query_setHits = "UPDATE hitcounter SET hits = hits + 1 WHERE id = 1";
        mysqli_query($this->conn, $query_setHits);
    }

    public function getHits()
    {
        $query_getHits = "SELECT hits FROM hitcounter WHERE id = 1";
        $result = mysqli_query($this->conn, $query_getHits);
        if ($row = mysqli_fetch_assoc($result)) {
            return $row['hits'];
        }
    }
    public function closeConnection()
    {
        $this->conn->close();
    }

    public function startOver(){
        $query_restart = "UPDATE hitcounter SET hits = 0 WHERE id = 1";
        mysqli_query($this->conn, $query_restart);
    }
    
    public function checkAndCreate()
    {
        $querycheck = "SHOW TABLES LIKE 'hitcounter'";
        $query_result = mysqli_query($this->conn, $querycheck);
        if ($query_result->num_rows == 0) {
            echo '<p>Table "hitcounter" does not exist. </p>';
            echo '<p>Attempting to create table "hitcounter" . . .</p>';
            $sql = "CREATE TABLE hitcounter (
                id SMALLINT NOT NULL PRIMARY KEY,
                hits SMALLINT NOT NULL)";
            if (mysqli_query($this->conn, $sql)) {
                echo "<p>Table 'hitcounter' created successfully</p>";
                $query_insert = "INSERT INTO hitcounter (id, hits) VALUES (1,0)";
                if (mysqli_query($this->conn, $query_insert)) {
                    echo "Insert first value successful";
                } else {
                    echo "Unable to insert first value";
                }
            } else {
                echo "<p>Error creating table: " . mysqli_error($this->conn) . "</p>";
            }
        }
    }
}
