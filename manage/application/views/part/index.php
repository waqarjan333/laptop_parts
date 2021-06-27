<div class="row">
	<div class="col-md-12">
		<!-- general form elements -->
		<div class="card card-primary">
			<div class="card-header">
				<h3 class="card-title">Add Part</h3>
			</div>
			<!-- /.card-header -->
			<!-- form start -->
			<?php echo form_open_multipart(); ?>
			<div class="card-body">
				<div class="row">

					<div class="form-group  col-md-3">
						<label for="name" class=" control-label"><span class="text-danger">*</span>Name</label>
						<div class="">
							<input type="text" name="name" value="<?php echo $this->input->post('name'); ?>" class="form-control" id="name" />
							<span class="text-danger"><?php echo form_error('name'); ?></span>
						</div>
					</div>
					<div class="form-group col-md-3">
						<label for="brand_id" class=" control-label">Brand</label>
						<div class="">
							<select onchange="get_series()" id="brand_id" name="brand_id" class="form-control select2">
								<option value="">Select Brand</option>
								<?php
								foreach ($brands as $brand) {
									$selected = ($brand['id'] == $this->input->post('brand_id')) ? ' selected="selected"' : "";

									echo '<option value="' . $brand['id'] . '" ' . $selected . '>' . $brand['name'] . '</option>';
								}
								?>
							</select>
						</div>
					</div>
					<div class="form-group col-md-3">
						<label for="series_id" class=" control-label">Series</label>
						<div class="">
							<select name="series_id" onchange="get_model()" id="series_id" class="form-control select2">
								<option value="">Select Brand First</option>

							</select>
						</div>
					</div>
					<div class="form-group col-md-3">
						<label for="model_id" class=" control-label"><span class="text-danger">*</span>Model</label>
						<div class="">
							<select name="model_id" id="model_id" class="form-control select2">
								<option value="">Select Series First</option>
							</select>
							<span class="text-danger"><?php echo form_error('model_id'); ?></span>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-3">
						<label for="qty" class=" control-label">Qty</label>
						<div class="">
							<input type="text" name="qty" value="<?php echo $this->input->post('qty'); ?>" class="form-control" id="qty" />
						</div>
					</div>
					<div class="form-group col-md-3">
						<label for="unit_price" class=" control-label"><span class="text-danger">*</span>Unit Price</label>
						<div class="">
							<input type="text" name="unit_price" value="<?php echo $this->input->post('unit_price'); ?>" class="form-control" id="unit_price" />
						</div>
						<span class="text-danger"><?php echo form_error('unit_price'); ?></span>
					</div>
					<div class="form-group col-md-3">
						<label for="description" class=" control-label">Description</label>
						<div class="">
							<textarea name="description" class="form-control" id="description"><?php echo $this->input->post('description'); ?></textarea>
						</div>
					</div>
					<div class="form-group col-md-3">
						<label for="exampleInputFile">Part Image</label>
						<div class="input-group">
							<div class="custom-file">
								<input type="file" id="image_name" name="image_name" class="custom-file-input" id="exampleInputFile">
								<label class="custom-file-label" for="exampleInputFile">Choose file</label>
							</div>
							<div class="input-group-append">
								<span class="input-group-text">Upload</span>
							</div>
						</div>
					</div>
				</div>

			</div>
			<!-- /.card-body -->

			<div class="card-footer">
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
			<?php echo form_close(); ?>
		</div>
		<!-- /.card -->
	</div>
	<div class="col-md-12">
		<div class="card card-primary">
			<div class="card-header">
				<h3 class="card-title">All Parts</h3>
			</div>
			<div class="card-body">
				<table class="table table-striped table-bordered" id="mydt">
					<thead>
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>Image</th>
							<th>Brand</th>
							<th>Series</th>
							<th>Model</th>
							<th>Seller</th>
							<th>Qty</th>
							<th>Unit Price</th>
							<th>Description</th>
							<th>Actions</th>
						</tr>
					</thead>
				</table>
			</div>
		</div>
	</div>

</div>

<script>
	function get_series() {
		$.ajax({
			url: "<?= base_url('model/get_series_by_brand/') ?>" + $('#brand_id').val(),
			type: "POST",
			beforeSend: function() {

			},
			success: function(response) {
				$('#series_id').html(response);
			}
		});
	}

	function get_model() {
		$.ajax({
			url: "<?= base_url('part/get_model_by_series/') ?>" + $('#series_id').val(),
			type: "POST",
			beforeSend: function() {

			},
			success: function(response) {
				$('#model_id').html(response);
			}
		});
	}
	$(document).ready(function() {
		$('#mydt').DataTable({
			"processing": true,
			"serverSide": true,
			"ajax": {
				"url": "<?php echo base_url('part/get_list') ?>",
				"dataType": "json",
				"type": "POST"
			},
			"columns": [{
					"data": "id"
				},
				{
					"data": "name"
				},
				{
					"data": "image"
				},
				{
					"data": "brand"
				},
				{
					"data": "series"
				},
				{
					"data": "model"
				},
				{
					"data": "seller"
				},
				{
					"data": "qty"
				},
				{
					"data": "unit_price"
				},
				{
					"data": "description"
				},
				{
					"data": "actions"
				}
			]

		});
	});
</script>