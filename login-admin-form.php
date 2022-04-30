<!-- 
    Author - Drew Jenkins  Created Apr 21,22
    Form to process the admin's login and begin their session
-->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <title>Admin Login | Sharron Books</title>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" href="main.css">
</head>
<script src=""></script>
<body>
	
	<div class="content">
		<h3 style="text-decoration: underline;">Admin Login</h3>
	
        <form method="POST" action="../includes/login-admin.php">
            <label><b>Username</b></label>
            <input type="text" name="username" required>
            
            <label><b>Password</b></label>
            <input type="password" name="password" required>
            
            <button type="submit">Login</button>
        </form>
	</div> 
	
	<br>
	<div class="main-footer">
		<p> Sharron Books | 2022 </p>
		<p> Carson, Kylie, Joseph, Drew </p>
	</div>
	
</body>
</html> 