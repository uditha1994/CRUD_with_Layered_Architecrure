<?php
namespace App\Models;

class Student
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    // Retrieve all students
    public function all()
    {
        $stmt = $this->db->prepare("SELECT * FROM students ORDER BY id DESC");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    // Find a student by ID
    public function find($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM students WHERE id = :id");
        $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    // Create a new student
    public function create($data)
    {
        $st
