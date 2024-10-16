<?php
require_once 'dbaccess.php';

class Conge
{
    private $id;
    private $date;
    private $startsAt;
    private $endsAt;
    private $status;
    private $employee;
    private $congeType;

    public function __construct() {}

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
        $sql = "insert into conge (date, starts_at, ends_at, status, conge_type, id_employee) values(
                                                '" . $this->date . "',
                                                '"  . $this->startsAt . "',
                                                '"  . $this->endsAt . "',
                                                '"  . $this->status . "',
                                                '"  . $this->congeType . "',
                                                '"  . $this->employee . "')";

        $dba->query($sql);
        $dba->execute();
        return 0;
    }

    public function delete()
    {
        $dba = new Dbaccess();
        $dba->query("delete from conge where id='" . $this->id . "'");
        $dba->execute();
        return 0;
    }

    public function update()
    {
        $dba = new Dbaccess();
        $dba->query("update conge set date = '" . $this->date . "',
                                        starts_at = '"  . $this->startsAt . "',
                                        ends_at = '"  . $this->endsAt . "',
                                        status = '"  . $this->status . "',
                                        id_employee = '"  . $this->employee . "' 
                                        where id = '"  . $this->id . "'");
        $dba->execute();
        return 0;
    }

    public function findAll()
    {
        $dba = new Dbaccess();
        $dba->query("Select *, c.id as id_cng, e.id as id_emp from conge c inner join employee e on(c.id_employee = e.id) inner join conge_type ct on(ct.id = c.conge_type)");
        return $dba->resultSet();
    }

    public function findById($id)
    {
        $dba = new Dbaccess();
        $dba->query("Select *, c.id as id_cng, e.id as id_emp from conge c inner join employee e on(c.id_employee = e.id) inner join conge_type ct on(ct.id = c.conge_type) where c.id='" . $id . "'");
        return $dba->single();
    }

    public function findByDate($date)
    {
        $dba = new Dbaccess();
        $dba->query("Select *, c.id as id_cng, e.id as id_emp from conge c inner join employee e on(c.id_employee = e.id) inner join conge_type ct on(ct.id = c.conge_type) where date ='" . $date . "'");
        return $dba->resultSet();
    }


    public static function count()
    {
        $dba = new Dbaccess();
        $dba->query("Select count(*) as nbr from conge");
        return $dba->single();
    }
}
