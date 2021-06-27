<?php echo form_open('model/edit/'.$model['id'],array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="series_id" class="col-md-4 control-label"><span class="text-danger">*</span>Series</label>
		<div class="col-md-8">
			<select name="series_id" class="form-control">
				<option value="">select series</option>
				<?php 
				foreach($all_series as $series)
				{
					$selected = ($series['id'] == $model['series_id']) ? ' selected="selected"' : "";

					echo '<option value="'.$series['id'].'" '.$selected.'>'.$series['name'].'</option>';
				} 
				?>
			</select>
			<span class="text-danger"><?php echo form_error('series_id');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="name" class="col-md-4 control-label"><span class="text-danger">*</span>Name</label>
		<div class="col-md-8">
			<input type="text" name="name" value="<?php echo ($this->input->post('name') ? $this->input->post('name') : $model['name']); ?>" class="form-control" id="name" />
			<span class="text-danger"><?php echo form_error('name');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="status" class="col-md-4 control-label">Status</label>
		<div class="col-md-8">
			<input type="text" name="status" value="<?php echo ($this->input->post('status') ? $this->input->post('status') : $model['status']); ?>" class="form-control" id="status" />
		</div>
	</div>
	<div class="form-group">
		<label for="created_by" class="col-md-4 control-label">Created By</label>
		<div class="col-md-8">
			<input type="text" name="created_by" value="<?php echo ($this->input->post('created_by') ? $this->input->post('created_by') : $model['created_by']); ?>" class="form-control" id="created_by" />
		</div>
	</div>
	<div class="form-group">
		<label for="date_created" class="col-md-4 control-label">Date Created</label>
		<div class="col-md-8">
			<input type="text" name="date_created" value="<?php echo ($this->input->post('date_created') ? $this->input->post('date_created') : $model['date_created']); ?>" class="form-control" id="date_created" />
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>
	
<?php echo form_close(); ?>