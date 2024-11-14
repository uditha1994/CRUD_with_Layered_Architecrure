<h2 class="mb-4"><?php echo isset($student) ? 'Edit Student' : 'Add New Student'; ?></h2>
<form id="student-form"
    action="<?php echo isset($student) ? "/students/{$student['id']}/update" : '/students/store'; ?>" method="POST"
    class="needs-validation" novalidate>
    <div class="mb-3">
        <label for="name" class="form-label">Name:</label>
        <input type="text" id="name" name="name"
            value="<?php echo isset($student) ? htmlspecialchars($student['name']) : ''; ?>" class="form-control"
            required>
        <div class="invalid-feedback">Please enter a name.</div>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email:</label>
        <input type="email" id="email" name="email"
            value="<?php echo isset($student) ? htmlspecialchars($student['email']) : ''; ?>" class="form-control"
            required>
        <div class="invalid-feedback">Please enter a valid email.</div>
    </div>
    <div class="mb-3">
        <label for="age" class="form-label">Age:</label>
        <input type="number" id="age" name="age"
            value="<?php echo isset($student) ? htmlspecialchars($student['age']) : ''; ?>" class="form-control"
            required>
        <div class="invalid-feedback">Please enter an age.</div>
    </div>
    <button type="submit"
        class="btn btn-success"><?php echo isset($student) ? 'Update Student' : 'Add Student'; ?></button>
    <a href="/students" class="btn btn-secondary ms-2">Back to List</a>
</form>