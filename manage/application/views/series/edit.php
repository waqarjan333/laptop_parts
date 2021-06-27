<?php echo form_open('series/edit/'.$series['id'],array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="status" class="col-md-4 control-label">Status</label>
		<div class="col-md-8">
			<input type="checkbox" name="status" value="1" <?php echo ($series['status']==1 ? 'checked="checked"' : ''); ?> id='status' />
		</div>
	</div>
	<div class="form-group">
		<label for="brand_id" class="col-md-4 control-label"><span class="text-danger">*</span>Brand</label>
		<div class="col-md-8">
			<select name="brand_id" class="form-control">
				<option value="">select brand</option>
				<?php 
				foreach($all_brand as $brand)
				{
					$selected = ($brand['id'] == $series['brand_id']) ? ' selected="selected"' : "";

					echo '<option value="'.$brand['id'].'" '.$selected.'>'.$brand['name'].'</option>';
				} 
				?>
			</select>
			<span class="text-danger"><?php echo form_error('brand_id');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="name" class="col-md-4 control-label"><span class="text-danger">*</span>Name</label>
		<div class="col-md-8">
			<input type="text" name="name" value="<?php echo ($this->input->post('name') ? $this->input->post('name') : $series['name']); ?>" class="form-control" id="name" />
			<span class="text-danger"><?php echo form_error('name');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="created_by" class="col-md-4 control-label">Created By</label>
		<div class="col-md-8">
			<input type="text" name="created_by" value="<?php echo ($this->input->post('created_by') ? $this->input->post('created_by') : $series['created_by']); ?>" class="form-control" id="created_by" />
		</div>
	</div>
	<div class="form-group">
		<label for="date_created" class="col-md-4 control-label">Date Created</label>
		<div class="col-md-8">
			<input type="text" name="date_created" value="<?php echo ($this->input->post('date_created') ? $this->input->post('date_created') : $series['date_created']); ?>" class="form-control" id="date_created" />
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>
	
<?php echo form_close(); ?>