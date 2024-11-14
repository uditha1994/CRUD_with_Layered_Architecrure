<?php
namespace App\Controllers;

use App\Models\Student;

class StudentController
{
    private $studentModel;

    public function __construct($db)
    {
        $this->studentModel = new Student($db);
    }

    public function index()
    {
        $students = $this->studentModel->all();
        include __DIR__ . "/../../resources/views/students/partials/student-list.php";
    }

    public function create()
    {
        include __DIR__ . "/../../resources/views/students/partials/student-form.php";
    }

    public function store($data)
    {
        $this->studentModel->create($data);
    }

    public function edit($id)
    {
        $student = $this->studentModel->find($id);
        include __DIR__ . "/../../resources/views/students/partials/student-form.php";
    }

    public function update($id, $data)
    {
        $this->studentModel->update($id, $data);
    }

    public function delete($id)
    {
        $this->studentModel->delete($id);
    }
}
