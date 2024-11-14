document.addEventListener('DOMContentLoaded', function () {
    // Load the student list when the page loads
    loadStudentList();

    // Function to load the student list
    function loadStudentList() {
        fetch('/students')
            .then(response => response.text())
            .then(data => {
                document.getElementById('content').innerHTML = data;
                bindDeleteButtons();
            });
    }

    // Event listener for the Add New Student button
    document.getElementById('add-student-btn').addEventListener('click', function () {
        fetch('/students/create')
            .then(response => response.text())
            .then(data => {
                document.getElementById('content').innerHTML = data;
                document.getElementById('student-form').addEventListener('submit', submitStudentForm);
            });
    });

    // Function to handle form submission for add/edit
    function submitStudentForm(event) {
        event.preventDefault();
        const form = event.target;
        const formData = new FormData(form);

        fetch(form.action, {
            method: form.method,
            body: formData,
        })
            .then(response => response.text())
            .then(() => loadStudentList());
    }

    // Function to bind delete buttons
    function bindDeleteButtons() {
        document.querySelectorAll('.delete-student-btn').forEach(button => {
            button.addEventListener('click', function () {
                fetch(`/students/${button.dataset.id}/delete`, { method: 'GET' })
                    .then(() => loadStudentList());
            });
        });
    }

});
