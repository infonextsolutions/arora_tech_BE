		<?php
		include_once "include/head.php";

		?>

		<tr>
			<th><label for="Title">*Title</label></th>
			<td><input class="form-control required" type="text" name="title" value="Property for sale" /></td>
		</tr>
		<tr>
			<th><label for="Locality">*Locality</label></th>
			<td><input class="form-control   locality required" type="text" name="cityArea" id="locality" value="<?php if (isset($row['locality'])) {
																														echo $row['locality'];
																													} elseif (is_numeric($row['sectorno'])) {
																														echo "Sector " . $row['sectorno'];
																													} else {
																														echo $row['sectorno'];
																													} ?>" /></td>
		</tr>
		<tr>
			<th><label for="city">*City</label></th>
			<td><input class="form-control   locality required" type="text" name="field_location" id="city" value="Gurgaon" /></td>
		</tr>
		<tr>
			<th><label for="remark">Description of property</label></th>
			<td>

				<textarea name="field_description" required id="remark" rows="0" cols="0" class="form-control  " value=""><?php if (isset($row['remark'])) {
																																echo  $row['remark'];
																															} elseif (isset($row['remarks'])) {
																																echo  $row['remarks'];
																															} else {
																																echo "";
																															} ?></textarea>
			</td>
		</tr>
		<tr>
			<th><label for="name">Contact Number </label></th>

			<td><input class="form-control   area required" required id="number" type="text" name="field_contact_number" value="09811586101" /></td>





		</tr>
		<tr>
			<th><label for="name">Contact Name </label></th>

			<td><input class="form-control   area required" required id="name" type="text" name="field_dealers_name" value="Arun Arora" /></td>





		</tr>
		<tr>
			<th><label for="email">Contact Email </label></th>

			<td><input class="form-control   area required" id="email" type="text" name="field_email" value="info@arorarealtech.com" /></td>





		</tr>

		<tr>
			<th>
				<label for="meta_soft_id">Property ID </label></th>
			<td>

				<input type="text" name="field_property_code" value="<?php echo $table . ':' . $id; ?>" readonly="readonly" class="form-control  ">

			</td>
		</tr>

		<tr>

			<th> <label for="image">Upload Images</label></th>
			<td>
				<div class="photo_container">

					<div id="photos">
						<div>
							<input required type="file" name="image" value="choose" />
						</div>
					</div>

				</div>
			</td>
		</tr>
		<tr>

			<td><input type="submit" name="submit" value="Upload" class=" btn btn-outline-primary"></td>
			<td> <input type="reset" name="reset" value="Reset" class=" btn btn-outline-primary"></td>
		</tr>