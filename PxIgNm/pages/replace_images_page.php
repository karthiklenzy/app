<div class="main-grid">
	<div class="agile-grids">	
		<div class="agile-tables">
			<div class="w3l-table-info">
			  <h3>Replace Images : <?php echo getproductname($product_id); ?></h3>
			  <form method="post" enctype="multipart/form-data">
			  <table id="table">
				<tbody>
				  <tr>
					<td width="25%">Main Image</td>
					<td>
						<input type="file" id="uploadImage" name="files" accept="image/*" class="form-control" required="required">
						<span style="display: inline-flex; font-size: 12px;"> (300px x 400px Recomended) </span>
					</td>
				  </tr>
				  <tr>
					<td>Additional Images</td>
					<td>
						<input type="file" id="uploadadditionalImage" name="additionalfiles[]" multiple="multiple" accept="image/*" class="form-control" required="required">
						<span style="display: inline-flex; font-size: 12px; font-weight: bold;"> (Add only 2 Images) </span>
					</td>
				  </tr>
				  <tr>
				  	<td>&nbsp;</td>
				  	<td><input type="submit" name="btnsubmit" value="Replace Images" class="approveButton"></td>
				  </tr>
				</tbody>
			  </table>
			  </form>
			</div>
		</div>
	</div>
</div>