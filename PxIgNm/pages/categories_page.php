<div class="main-grid">
			<div class="agile-grids">	
				<div class="agile-tables">
					<div class="w3l-table-info">
					  <h3>Categories</h3>
					  <?php if (isset($_COOKIE["cookieSuccessMessageAddCat"])) {  ?>
					  	<div class="alert alert-success" role="alert">
							<strong>Success!</strong> <?php echo $_COOKIE["cookieSuccessMessageAddCat"]; ?>
						</div>
					  <?php } ?>
					  <?php if (isset($_COOKIE["cookieErrorMessageAddCat"])) {  ?>
					  	<div class="alert alert-danger" role="alert">
							<strong>Error!</strong> <?php echo $_COOKIE["cookieErrorMessageAddCat"]; ?>
						</div>
					  <?php } ?>	
					    <table id="table">
						<thead>
						  <tr>
							<th colspan="2">Name</th>
							<th>URL</th>
							<th>Bid Margin</th>
							<th width="25%">&nbsp;</th>
						  </tr>
						</thead>
						<tbody>
						<?php
						  if($getallcategories_query){
						    for ($i=0; $i < count($getallcategories_query) ; $i++) {
						?>
						  <tr>
							<td data-th="Name" colspan="2"><span class="bt-content"><b><?php echo $getallcategories_query[$i]['category_name']; ?></b></span></td>
							<td data-th="URL"><span class="bt-content"><?php echo $getallcategories_query[$i]['category_url']; ?></span></td>
							<td>&nbsp;</td>
							<td data-th="icons">
							  <span class="bt-content">
							    <b><a href="<?php echo BACKEND_PATH.'add-sub-category?cat_id='.$getallcategories_query[$i]['category_id']; ?>" >
							      Add sub-category
							    </a></b> &nbsp; 
							    <a title="edit">
					    			<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
					    		</a> &nbsp; 
							    <a href="<?php echo BACKEND_PATH;?>categories?deletecatid=<?php echo $getallcategories_query[$i]['category_id']; ?>" title="" onclick="return confirm('Are you sure you want to delete this catagory?')"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
							  </span>
							</td>
						  </tr>
						<?php
							$subcat = getsubcategorybycategoryid($getallcategories_query[$i]['category_id']);
							  if($subcat){
							  	for ($x=0; $x < count($subcat) ; $x++) { 
						?>
								  <tr>
								    <td>&nbsp;</td>
								    <td><span class="bt-content"><?php echo $subcat[$x]['sub_category_name']; ?></span></td>
								    <td><span class="bt-content"><?php echo $subcat[$x]['sub_category_url']; ?></span></td>
								    <td><?php echo getbidmargin($subcat[$x]['sub_category_id']).'%'; ?></td>
								    <td>
								    	<span class="bt-content">
								    		<a title="view" href="<?php echo BACKEND_PATH.'view-sub-category?sub_cat_id='.$subcat[$x]['sub_category_id']; ?>">
								    			<i class="fa fa-eye" aria-hidden="true"></i>
								    		</a> &nbsp; 
								    		<a title="edit">
								    			<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
								    		</a> &nbsp; 
								    		
								    			<a href="<?php echo BACKEND_PATH;?>categories?deletesubcatid=<?php echo $subcat[$x]['sub_category_id']; ?>" title="" onclick="return confirm('Are you sure you want to delete this sub catagory?')"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
								    		
								    		<a title="add specification" href="<?php echo BACKEND_PATH.'add-spec-for-sub-category?sub_cat_id='.$subcat[$x]['sub_category_id']; ?>">
								    			Add specification
								    		</a>
								    	</span>
								    </td>
						  		  </tr>
						<?php
							  	}
							  }
						    }
						  }
						?>
						</tbody>
					  </table>

				  	  <div class="form-group">
						<div class="col-md-12">&nbsp;</div>
					  </div>
					  <div class="form-group forms">
						<div class="col-sm-2"><a href="<?php echo BACKEND_PATH.'add-category'; ?>" class="blueButton">Add New Category</a></div>
						<div class="col-sm-6">&nbsp;</div>
						<div class="col-sm-4">&nbsp;</div>
					  </div>
					</div>
				</div>
			</div>
		</div>