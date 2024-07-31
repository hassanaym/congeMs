<?php
require_once 'dbaccess.php';


class CongeType
{
    private $id;
    private $typeName;
    private $numberOfDays;
    private $db;

    public function __construct()
    {
    }

    public function __get($property)
    {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

    public function __set($property, $value)
    {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        }
    }


    public function save()
    {
        $dba = new Dbaccess();
        $dba->query("insert into conge_type (type_name, number_of_days) values(
                                                '"  . $this->typeName . "',
                                                '"  . $this->numberOfDays . "')");
        $dba->execute();
        return 0;
    }

    public function delete()
    {
        $dba = new Dbaccess();
        $dba->query("delete from conge_type where id='" . $this->id . "'");
        $dba->execute();
        return 0;
    }

    public function update()
    {
        $dba = new Dbaccess();
        $dba->query("update congeType set type_name = '" . $this->typeName . "',
                                        number_of_days = '"  . $this->numberOfDays . "',
                                        where id = '"  . $this->id . "'");
        $dba->execute();
        return 0;
    }

    public function findAll()
    {
        $dba = new Dbaccess();
        $dba->query("Select * from conge_type");
        return $dba->resultSet();
    }

    public function findById()
    {
        $dba = new Dbaccess();
        $dba->query("Select * from conge_type where id='" . $this->id . "'");
        return $dba->single();
    }

    public function findByName($name)
    {
        $dba = new Dbaccess();
        $dba->query("Select * from conge_type where type_name like '%" . $name . "%'");
        return $dba->resultSet();
    }


    public function count()
    {
        $dba = new Dbaccess();
        $dba->query("Select count(*) as nbr from conge_type");
        return $dba->rowCount();
    }
}
