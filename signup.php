<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="mystyle.css" rel="stylesheet">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body class="grey_bg">
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="homepage.php">Sign Up</a>
        </div>
    </nav>
    
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">Sign Up</div>
                    <div class="card-body">
                        
                    <form method="POST" action="addstudents.php">
                            
                            <div class="mb-3">
                                <label class="form-label">Forename:</label>
                                <input type="text" name="forename" class="form-control" required>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Surname:</label>
                                <input type="text" name="surname" class="form-control" required>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Password:</label>
                                <input type="password" name="passwd" class="form-control" required>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Role:</label><br>
                                <input type="radio" name="role" value="Pupil" checked> Student<br>
                                <input type="radio" name="role" value="Teacher"> Teacher<br>
                                <input type="radio" name="role" value="Admin"> Admin<br>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">House:</label>
                                <input type="text" name="house" class="form-control" required>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Year Group:</label>
                                <input type="text" name="year" class="form-control" required>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Gender:</label><br>
                                <select name="gender">
                                <option value="M">Male</option>
                                <option value="F">Female</option>
                                </select>
                            </div>
                            
                            <button type="submit" class="btn btn-dark w-100">Sign Up</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<?php