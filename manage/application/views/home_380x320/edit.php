<?php echo form_open('home_380x320/edit/'.$home_380x320['id'],array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="status" class="col-md-4 control-label">Status</label>
		<div class="col-md-8">
			<input type="checkbox" name="status" value="1" <?php echo ($home_380x320['status']==1 ? 'checked="checked"' : ''); ?> id='status' />
		</div>
	</div>
	<div class="form-group">
		<label for="created_by" class="col-md-4 control-label">Created By</label>
		<div class="col-md-8">
			<input type="text" name="created_by" value="<?php echo ($this->input->post('created_by') ? $this->input->post('created_by') : $home_380x320['created_by']); ?>" class="form-control" id="created_by" />
		</div>
	</div>
	<div class="form-group">
		<label for="date_created" class="col-md-4 control-label">Date Created</label>
		<div class="col-md-8">
			<input type="text" name="date_created" value="<?php echo ($this->input->post('date_created') ? $this->input->post('date_created') : $home_380x320['date_created']); ?>" class="form-control" id="date_created" />
		</div>
	</div>
	<div class="form-group">
		<label for="image_name" class="col-md-4 control-label">Image Name</label>
		<div class="col-md-8">
			<textarea name="image_name" class="form-control" id="image_name"><?php echo ($this->input->post('image_name') ? $this->input->post('image_name') : $home_380x320['image_name']); ?></textarea>
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>
	
<?php echo form_close(); ?>