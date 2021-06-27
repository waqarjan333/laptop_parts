<?php echo form_open('part/add', array("class" => "form-horizontal")); ?>

<div class="form-group">
	<label for="model_id" class=" control-label">Model</label>
	<div class="">
		<select name="model_id" class="form-control">
			<option value="">select model</option>
			<?php
			foreach ($all_model as $model) {
				$selected = ($model['id'] == $this->input->post('model_id')) ? ' selected="selected"' : "";

				echo '<option value="' . $model['id'] . '" ' . $selected . '>' . $model['name'] . '</option>';
			}
			?>
		</select>
	</div>
</div>
<div class="form-group">
	<label for="series_id" class=" control-label">Series Id</label>
	<div class="">
		<input type="text" name="series_id" value="<?php echo $this->input->post('series_id'); ?>" class="form-control" id="series_id" />
	</div>
</div>
<div class="form-group">
	<label for="created_by" class=" control-label">Created By</label>
	<div class="">
		<input type="text" name="created_by" value="<?php echo $this->input->post('created_by'); ?>" class="form-control" id="created_by" />
	</div>
</div>
<div class="form-group">
	<label for="date_created" class=" control-label">Date Created</label>
	<div class="">
		<input type="text" name="date_created" value="<?php echo $this->input->post('date_created'); ?>" class="form-control" id="date_created" />
	</div>
</div>

<div class="form-group">
	<label for="seller_id" class=" control-label">Seller Id</label>
	<div class="">
		<input type="text" name="seller_id" value="<?php echo $this->input->post('seller_id'); ?>" class="form-control" id="seller_id" />
	</div>
</div>
<div class="form-group">
	<label for="qty" class=" control-label">Qty</label>
	<div class="">
		<input type="text" name="qty" value="<?php echo $this->input->post('qty'); ?>" class="form-control" id="qty" />
	</div>
</div>
<div class="form-group">
	<label for="unit_price" class=" control-label">Unit Price</label>
	<div class="">
		<input type="text" name="unit_price" value="<?php echo $this->input->post('unit_price'); ?>" class="form-control" id="unit_price" />
	</div>
</div>
<div class="form-group">
	<label for="brand_id" class=" control-label">Brand Id</label>
	<div class="">
		<input type="text" name="brand_id" value="<?php echo $this->input->post('brand_id'); ?>" class="form-control" id="brand_id" />
	</div>
</div>
<div class="form-group">
	<label for="description" class=" control-label">Description</label>
	<div class="">
		<textarea name="description" class="form-control" id="description"><?php echo $this->input->post('description'); ?></textarea>
	</div>
</div>
<div class="form-group">
	<label for="image_name" class=" control-label">Image Name</label>
	<div class="">
		<textarea name="image_name" class="form-control" id="image_name"><?php echo $this->input->post('image_name'); ?></textarea>
	</div>
</div>

<div class="form-group">
	<div class="col-sm-offset-4 col-sm-8">
		<button type="submit" class="btn btn-success">Save</button>
	</div>
</div>

<?php echo form_close(); ?>