<?php
class Conge
{
    private $id;
    private $date;
    private $startsAt;
    private $endsAt;
    private $status;
    private $employee;

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
        $dba->query("insert into conge (date, starts_at, ends_at, status, employee) values(
                                                '" . $this->date . "',
                                                '"  . $this->startsAt . "',
                                                '"  . $this->endsAt . "',
                                                '"  . $this->status . "'
                                                '"  . $this->employee . "')");
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
        $dba->query("Select * from conge");
        return $dba->resultSet();
    }

    public function findById()
    {
        $dba = new Dbaccess();
        $dba->query("Select * from employe where id='" . $this->id . "'");
        return $dba->single();
    }

    public function findByDate($date)
    {
        $dba = new Dbaccess();
        $dba->query("Select * from conge where date ='" . $date . "'");
        return $dba->resultSet();
    }


    public function count()
    {
        $dba = new Dbaccess();
        $dba->query("Select count(*) as nbr from conge");
        return $dba->rowCount();
    }
}
