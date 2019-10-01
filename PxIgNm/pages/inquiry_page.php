<div class="main-grid">
			<div class="agile-grids">	
				<div class="agile-tables">
					<div class="w3l-table-info">
					  <h3>Inquiries</h3>
					  <?php if (isset($_COOKIE["cookieSuccessMessageAddSpec"])) {  ?>
					  	<div class="alert alert-success" role="alert">
							<strong>Success!</strong> <?php echo $_COOKIE["cookieSuccessMessageAddSpec"]; ?>
						</div>
					  <?php } ?>	
					    <table id="table">
						<thead>
						  <tr>
							<th>Inquiry ID</th>
							<th>Name</th>
							<th>Email</th>
							<th>Number</th>
							<th>Message</th>
							<th>Date</th>
						  </tr>
						</thead>
						<tbody>
						<?php
						  if($inquiries){
						    for ($i=0; $i < count($inquiries) ; $i++) {
						?>
						  <tr>
						  	<td data-th="Id"><?php echo $inquiries[$i]['contact_user_id']; ?></td>
							<td data-th="Name"><?php echo $inquiries[$i]['contact_user_name']; ?></td>
							<td data-th="Email"><?php echo $inquiries[$i]['contact_user_email']; ?></td>
							<td data-th="Number"><?php echo $inquiries[$i]['contact_user_number']; ?></td>
							<td data-th="Message"><?php echo $inquiries[$i]['contact_user_message']; ?></td>
							<td data-th="Date"><?php echo $inquiries[$i]['contact_user_date']; ?></td>
						  </tr>
						<?php
						    }
						  }
						?>
						</tbody>
					  </table>

				  	  <div class="form-group">
						<div class="col-md-12">&nbsp;</div>
					  </div>
					  
					</div>
				</div>
			</div>
		</div>