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
						<select name="sub_cat_id" id="sub_cat_id" class="form-control category select2" data-code="insertSubSelect">
							
							
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
		<div id="myModal"  class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
	   <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" style="float: right;
    margin-left: -22px;">&times;</button>
          <h4 class="modal-title">Edit Category</h4>
        </div>
        <div class="modal-body">
         	<div class="form-group">
					
					<div class="row">
						
						<div class="col-md-12">
							<label for="brand_id" class=" control-label"></span>Select Category</label>
							<select name="brand_id"  id="editCategory" class="form-control select2" data-code="editSelect">
						
						</select></div>
					</div>

						<div class="row">
						
						<div class="col-md-12">
							<label for="brand_id" class=" control-label"></span>Select Sub Category</label>
							<select name="series_id" id="editsubCategory" class="form-control select2" data-code="editSelect">
						
						</select></div>
					</div>				</div>
				<div class="form-group">
					<label for="name" class=" control-label"><span class="text-danger">*</span>Name</label>
					<div class="">
						<input type="text" name="edit_name" id="edit_name"  class="form-control"  />
						<input type="hidden" id="brandID">
						<input type="hidden" id="categoryID">
						<input type="hidden" id="subCategoryID">
						<span class="text-danger"><?php echo form_error('name'); ?></span>
					</div>
				</div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-info updateRecord">Update</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  <!-- Edit Model End Here -->
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
				function get_Subcategories(id) {
		// alert()
		$.ajax({
			url: "<?= base_url('brand/get_SubcategoriesByCat/') ?>" + id,
			type: "POST",
			beforeSend: function() {
				 
			},
			success: function(response) { 
				$('#series_id').html(response);
				$('#editsubCategory').append(response);
			}
		});
	}

			$(document).on('change','#editCategory',function(){
				$('#editsubCategory').html('');	
		var id=$(this).val();
		// alert(id)
		get_Subcategories(id);
	})

				$(document).on('click', ".btn-edit", function() {
			$('#editsubCategory').html('');	
			 $brandID = $(this).attr('code');
			 	var categoryID = $(this).attr('categoryID');
			var sub_categoryID = $(this).attr('sub_categoryID');
			 $('#brandID').val($brandID);
			 $('#subCategoryID').val(sub_categoryID);
			 $('#categoryID').val(categoryID);
		
			// alert(sub_categoryID)

			
			 brand = $(this).parents('tr').children('td').eq(1).text().trim();
			var editCategory = $(this).parents('tr').children('td').eq(2).text().trim();
         var editChildCategory = $(this).parents('tr').children('td').eq(3).text().trim();
          get_Subcategories(categoryID);
          // $('#previousBrand').val(editbrand);
        	$('#edit_name').val(brand);

        	$("#myModal").modal();

				   
        	if(editCategory!='')
        	{
        		var selectedCategory='<option value="'+categoryID+'" selected="selected"  >'+editCategory+'</option>';
        	}

        	if(editCategory!='' && editChildCategory!='')
        	{
        		var selectedSubCategory='<option value="'+sub_categoryID+'" selected="selected"  >'+editChildCategory+'</option>';
        	}

        	var output='<option value="">Select Category</option>'+
        	'<?php foreach ($categories as $category) { ?>'+
        	'<option value="<?php echo $category['id']?> "  ><?php echo $category['name']; ?></option>'+
			'<?php } ?>'+
			selectedCategory;

			
        	$('#editCategory').html(output);
        	
        	$('#editsubCategory').append(selectedSubCategory);

    });
    
    	$(document).on('click','.updateRecord',function(){
			var editBrand=$('#edit_name').val();
			var categoryID=$('#editCategory').val();
			var subcategoryID=$('#editsubCategory').val();
			var brandID=$('#brandID').val();
			// alert(seriesID);
			  $.ajax({
                    url:'<?= base_url('brand/update_brandModel/') ?>'+ $brandID,
                    method:'POST',
                    data:{name:editBrand,category_id:categoryID,sub_category_id:subcategoryID},
                    success: function(result) {
                    $('#myModal').modal('hide');	
                      $('#mydt').DataTable().ajax.reload();
                        Swal.fire({
                            title: 'Success!',
                            text: 'Brand Update Successfully',
                            icon: 'success'
                        });	
                    },
                    complete: function(result) {
                      
                    }
                });
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