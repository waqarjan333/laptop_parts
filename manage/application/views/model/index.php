<div class="row">
	<div class="col-md-4">
		<div class="card card-primary">
			<div class="card-header">
				<h3 class="card-title">Add New Model</h3>
			</div>
			<?php echo form_open(); ?>

			<div class="card-body">
				<div class="form-group">
					<label for="brand_id" class=" control-label">Brand</label>
					<div class="">
						<select  id="brand_id" name="brand_id" class="form-control select2">
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
				<div class="form-group">
					<label for="series_id" class=" control-label"><span class="text-danger">*</span>Series</label>
					<div class="">
						<select name="series_id" id="series_id" class="form-control select2">
							<option value="">Select Brand First</option>

						</select>
						<span class="text-danger"><?php echo form_error('series_id'); ?></span>
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
				<h3 class="card-title">All Models</h3>
			</div>
			<div class="card-body">
				<table class="table table-striped table-bordered" id="mydt">
					<thead>
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>Series</th>
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

	<!-- Edit Model -->
		<div id="myModal"  class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" style="float: right;
    margin-left: -22px;">&times;</button>
          <h4 class="modal-title">Edit Model</h4>
        </div>
        <div class="modal-body">
         	<div class="form-group">
					
					<div class="row">
						
						<div class="col-md-12">
							<label for="brand_id" class=" control-label"></span>Select Brand</label>
							<select name="brand_id"  id="editBrands" class="form-control select2" data-code="editSelect">
						
						</select></div>
					</div>

						<div class="row">
						
						<div class="col-md-12">
							<label for="brand_id" class=" control-label"></span>Select Series</label>
							<select name="series_id" id="editSeries" class="form-control select2" data-code="editSelect">
						
						</select></div>
					</div>				</div>
				<div class="form-group">
					<label for="name" class=" control-label"><span class="text-danger">*</span>Name</label>
					<div class="">
						<input type="text" name="edit_name" id="edit_name"  class="form-control"  />
						<input type="hidden" id="modelID">
						<input type="hidden" id="seriesID">
						<input type="hidden" id="brandID">
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
</div>

<script>
	function get_series(id) {
		// alert()
		$.ajax({
			url: "<?= base_url('model/get_series_by_brand/') ?>" + id,
			type: "POST",
			beforeSend: function() {
				 
			},
			success: function(response) { 
				$('#series_id').html(response);
				$('#editSeries').append(response);
			}
		});
	}
	$(document).on('change','#brand_id',function(){
		var id=$(this).val();
		// alert(id)
		get_series(id);
	})
		$(document).on('change','#editBrands',function(){
		var id=$(this).val();
		// alert(id)
		get_series(id);
	})
	$(document).ready(function() {
		$('#mydt').DataTable({
			"processing": true,
			"serverSide": true,
			"ajax": {
				"url": "<?php echo base_url('model/get_list') ?>",
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
					"data": "series_name"
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
        $model = $(this).attr('code');
        $action= $(this).attr('name');
        $url='<?= base_url('model/remove/') ?>' + $model;
     	action($model,$action,$url,$status=0)

    });
			$(document).on('click', ".btn-status", function() {
        $model = $(this).attr('code');
        $action= $(this).attr('name');

        $status=($action=='status-active') ? '2' : '1';
        
        $url='<?= base_url('model/updateStatus/') ?>' + $model;
     	action($model,$action,$url,$status)

    });
	function action(model,action,url,status)
	{
		if(action=='delete')
		{
			$text1='This Model will be deleted';
			$text2='Yes ! Delete.';
			$text3='Delete Successfully.';
		}
		else if(action=='status-active')
		{
			$text1='This Model will be Suspended';
			$text2='Yes ! Suspended.';
			$text3='Suspended Successfully.';
		}
		else{
			$text1='This Model will be Active';
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
			$('#editSeries').html('');	
			 $modelID = $(this).attr('code');
			 $('#modelID').val($modelID);
			var editbrandID = $(this).attr('brandcode');
			
			// alert(editbrandID)

			var editseriesID = $(this).attr('seriescode');
			 model = $(this).parents('tr').children('td').eq(1).text().trim();
			var editseries = $(this).parents('tr').children('td').eq(2).text().trim();
         var editbrand = $(this).parents('tr').children('td').eq(3).text().trim();

         get_series(editbrandID);

        	$('#previousBrand').val(editbrand);
        	$('#edit_name').val(model);
        	if(editbrand!='')
        	{
        		var selectedBrand='<option value="'+editbrandID+'" selected="selected"  >'+editbrand+'</option>';
        	}
        	if(editseries!='' && editbrand!='')
        	{
			        	$('#editSeries').append($('<option>', {
			    value: editseriesID,
			    text: editseries
			}));	
			        		// var selectedSeries='<option value="'+editseriesID+'" selected="selected"  >'+editseries+'</option>';
        	}
        	var output='<option value="">Select Brand</option>'+
        	'<?php foreach ($brands as $brand) { ?>'+
        	'<option value="<?php echo $brand['id']?> "  ><?php echo $brand['name']; ?></option>'+
			'<?php } ?>'+
			selectedBrand;
					
        	$('#editBrands').html(output);
        	// $('#editSeries').html(output1);
			$("#myModal").modal();
    });

		$(document).on('click','.updateRecord',function(){
			var editModel=$('#edit_name').val();
			var editSeriesID=$('#editSeries').val();
			var modelID=$('#modelID').val();
			// alert(seriesID);
			  $.ajax({
                    url:'<?= base_url('model/update_model/') ?>'+ $modelID,
                    method:'POST',
                    data:{name:editModel,series_id:editSeriesID},
                    success: function(result) {
                    $('#myModal').modal('hide');	
                      $('#mydt').DataTable().ajax.reload();
                        Swal.fire({
                            title: 'Success!',
                            text: 'Model Update Successfully',
                            icon: 'success'
                        });	
                    },
                    complete: function(result) {
                      
                    }
                });
		})
	});
</script>