<?php

require_once 'dbaccess.php';

class Departement
{
    private $id;
    private $name;
    private $manager; //employee

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
        $dba->query("insert into departement (name, manager) values(
                                                '"  . $this->name . "',
                                                '"  . $this->manage . "')");
        $dba->execute();
        return 0;
    }

    public function delete()
    {
        $dba = new Dbaccess();
        $dba->query("delete from departement where id='" . $this->id . "'");
        $dba->execute();
        return 0;
    }

    public function update()
    {
        $dba = new Dbaccess();
        $dba->query("update departement set name = '" . $this->name . "',
                                        manager = '"  . $this->manager . "',
                                        where id = '"  . $this->id . "'");
        $dba->execute();
        return 0;
    }

    public function findAll()
    {
        $dba = new Dbaccess();
        $dba->query("Select * from departement");
        return $dba->resultSet();
    }

    public function findById()
    {
        $dba = new Dbaccess();
        $dba->query("Select * from departement where id='" . $this->id . "'");
        return $dba->single();
    }

    public function findByName($name)
    {
        $dba = new Dbaccess();
        $dba->query("Select * from departement where name like '%" . $name . "%'");
        return $dba->resultSet();
    }


    public function count()
    {
        $dba = new Dbaccess();
        $dba->query("Select count(*) as nbr from departement");
        return $dba->rowCount();
    }
}
