<?php
require_once 'dbaccess.php';

class Employee
{
    private $id;
    private $registration;
    private $firstname;
    private $lastname;
    private $address;
    private $dob;
    private $pob;
    private $startDate;
    private $works; //departement
    private $manage; //departement
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
        $dba->query("insert into employee (registration, firstname, lastname, address, dob, pob, start_date, works, manage) values(
                                                '" . $this->registration . "',
                                                '"  . $this->firstname . "',
                                                '"  . $this->lastname . "',
                                                '"  . $this->address . "',
                                                '"  . $this->dob . "',
                                                '"  . $this->pob . "',
                                                '"  . $this->startDate . "',
                                                '"  . $this->works . "',
                                                '"  . $this->manage . "')");
        $dba->execute();
        return 0;
    }

    public function delete()
    {
        $dba = new Dbaccess();
        $dba->query("delete from employee where id='" . $this->id . "'");
        $dba->execute();
        return 0;
    }

    public function update()
    {
        $dba = new Dbaccess();
        $dba->query("update employee set registration = '" . $this->registration . "',
                                        firstname = '"  . $this->firstname . "',
                                        lastname = '"  . $this->lastname . "',
                                        address = '"  . $this->address . "',
                                        dob = '"  . $this->dob . "',
                                        pob = '"  . $this->pob . "',
                                        start_date = '"  . $this->startDate . "',
                                        works = '"  . $this->works . "',
                                        manage = '"  . $this->manage . "' 
                                        where id = '"  . $this->id . "'");
        $dba->execute();
        return 0;
    }

    public function findAll()
    {
        $dba = new Dbaccess();
        $dba->query("Select *,e.id as id_emp, dw.name as dep_works, dm.name as dep_manage from employee e left join departement dw on(e.works=dw.id) left join departement dm on(e.manage = dm.id)");
        return $dba->resultSet();
    }

    public function findById($id)
    {
        $dba = new Dbaccess();
        $dba->query("Select *,e.id as id_emp, dw.name as dep_works, dm.name as dep_manage from employee e left join departement dw on(e.works=dw.id) left join departement dm on(e.manage = dm.id) where e.id='" . $id . "'");
        return $dba->single();
    }

    public function findByFirstnameAndLastname($firstname, $lastname)
    {
        $dba = new Dbaccess();
        $dba->query("Select *,e.id as id_emp, dw.name as dep_works, dm.name as dep_manage from employee e left join departement dw on(e.works=dw.id) left join departement dm on(e.manage = dm.id) where firstname like '%" . $firstname . "%' and lastname like '%" . $lastname . "%'");
        return $dba->resultSet();
    }


    public function count()
    {
        $dba = new Dbaccess();
        $dba->query("Select count(*) as nbr from employee");
        return $dba->rowCount();
    }
}
