<?php 
  $this->load->view('partials/head');
?>
  <title>User Login</title>
</head>
<body>
<?php 
  $this->load->view('partials/navbar');
  $this->load->view('partials/messages');
  $this->load->view('partials/modal');
?>
	<div class="container">
		<div class="row">
  		<div class="col-md-12">
				<div class="row">
				  <div class="col-md-6">
				  	<h1>Register</h1>
				  	<form action="register" method="POST">
						  <div class="form-group">
						    <label for="name">Name:</label>
						    <input type="text" class="form-control" id="name" name="name" placeholder=" Full Name">
						  </div>
						  <div class="form-group">
						    <label for="alias">Alias:</label>
						    <input type="text" class="form-control" id="alias" name="alias" placeholder="Password">
						  </div>
						  <div class="form-group">
						    <label for="email">Email address:</label>
						    <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email">
						  </div>
						  <div class="form-group">
						    <label for="password">Password:</label>
						    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
						  </div>
						  <div class="form-group">
						    <label for="confirm_password">Confirm Password:</label>
						    <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Password">
						  </div>
						  <div class="form-group">
						    <label for="date_of_birth">Date of Birth:</label>
						    <input type="date" class="form-control" id="date_of_birth" name="date_of_birth">
						  </div>
						  <input type="submit" class="btn btn-info" value="Register">
						</form>
				  </div>
				  <div class="col-md-6">
						<h1>Sign In</h1>
						<form action="login" method="POST">
						  <div class="form-group">
						    <label for="email">Email address:</label>
						    <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email">
						  </div>
						  <div class="form-group">
						    <label for="password">Password:</label>
						    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
						  </div>
						  <input type="submit" class="btn btn-info" value="Sign In">
						</form>
				  </div>
				</div>

			</div>
		</div>
	</div>
</body>
</head>