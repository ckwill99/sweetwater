<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
	</head>
	<body>
	<h1>Customer Comments</h1>
	<?php $call_array = array(); ?>
	<?php $conn = db_connect(); ?>
	<?php $res = $conn->query("SELECT * from sweetwater_test"); ?>
		<?php while($data = $res->fetch_array()): ?>
				<!-- Insert shipping date -->
				<?php if(str_contains($data['comments'], 'Expected Ship Date:')): ?>
					<?php list($comments, $ship_date) = explode('Expected Ship Date:', $data['comments']); ?>
					<?php if($ship_date != ''): ?>
						<?php $ship_date = date('Y-m-d H:i:s', strtotime($ship_date)); ?>
						<?php $conn->query("UPDATE sweetwater_test SET shipdate_expected = '".$ship_date."' WHERE orderid = '".$data['orderid']."'"); ?>
					<?php endif; ?>
				<?php else: ?>
					<?php $ship_date = ''; ?>
				<?php endif; ?>
				
				<!-- Date format for table -->
				<?php if($ship_date != ''): ?>
					<?php $ship_date = date('m/d/Y', strtotime($ship_date)); ?>
				<?php else: ?>
					<?php $ship_date = ''; ?>
				<?php endif; ?>
				
				<!-- Group call me -->
				<?php if(str_contains(strtolower($data['comments']), 'call me')): ?>
					<?php $call_array[] = array('comments'=>$data['comments'], 'shipdate_expected'=>$ship_date); ?>
				
				<!-- Group Do not call me -->
				<?php elseif(str_contains(strtolower($data['comments']), 'do not call')): ?>
					<?php $no_call_array[] = array('comments'=>$data['comments'], 'shipdate_expected'=>$ship_date); ?>
				
				<!-- Group referred -->
				<?php elseif(str_contains(strtolower($data['comments']), 'referred')): ?>
					<?php $referred_array[] = array('comments'=>$data['comments'], 'shipdate_expected'=>$ship_date); ?>
				
				<!-- Group candy -->
				<?php elseif(str_contains(strtolower($data['comments']), 'candy') || str_contains(strtolower($data['comments']), 'smarties') || str_contains(strtolower($data['comments']), 'bit o honey') || str_contains(strtolower($data['comments']), 'cinnanom ')): ?>
					<?php $candy_array[] = array('comments'=>$data['comments'], 'shipdate_expected'=>$ship_date); ?>
				
				<!-- Group signature -->
				<?php elseif(str_contains(strtolower($data['comments']), 'signature')): ?>
					<?php $signature_array[] = array('comments'=>$data['comments'], 'shipdate_expected'=>$ship_date); ?>
				
				<!-- Everything else -->
				<?php else: ?>
					<?php $misc_array[] = array('comments'=>$data['comments'], 'shipdate_expected'=>$ship_date); ?>
				<?php endif; ?>
				
		<?php endwhile; ?>
		<div class="accordion" id="comments">
			<div class="accordion-item">
				<h2 class="accordion-header" id="candy">
					<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCandy" aria-expanded="true" aria-controls="collapseCandy">
						Candy (<?php echo count($candy_array); ?>)
					</button>
				</h2>
				<div id="collapseCandy" class="accordion-collapse collapse" aria-labelledby="candy" data-bs-parent="#comments">
					<div class="accordion-body">
						<table class="table">
							<tr>
								<th>Comment</th>
								<th>Expected Ship Date</th>
							</tr>
							<?php foreach($candy_array as $key=>$value): ?>
								<tr>
									<td><?php echo $value['comments']; ?></td>
									<td><?php echo $value['shipdate_expected']; ?></td>
								</tr>
							<?php endforeach; ?>
						</table>
					</div>
				</div>
			</div>
			<div class="accordion-item">
				<h2 class="accordion-header" id="callme">
					<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCallme" aria-expanded="true" aria-controls="collapseCallme">
						Please call me (<?php echo count($call_array); ?>)
					</button>
				</h2>
				<div id="collapseCallme" class="accordion-collapse collapse" aria-labelledby="callme" data-bs-parent="#comments">
					<div class="accordion-body">
						<table class="table">
							<tr>
								<th>Comment</th>
								<th>Expected Ship Date</th>
							</tr>
							<?php foreach($call_array as $key=>$value): ?>
								<tr>
									<td><?php echo $value['comments']; ?></td>
									<td><?php echo $value['shipdate_expected']; ?></td>
								</tr>
							<?php endforeach; ?>
						</table>
					</div>
				</div>
			</div>
			<div class="accordion-item">
				<h2 class="accordion-header" id="nocall">
					<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNocall" aria-expanded="true" aria-controls="collapseNocall">
						Do not call (<?php echo count($no_call_array); ?>)
					</button>
				</h2>
				<div id="collapseNocall" class="accordion-collapse collapse" aria-labelledby="nocall" data-bs-parent="#comments">
					<div class="accordion-body">
						<table class="table">
							<tr>
								<th>Comment</th>
								<th>Expected Ship Date</th>
							</tr>
							<?php foreach($no_call_array as $key=>$value): ?>
								<tr>
									<td><?php echo $value['comments']; ?></td>
									<td><?php echo $value['shipdate_expected']; ?></td>
								</tr>
							<?php endforeach; ?>
						</table>
					</div>
				</div>
			</div>
			<div class="accordion-item">
				<h2 class="accordion-header" id="referred">
					<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseReferred" aria-expanded="true" aria-controls="collapseReferred">
						Referral (<?php echo count($referred_array); ?>)
					</button>
				</h2>
				<div id="collapseReferred" class="accordion-collapse collapse" aria-labelledby="referred" data-bs-parent="#comments">
					<div class="accordion-body">
						<table class="table">
							<tr>
								<th>Comment</th>
								<th>Expected Ship Date</th>
							</tr>
							<?php foreach($referred_array as $key=>$value): ?>
								<tr>
									<td><?php echo $value['comments']; ?></td>
									<td><?php echo $value['shipdate_expected']; ?></td>
								</tr>
							<?php endforeach; ?>
						</table>
					</div>
				</div>
			</div>
			<div class="accordion-item">
				<h2 class="accordion-header" id="signature">
					<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSignature" aria-expanded="true" aria-controls="collapseSignature">
						Signature (<?php echo count($signature_array); ?>)
					</button>
				</h2>
				<div id="collapseSignature" class="accordion-collapse collapse" aria-labelledby="signature" data-bs-parent="#comments">
					<div class="accordion-body">
						<table class="table">
							<tr>
								<th>Comment</th>
								<th>Expected Ship Date</th>
							</tr>
							<?php foreach($signature_array as $key=>$value): ?>
								<tr>
									<td><?php echo $value['comments']; ?></td>
									<td><?php echo $value['shipdate_expected']; ?></td>
								</tr>
							<?php endforeach; ?>
						</table>
					</div>
				</div>
			</div>
			<div class="accordion-item">
				<h2 class="accordion-header" id="misc">
					<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseMisc" aria-expanded="true" aria-controls="collapseMisc">
						Everything Else (<?php echo count($misc_array); ?>)
					</button>
				</h2>
				<div id="collapseMisc" class="accordion-collapse collapse" aria-labelledby="misc" data-bs-parent="#comments">
					<div class="accordion-body">
						<table class="table">
							<tr>
								<th>Comment</th>
								<th>Expected Ship Date</th>
							</tr>
							<?php foreach($misc_array as $key=>$value): ?>
								<tr>
									<td><?php echo $value['comments']; ?></td>
									<td><?php echo $value['shipdate_expected']; ?></td>
								</tr>
							<?php endforeach; ?>
						</table>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>

<?php
function db_connect(){
	$mysqli = new mysqli('localhost','root','sweet','sweetwater_test');
	if($mysqli){
		return $mysqli;
	}else{
		return false;
	}
}
?>