@extends('layout')
@section('content')
<style>
  .push-top {
    margin-top: 50px;
  }
</style>
<div class="push-top">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <h1>Customer Comments</h1>
  <div class="accordion" id="comments">
			<div class="accordion-item">
				<h2 class="accordion-header" id="candy">
					<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCandy" aria-expanded="true" aria-controls="collapseCandy">
						Candy ({{$candy_array->count()}})
					</button>
				</h2>
				<div id="collapseCandy" class="accordion-collapse collapse" aria-labelledby="candy" data-bs-parent="#comments">
					<div class="accordion-body">
						<table class="table">
							<tr>
								<th>Comment</th>
								<th>Expected Ship Date</th>
							</tr
							@foreach($candy_array as $candy)
								<tr>
									<td>{{$candy->comments}}</td>
									<td><?php if($candy->shipdate_expected != '0000-00-00 00:00:00'): ?> {{Carbon\Carbon::parse($candy->shipdate_expected)->format('m/d/Y')}} <?php endif; ?></td>
								</tr>
							@endforeach
						</table>
					</div>
				</div>
			</div>
			<div class="accordion-item">
				<h2 class="accordion-header" id="callme">
					<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCallme" aria-expanded="true" aria-controls="collapseCallme">
						Please call me ({{$call_array->count()}})
					</button>
				</h2>
				<div id="collapseCallme" class="accordion-collapse collapse" aria-labelledby="callme" data-bs-parent="#comments">
					<div class="accordion-body">
						<table class="table">
							<tr>
								<th>Comment</th>
								<th>Expected Ship Date</th>
							</tr>
							@foreach($call_array as $call)
								<tr>
									<td>{{$call->comments}}</td>
									<td><?php if($call->shipdate_expected != '0000-00-00 00:00:00'): ?> {{Carbon\Carbon::parse($call->shipdate_expected)->format('m/d/Y')}} <?php endif; ?></td>
								</tr>
							@endforeach
						</table>
					</div>
				</div>
			</div>
			<div class="accordion-item">
				<h2 class="accordion-header" id="nocall">
					<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNocall" aria-expanded="true" aria-controls="collapseNocall">
						Do not call ({{$no_call_array->count()}})
					</button>
				</h2>
				<div id="collapseNocall" class="accordion-collapse collapse" aria-labelledby="nocall" data-bs-parent="#comments">
					<div class="accordion-body">
						<table class="table">
							<tr>
								<th>Comment</th>
								<th>Expected Ship Date</th>
							</tr>
							@foreach($no_call_array as $nocall)
								<tr>
									<td>{{$nocall->comments}}</td>
									<td><?php if($nocall->shipdate_expected != '0000-00-00 00:00:00'): ?> {{Carbon\Carbon::parse($nocall->shipdate_expected)->format('m/d/Y')}} <?php endif; ?></td>
								</tr>
							@endforeach
						</table>
					</div>
				</div>
			</div>
			<div class="accordion-item">
				<h2 class="accordion-header" id="referred">
					<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseReferred" aria-expanded="true" aria-controls="collapseReferred">
						Referral ({{$refer_array->count()}})
					</button>
				</h2>
				<div id="collapseReferred" class="accordion-collapse collapse" aria-labelledby="referred" data-bs-parent="#comments">
					<div class="accordion-body">
						<table class="table">
							<tr>
								<th>Comment</th>
								<th>Expected Ship Date</th>
							</tr>
							@foreach($refer_array as $refer)
								<tr>
									<td>{{$refer->comments}}</td>
									<td><?php if($refer->shipdate_expected != '0000-00-00 00:00:00'): ?> {{Carbon\Carbon::parse($refer->shipdate_expected)->format('m/d/Y')}} <?php endif; ?></td>
								</tr>
							@endforeach
						</table>
					</div>
				</div>
			</div>
			<div class="accordion-item">
				<h2 class="accordion-header" id="signature">
					<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSignature" aria-expanded="true" aria-controls="collapseSignature">
						Signature ({{$signature_array->count()}})
					</button>
				</h2>
				<div id="collapseSignature" class="accordion-collapse collapse" aria-labelledby="signature" data-bs-parent="#comments">
					<div class="accordion-body">
						<table class="table">
							<tr>
								<th>Comment</th>
								<th>Expected Ship Date</th>
							</tr>
							@foreach($signature_array as $signature)
								<tr>
									<td>{{$signature->comments}}</td>
									<td><?php if($signature->shipdate_expected != '0000-00-00 00:00:00'): ?> {{Carbon\Carbon::parse($signature->shipdate_expected)->format('m/d/Y')}} <?php endif; ?></td>
								</tr>
							@endforeach
						</table>
					</div>
				</div>
			</div>
			<div class="accordion-item">
				<h2 class="accordion-header" id="misc">
					<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseMisc" aria-expanded="true" aria-controls="collapseMisc">
						Everything Else ({{$misc_array->count()}})
					</button>
				</h2>
				<div id="collapseMisc" class="accordion-collapse collapse" aria-labelledby="misc" data-bs-parent="#comments">
					<div class="accordion-body">
						<table class="table">
							<tr>
								<th>Comment</th>
								<th>Expected Ship Date</th>
							</tr>
							@foreach($misc_array as $misc)
								<tr>
									<td>{{$misc->comments}}</td>
									<td><?php if($misc->shipdate_expected != '0000-00-00 00:00:00'): ?> {{Carbon\Carbon::parse($misc->shipdate_expected)->format('m/d/Y')}} <?php endif; ?></td>
								</tr>
							@endforeach
						</table>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
<div>
@endsection