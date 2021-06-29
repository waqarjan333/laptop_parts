<div class="row">
	<div class="col-md-4">
		<div class="card card-primary">
			<div class="card-header">
				<h3 class="card-title">Add New Brand</h3>
			</div>
			<?php echo form_open(); ?>

			<div class="card-body">
			<div class="form-group">
					<label for="parent_cat_id" class=" control-label"><span class="text-danger">*</span>Parent Category</label>
					<div class="">
						<select name="parent_cat_id" id="parent_cat_id" class="form-control select2" data-code="insertSelect">
							<option value="">Select Parent Category</option>
							<?php
							foreach ($categories as $category) {
								$selected = ($category['id'] == $this->input->post('parent_cat_id')) ? ' selected="selected"' : "";

								echo '<option value="' . $category['id'] . '" ' . $selected . '>' . $category['name'] . '</option>';
							}
							?>
						</select>
						<span class="text-danger"><?php echo form_error('parent_cat_id'); ?></span>
					</div>
				</div>

				<div class="form-group">
					<label for="sub_cat_id" class=" control-label"><span class="text-danger">*</span>Sub Category</label>
					<div class="">
						<select name="sub_cat_id" id="sub_cat_id" class="form-control select2" data-code="insertSubSelect">
							
							
						</select>
						<span class="text-danger"><?php echo form_error('sub_cat_id'); ?></span>
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
		<div class="card card-primary">
			<div class="card-header">
				<h3 class="card-title">All Brands</h3>
			</div>
			<div class="card-body">
				<table class="table table-striped table-bordered" id="mydt">
					<thead>
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>Category</th>
							<th>Sub Category</th>
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
		$('#mydt').DataTable({
			"processing": true,
			"serverSide": true,
			"ajax": {
				"url": "<?php echo base_url('brand/get_list') ?>",
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
					"data": "category"
				},
				{
					"data": "sub_category"
				},
				{
					"data": "status"
				},
				{
					"data": "actions"
				},
			]

		});
	});

	$(document).on('click', ".btn-delete", function() {
        $brand_id = $(this).attr('code');
        $action= $(this).attr('name');
        $url='<?= base_url('brand/remove/') ?>' + $brand_id;
     	action($brand_id,$action,$url,$status=0)

    });
$(document).on('click', ".btn-status", function() {
        $brand_id = $(this).attr('code');
        $action= $(this).attr('name');

        $status=($action=='status-active') ? '2' : '1';
        
        $url='<?= base_url('brand/updateStatus/') ?>' + $brand_id;
     	action($brand_id,$action,$url,$status)

    });
	function action(brand_id,action,url,status)
	{
		if(action=='delete')
		{
			$text1='This Brand will be deleted';
			$text2='Yes ! Delete.';
			$text3='Delete Successfully.';
		}
		else if(action=='status-active')
		{
			$text1='This Brand will be Suspended';
			$text2='Yes ! Suspended.';
			$text3='Suspended Successfully.';
		}
		else{
			$text1='This Brand will be Active';
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
	$(document).on('click', ".btn-edit", function() {
        $brand_id = $(this).attr('code');
        // $obj = $(this);
        brand = $(this).parents('tr').children('td').eq(1).text().trim();
		

        Swal.fire({
            title: 'Update Brand',
            html: '<input id="swal-input1" class="swal2-input" value="' + brand + '">',
            confirmButtonText: 'Update',
            focusConfirm: false,
            preConfirm: () => {
                return [
                    document.getElementById('swal-input1').value
                ]
            }
        }).then(function(result) {
            if (result.isConfirmed) {
                $.ajax({
                    url: "<?= base_url('brand/update_brand/') ?>" + $brand_id,
                    method: 'POST',
                    data: {
                        name: result.value[0]
                    },
                    success: function(result) {},
                    complete: function(result) {
                        $('#mydt').DataTable().ajax.reload();
                        Swal.fire({
                            title: 'Success!',
                            text: 'updated successfuly',
                            icon: 'success'
                        });
                    }
                });
            }
        });

    });

	function get_sub_categories(id) {
		// alert()
		$.ajax({
			url: "<?= base_url('brand/get_sub_categories/') ?>" + id,
			type: "POST",
			beforeSend: function() {
				 
			},
			success: function(response) { 
				$('#sub_cat_id').html(response);
			}
		});
	}
	$(document).on('change','#parent_cat_id',function(){
		get_sub_categories($(this).val());
	})
</script>