<?php
class Student
{
    private $conn;
    private $table_name = "students";

    public $id;
    public $name;
    public $student_id;
    public $date_of_birth;
    public $email;
    public $address;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function create()
    {
        $query = "INSERT INTO " . $this->table_name . " SET name=:name, student_id=:student_id, date_of_birth=:date_of_birth, email=:email, address=:address,";
        $stmt = $this->conn->prepare($query);

        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->student_id = htmlspecialchars(strip_tags($this->student_id));
        $this->date_of_birth = htmlspecialchars(strip_tags($this->date_of_birth));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->address = htmlspecialchars(strip_tags($this->address));

        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":student_id", $this->student_id);
        $stmt->bindParam(":date_of_birth", $this->date_of_birth);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":address", $this->address);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function read()
    {
        $query = "SELECT id, name, email FROM " . $this->table_name . " ORDER BY id DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function readOne()
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = ? LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->name = $row['name'];
        $this->student_id = $row['student_id'];
        $this->date_of_birth = $row['date_of_birth'];
        $this->email = $row['email'];
        $this->address = $row['address'];
    }

    public function update()
    {
        $query = "UPDATE " . $this->table_name . " SET name = :name, student_id = :student_id, date_of_birth = :date_of_birth, email = :email, address = :address WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->student_id = htmlspecialchars(strip_tags($this->student_id));
        $this->date_of_birth = htmlspecialchars(strip_tags($this->date_of_birth));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->address = htmlspecialchars(strip_tags($this->address));
        $this->id = htmlspecialchars(strip_tags($this->id));

        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':student_id', $this->student_id);
        $stmt->bindParam(':date_of_birth', $this->date_of_birth);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':address', $this->address);
        $stmt->bindParam(':id', $this->id);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }


    public function delete()
    {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);

        $this->id = htmlspecialchars(strip_tags($this->id));
        $stmt->bindParam(1, $this->id);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
}
