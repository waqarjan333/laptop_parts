<div class="pull-right">
	<a href="<?php echo site_url('home_380x320/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table table-striped table-bordered">
    <tr>
		<th>ID</th>
		<th>Status</th>
		<th>Created By</th>
		<th>Date Created</th>
		<th>Image Name</th>
		<th>Actions</th>
    </tr>
	<?php foreach($home_380x320 as $h){ ?>
    <tr>
		<td><?php echo $h['id']; ?></td>
		<td><?php echo $h['status']; ?></td>
		<td><?php echo $h['created_by']; ?></td>
		<td><?php echo $h['date_created']; ?></td>
		<td><?php echo $h['image_name']; ?></td>
		<td>
            <a href="<?php echo site_url('home_380x320/edit/'.$h['id']); ?>" class="btn btn-info btn-xs">Edit</a> 
            <a href="<?php echo site_url('home_380x320/remove/'.$h['id']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
<div class="pull-right">
    <?php echo $this->pagination->create_links(); ?>    
</div>
