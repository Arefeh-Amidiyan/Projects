<?php




    function pdodb($host, $dbname, $user, $pass)
    {
        try {
            $cn = new PDO("mysql:host=localhost;dbname=daily-planner", 'root', '', [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
            ]);
        } catch (Throwable $exception) {
            exit('Error DB Connection ...');
        }
    }

    function delete($query)
    {
        try {
            $stmt = $this->connect->prepare($query);
            $stmt->execute();
            $num = $stmt->rowCount();
            return $num;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
        }
    }

    function insert($query)
    {
        try {
            $stmt = $this->connect->prepare($query);
            $stmt->execute();
            $num = $stmt->rowCount();
            if ($num) return $num;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
        }
    }

    function update($query)
    {
        try {
            $stmt = $this->connect->prepare($query);
            $stmt->execute();
            $num = $stmt->rowCount();
            if ($num) return $num;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
        }
    }

    function select($query)
    {
        try {
            $stmt = $this->connect->prepare($query);
            $stmt->execute();
            if ($results = $stmt->fetchAll(PDO::FETCH_OBJ)) {
                return $results;
            } else return false;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
        }
    }


?>
