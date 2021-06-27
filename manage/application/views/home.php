 <div class="row">

 	<div class="col-md-8">
 		<div class="card card-primary">
 			<?php echo form_open_multipart('home/update_770320') ?>
 			<div class="card-header">
 				<!-- <h3 class="card-title"> -->
 				<div class="input-group pull-right">
 					<div class="custom-file">
 						<input type="file" id="770320" name="770320" class="custom-file-input">
 						<label class="custom-file-label" for="exampleInputFile">Home 770x320</label>
 					</div>
 					<div class="input-group-append">
 						<button type="submit" class="input-group-text btn-success"><i class="fa fa-upload"></i>&nbsp;Upload</button>
 					</div>
 				</div>
 				<!-- </h3> -->
 			</div>
 			<?php echo form_close()  ?>
 			<div class="card-body">
 				<img style="height:320px; width:100%" src="<?= PARENT_URL ?>/images/home/<?= $home['770x320'] ?>" alt="">
 			</div>
 		</div>
 	</div>
 	<div class="col-md-4">
 		<div class="card card-primary">
 			<?php echo form_open_multipart('home/update_380320') ?>
 			<div class="card-header">
 				<!-- <h3 class="card-title"> -->
 				<div class="input-group pull-right">
 					<div class="custom-file">
 						<input type="file" id="380320" name="380320" class="custom-file-input">
 						<label class="custom-file-label" for="exampleInputFile">Home 380x320</label>
 					</div>
 					<div class="input-group-append">
 						<button type="submit" class="input-group-text btn-success"><i class="fa fa-upload"></i>&nbsp;Upload</button>
 					</div>
 				</div>
 				<!-- </h3> -->
 			</div>
 			<?php echo form_close() ?>
 			<div class="card-body">
 				<img style="height:320px; width:100%" src="<?= PARENT_URL ?>/images/home/<?= $home['380x320'] ?>" alt="">
 			</div>
 		</div>
 	</div>
 </div>