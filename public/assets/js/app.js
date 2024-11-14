document.addEventListener('DOMContentLoaded', function () {
    console.log("DOM fully loaded and parsed.");
    
    // Initial function to load the student list
    loadStudentList();

    // Function to load the student list into the page
    function loadStudentList() {
        fetch('../resources/views/students')
            .then(response => response.text())
            .then(data => {
                // Update the content div with the student list HTML
                document.getElementById('content').innerHTML = data;
                bindEventListeners();
            })
            .catch(error => console.error('Error loading student list:', error));
    }

    // Function to bind event listeners to the dynamically loaded content
    function bindEventListeners() {
        console.log("Binding event listeners...");

        // Handle "Add New Student" button click
        const addButton = document.getElementById('add-student-btn');
        if (addButton) {
            addButton.addEventListener('click', loadStudentForm);
            console.log("Add New Student button listener bound.");
        } else {
            console.log("Add New Student button not found.");
        }

        // Add additional event listeners for editing, deleting, etc., if necessary
    }

    // Function to load the form to add a new student
    function loadStudentForm() {
        console.log("Add New Student button clicked. Loading form...");
        fetch('../resources/views/students/create')
            .then(response => response.text())
            .then(data => {
                // Insert the form HTML into the page
                document.getElementById('content').innerHTML = data;
                handleFormSubmit();
            })
            .catch(error => console.error('Error loading student form:', error));
    }

    // Function to handle form submission
    function handleFormSubmit() {
        const form = document.getElementById('student-form');
        if (form) {
            form.addEventListener('submit', function (event) {
                event.preventDefault();
                
                // Create FormData object from the form
                const formData = new FormData(form);
                fetch(form.action, {
                    method: 'POST',
                    body: formData,
                })
                .then(response => response.text())
                .then(() => loadStudentList())  // Reload the student list after form submission
                .catch(error => console.error('Error submitting student form:', error));
            });
        }
    }

    // Function to handle edit student operation (to be added if needed)
    function editStudent(id) {
        console.log("Editing student with ID: " + id);
        fetch(`/students/${id}/edit`)
            .then(response => response.text())
            .then(data => {
                // Insert the form HTML into the page
                document.getElementById('content').innerHTML = data;
                handleFormSubmit();
            })
            .catch(error => console.error('Error loading student edit form:', error));
    }

    // Function to handle delete student operation (to be added if needed)
    function deleteStudent(id) {
        if (confirm('Are you sure you want to delete this student?')) {
            fetch(`/students/${id}/delete`, { method: 'DELETE' })
                .then(response => response.text())
                .then(() => loadStudentList())  // Reload the student list after deletion
                .catch(error => console.error('Error deleting student:', error));
        }
    }
});