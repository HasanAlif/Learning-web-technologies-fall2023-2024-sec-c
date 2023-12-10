<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .dashboard {
            width: 100%;
            height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        .subject-list {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1rem;
        }
        .subject {
            border: 1px solid #ccc;
            padding: 1rem;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }
        .subject:hover {
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <div class="dashboard">
        <h1>Welcome to Dashboard</h1>
        <div class="subject-list">
            <div class="subject" onclick="selectSubject('Mathematics')">Mathematics</div>
            <div class="subject" onclick="selectSubject('Physics')">Physics</div>
            <div class="subject" onclick="selectSubject('Chemistry')">Chemistry</div>
            <div class="subject" onclick="selectSubject('Biology')">Biology</div>
            <div class="subject" onclick="selectSubject('Computer Science')">Computer Science</div>
        </div>
    </div>
    <script>
        function selectSubject(subject) {
            alert(`You have selected ${subject}`);
        }
    </script>
</body>
</html>