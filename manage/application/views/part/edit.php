<?php echo form_open('part/edit/'.$part['id'],array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="model_id" class="col-md-4 control-label">Model</label>
		<div class="col-md-8">
			<select name="model_id" class="form-control">
				<option value="">select model</option>
				<?php 
				foreach($all_model as $model)
				{
					$selected = ($model['id'] == $part['model_id']) ? ' selected="selected"' : "";

					echo '<option value="'.$model['id'].'" '.$selected.'>'.$model['name'].'</option>';
				} 
				?>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label for="series_id" class="col-md-4 control-label">Series Id</label>
		<div class="col-md-8">
			<input type="text" name="series_id" value="<?php echo ($this->input->post('series_id') ? $this->input->post('series_id') : $part['series_id']); ?>" class="form-control" id="series_id" />
		</div>
	</div>
	<div class="form-group">
		<label for="created_by" class="col-md-4 control-label">Created By</label>
		<div class="col-md-8">
			<input type="text" name="created_by" value="<?php echo ($this->input->post('created_by') ? $this->input->post('created_by') : $part['created_by']); ?>" class="form-control" id="created_by" />
		</div>
	</div>
	<div class="form-group">
		<label for="date_created" class="col-md-4 control-label">Date Created</label>
		<div class="col-md-8">
			<input type="text" name="date_created" value="<?php echo ($this->input->post('date_created') ? $this->input->post('date_created') : $part['date_created']); ?>" class="form-control" id="date_created" />
		</div>
	</div>
	<div class="form-group">
		<label for="name" class="col-md-4 control-label"><span class="text-danger">*</span>Name</label>
		<div class="col-md-8">
			<input type="text" name="name" value="<?php echo ($this->input->post('name') ? $this->input->post('name') : $part['name']); ?>" class="form-control" id="name" />
			<span class="text-danger"><?php echo form_error('name');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="seller_id" class="col-md-4 control-label">Seller Id</label>
		<div class="col-md-8">
			<input type="text" name="seller_id" value="<?php echo ($this->input->post('seller_id') ? $this->input->post('seller_id') : $part['seller_id']); ?>" class="form-control" id="seller_id" />
		</div>
	</div>
	<div class="form-group">
		<label for="qty" class="col-md-4 control-label">Qty</label>
		<div class="col-md-8">
			<input type="text" name="qty" value="<?php echo ($this->input->post('qty') ? $this->input->post('qty') : $part['qty']); ?>" class="form-control" id="qty" />
		</div>
	</div>
	<div class="form-group">
		<label for="unit_price" class="col-md-4 control-label">Unit Price</label>
		<div class="col-md-8">
			<input type="text" name="unit_price" value="<?php echo ($this->input->post('unit_price') ? $this->input->post('unit_price') : $part['unit_price']); ?>" class="form-control" id="unit_price" />
		</div>
	</div>
	<div class="form-group">
		<label for="brand_id" class="col-md-4 control-label">Brand Id</label>
		<div class="col-md-8">
			<input type="text" name="brand_id" value="<?php echo ($this->input->post('brand_id') ? $this->input->post('brand_id') : $part['brand_id']); ?>" class="form-control" id="brand_id" />
		</div>
	</div>
	<div class="form-group">
		<label for="description" class="col-md-4 control-label">Description</label>
		<div class="col-md-8">
			<textarea name="description" class="form-control" id="description"><?php echo ($this->input->post('description') ? $this->input->post('description') : $part['description']); ?></textarea>
		</div>
	</div>
	<div class="form-group">
		<label for="image_name" class="col-md-4 control-label">Image Name</label>
		<div class="col-md-8">
			<textarea name="image_name" class="form-control" id="image_name"><?php echo ($this->input->post('image_name') ? $this->input->post('image_name') : $part['image_name']); ?></textarea>
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>
	
<?php echo form_close(); ?>