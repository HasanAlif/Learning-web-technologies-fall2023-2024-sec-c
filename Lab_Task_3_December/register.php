<!DOCTYPE html>
<html>
<head>
<title>Registration Form</title>
<style>
body {
    font-family: Arial, Helvetica, sans-serif;
}

.container {
    width: 300px;
    padding: 16px;
    background-color: white;
    margin: 0 auto;
    margin-top: 100px;
    border: 1px solid black;
    border-radius: 4px;
}

input[type=text], input[type=number], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

button:hover {
    opacity: 0.8;
}

.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
}

img.avatar {
    width: 40%;
    border-radius: 50%;
}

.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}
h1{
    text-align: center;
    margin: 50px;
}

</style>
</head>
<body>

<h1>Registration Form</h1>

<div class="container">
<form action="/Lab_Exam_Final_Term/control_registration.php">
 <label for="uname"><b>Name</b></label>
 <input type="text" placeholder="Enter Employee Name" name="ename" required>

 <label for="cnumber"><b>Email</b></label>
 <input type="number" placeholder="Enter Contact Number" name="cnumber" required>

 <label for="uname"><b>Phone</b></label>
 <input type="text" placeholder="Enter Username" name="uname" required>

 <label for="psw"><b>Password</b></label>
 <input type="password" placeholder="Enter Password" name="psw" required>

 <button type="submit">Register</button>
 </form>
</div>

</body>
</html>