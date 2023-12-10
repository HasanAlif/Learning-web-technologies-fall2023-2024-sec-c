<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    
</head>
<body>
    <div class="container">
        <h2>Admin Dashboard</h2>
        <h3>Student Information</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="tableBody">
            </tbody>
        </table>

        <h3>Add Student</h3>
        <form id="studentForm">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email">
            </div>
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" class="form-control" id="phone" placeholder="Enter Phone" name="phone">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script>
        

        
        function fetchStudents() {
            fetch(serverURL + '/students')
                .then(response => response.json())
                .then(data => {
                    let tableBody = document.getElementById('tableBody');
                    tableBody.innerHTML = '';
                    data.forEach(student => {
                        let tr = document.createElement('tr');
                        tr.innerHTML = `
                            <td>${student.id}</td>
                            <td>${student.name}</td>
                            <td>${student.email}</td>
                            <td>${student.phone}</td>
                            <td>
                                <button class="btn btn-primary btn-sm" onclick="editStudent(${student.id})">Edit</button>
                                <button class="btn btn-danger btn-sm" onclick="deleteStudent(${student.id})">Delete</button>
                            </td>
                        `;
                        tableBody.appendChild(tr);
                    });
                });
        }

        
        function addStudent(event) {
            event.preventDefault();
            let formData = new FormData(document.getElementById('studentForm'));
            fetch(serverURL + '/students', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    fetchStudents();
                    document.getElementById('studentForm').reset();
                }
            });
        }

        
        function editStudent(id) {
           
        }

        
    