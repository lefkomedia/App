<?php
require_once "app/app.php";
$app = new App();

$app->title = 'Mileage';

$app->table = 'miles';
$app->primary_key = 'EntryID';

$app->start();

$query = $app->db->query("SELECT * FROM io_miles ORDER BY TravelDate DESC");
?>

<p><a href="#add-mileage" data-toggle="modal" class="btn btn-primary">Add Mileage</a></p>

<div class="table-responsive">
<table class="table table-striped table-hover" id="list-mileage" data-template="<tr><td>{{TravelDate}}</td><td>{{Miles}}</td><td>{{Description}}</td><td><button class='btn btn-danger btn-xs' data-action='delete' data-id='{{ID}}'>&times;</button></td></tr>">
<thead>
	<th>Date</th>
	<th>Miles</th>
	<th colspan="2">Description</th>
</thead>
<?php while( $entry = $query->fetch_assoc() ) { ?>
<tr>
	<td><?= $entry['TravelDate'] ?></td>
	<td><?= $entry['Miles'] ?></td>
	<td><?= $entry['Description'] ?></td>
	<td><button class="btn btn-danger btn-xs" data-action="delete" data-id="<?= $entry['EntryID'] ?>">&times;</button></td>
</tr>
<?php } ?>
</table>
</div>

<div class="modal fade" id="add-mileage" tabindex="-1" role="dialog" aria-labelledby="modal-title" aria-hidden="true">
<div class="modal-dialog">
	<div class="modal-content">
		<form action="#list-mileage" id="form-add-mileage" class="form-ajax">
		
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="modal-title">Add Mileage Entry</h4>
		</div>
		<div class="modal-body">
		
			<div class="form-group">
				<label for="TravelDate">Travel Date</label>
				<input type="date" name="TravelDate" id="TravelDate" value="<?= date('Y-m-d') ?>" class="form-control">
			</div>
			<div class="form-group">
				<label for="Miles">Miles</label>
				<input type="text" name="Miles" id="Miles" class="form-control">
			</div>
			<div class="form-group">
				<label for="Description">Description</label>
				<textarea name="Description" id="Description" rows="2" class="form-control"></textarea>
			</div>
			
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			<button type="submit" class="btn btn-primary">Add</button>
		</div>
		
		<input type="hidden" name="action" value="insert">
		<input type="hidden" name="table" value="miles">
		</form>
	</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<?php
$app->end();