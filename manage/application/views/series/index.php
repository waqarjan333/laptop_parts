<div class="row">
	<div class="col-md-4">
		<div class="card card-primary">
			<div class="card-header">
				<h3 class="card-title">Add New Series</h3>
			</div>
			<?php echo form_open(); ?>

			<div class="card-body">
				<div class="form-group">
					<label for="brand_id" class=" control-label"><span class="text-danger">*</span>Brand</label>
					<div class="">
						<select name="brand_id" class="form-control select2">
							<option value="">Select Brand</option>
							<?php
							foreach ($brands as $brand) {
								$selected = ($brand['id'] == $this->input->post('brand_id')) ? ' selected="selected"' : "";

								echo '<option value="' . $brand['id'] . '" ' . $selected . '>' . $brand['name'] . '</option>';
							}
							?>
						</select>
						<span class="text-danger"><?php echo form_error('brand_id'); ?></span>
					</div>
				</div>
				<div class="form-group">
					<label for="name" class=" control-label"><span class="text-danger">*</span>Name</label>
					<div class="">
						<input type="text" name="name" value="<?php echo $this->input->post('name'); ?>" class="form-control" id="name" />
						<span class="text-danger"><?php echo form_error('name'); ?></span>
					</div>
				</div>
			</div>
			<div class="card-footer">
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
			<?php echo form_close(); ?>
		</div>
	</div>

	<div class="col-md-8">
		<input type="hidden" id="brandsval">
		<div class="card card-primary">
			<div class="card-header">
				<h3 class="card-title">All Series</h3>
			</div>
			<div class="card-body">
				<table class="table table-striped table-bordered" id="mydt">
					<thead>
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>Brand</th>
							<th>Date Created</th>
							<th>Status</th>
							<th>Actions</th>
						</tr>
					</thead>
				</table>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function() {
		getBrand();
		$('#mydt').DataTable({
			"processing": true,
			"serverSide": true,
			"ajax": {
				"url": "<?php echo base_url('series/get_list') ?>",
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
					"data": "brand_name"
				},
				{
					"data": "date_created"
				},
				{
					"data": "status"
				},
				{
					"data": "actions"
				},
			]

		});
			$(document).on('click', ".btn-delete", function() {
        $series = $(this).attr('code');
        $action= $(this).attr('name');
        $url='<?= base_url('series/remove/') ?>' + $series;
     	action($series,$action,$url,$status=0)

    });
		$(document).on('click', ".btn-status", function() {
        $series = $(this).attr('code');
        $action= $(this).attr('name');

        $status=($action=='status-active') ? '2' : '1';
        
        $url='<?= base_url('series/updateStatus/') ?>' + $series;
     	action($series,$action,$url,$status)

    });
	function action(series,action,url,status)
	{
		if(action=='delete')
		{
			$text1='This Series will be deleted';
			$text2='Yes ! Delete.';
			$text3='Delete Successfully.';
		}
		else if(action=='status-active')
		{
			$text1='This Series will be Suspended';
			$text2='Yes ! Suspended.';
			$text3='Suspended Successfully.';
		}
		else{
			$text1='This Series will be Active';
			$text2='Yes ! Active.';
			$text3='Active Successfully.';
		}
		// alert(url)
	   Swal.fire({
            title: 'are you sure ?',
            text:$text1,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: $text2,
            cancelButtonText: 'No! Cancel',
            confirmButtonClass: 'btn btn-success mt-2',
            cancelButtonClass: 'btn btn-danger ml-2 mt-2',
            buttonsStyling: false
        }).then(function(action) {
            if (action.isConfirmed) {
                $.ajax({
                    url:url ,
                    method:'POST',
                    data:{status:status},
                    success: function(result) {},
                    complete: function(result) {
                        $('#mydt').DataTable().ajax.reload();
                        Swal.fire({
                            title: 'Success!',
                            text: $text3,
                            icon: 'success'
                        });
                    }
                });
            }
        });	
	}
	function getBrand()
	{
	  $.ajax({
                    url: "<?= base_url('brand/getBrand/') ?>",
                    method: 'POST',
                    success: function(result) {
                    	// console.log(result)
                    	$('#brandsval').val(result);

                    }
	});
	}
		$(document).on('click', ".btn-edit", function() {
			// getBrand();
			// alert(getBrand())
			$brands=$('#brandsval').val();
			// alert($brands)
			// inputOptions["455"] = brands;
        $series_id = $(this).attr('code');
        // $obj = $(this);
        series = $(this).parents('tr').children('td').eq(1).text().trim();
        brand = $(this).parents('tr').children('td').eq(2).text().trim();
		

    });

	});
</script>