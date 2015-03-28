<?php 
  $this->load->view('partials/head');
?>
  <title>Profile Page</title>
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
				<h3>Welcome, <?= $this->session->userdata('name'); ?></h3>
<?php 	$pokeCount = 0;
				foreach ($pokes as $poke) 
				{
					$pokeCount += $poke['poke_count'];
				}
?>			<h4>Number of people who poked you: <?= count($pokes) ?></h4>
				<h4>Total Pokes: <?= $pokeCount; ?></h4>
				<div class="col-lg-4 box">
				<h5>Poke Logs:</h5>
<!-- LOOP STARTS -->
<?php 	$pokeCount = 0;
				foreach ($pokes as $poke) 
				{
					$pokeCount += $poke['poke_count'];
?>				<h5><?= $poke['name']; ?> poked you <?= $poke['poke_count']; ?> time(s).</h5>
<?php 
				}
?>
<!-- LOOP Ends -->
				</div>
  		</div>
  	</div>
  </div>
	
  <div class="container">
		<div class="row">
  		<div class="col-md-12">
				<h3>People you may want to poke:</h3>
				<table class="table table-bordered">
		      <thead>
		        <tr>
		          <th>User ID</th>
		          <th>Name</th>
		          <th>Alias</th>
		          <th>Email Address</th>
		          <th>Poke History</th>
		          <th>Action</th>
		        </tr>
		      </thead>
		      <tbody>
<!-- LOOP STARTS -->
<?php 			foreach ($users as $user)
						{
							$query = "SELECT * FROM pokes where pokes.user_id = ?";
							$pokes = $this->db->query($query, $user['id'])->result_array();
							$pokeCount = 0;
							foreach ($pokes as $poke) 
							{
								$pokeCount += $poke['poke_count'];
							}
?>		        <tr>
			          <td><?= $user['id']; ?></td>
			          <td><?= $user['name']; ?>
			          </td>
			          <td><?= $user['alias']; ?></td>
			          <td><?= $user['email']; ?></td>
			          <td>Poked <?= $pokeCount ?> Time(s)</td>
			          <td>
			          	<form action="/pokeUser" method="POST">
			          		<input type="hidden" name="user_id" value="<?= $user['id']; ?>">
			          		<input type="hidden" name="poker_id" value="<?= $this->session->userdata('id'); ?>">
			          		<input type="submit" class="btn btn-info" value="Poke">
			          	</form>
			          </td>
			        </tr>
<?php 			} 
?>
<!-- LOOP ENDS -->
		      </tbody>
		    </table>			
  		</div>
  	</div>
  </div>
</body>
</html>