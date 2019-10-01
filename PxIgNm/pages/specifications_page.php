<div class="main-grid">
			<div class="agile-grids">	
				<div class="agile-tables">
					<div class="w3l-table-info">
					  <h3>Specifications</h3>
					  <?php if (isset($_COOKIE["cookieSuccessMessageAddSpec"])) {  ?>
					  	<div class="alert alert-success" role="alert">
							<strong>Success!</strong> <?php echo $_COOKIE["cookieSuccessMessageAddSpec"]; ?>
						</div>
					  <?php } ?>	
					    <table id="table">
						<thead>
						  <tr>
							<th colspan="2">ID</th>
							<th>Name</th>
							<th width="25%">&nbsp;</th>
						  </tr>
						</thead>
						<tbody>
						<?php
						  if($getallspecifications_query){
						    for ($i=0; $i < count($getallspecifications_query) ; $i++) {
						?>
						  <tr>
							<td data-th="Name" colspan="2"><span class="bt-content"><b><?php echo $getallspecifications_query[$i]['spec_type_id']; ?></b></span></td>
							<td data-th="URL"><span class="bt-content"><?php echo $getallspecifications_query[$i]['spec_type_name']; ?></span></td>
							<td data-th="icons">
							  <span class="bt-content">
							    <a>edit</a> | <a>delete</a>
							  </span>
							</td>
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
					  <div class="form-group forms">
						<div class="col-sm-2"><a href="<?php echo BACKEND_PATH.'add-specification'; ?>" class="blueButton">Add New Specification</a></div>
						<div class="col-sm-6">&nbsp;</div>
						<div class="col-sm-4">&nbsp;</div>
					  </div>
					</div>
				</div>
			</div>
		</div>