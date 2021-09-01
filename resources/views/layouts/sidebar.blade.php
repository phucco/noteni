<div class="col-md-4">
	<div class="card">
		<div class="card-body">
			<div class="d-flex flex-column align-items-center text-center"> 
				<img src="{{ asset('img/avatar.png') }}" class="rounded-circle p-1 bg-primary" width="110">
				<div class="mt-3">
					<h4>{{ auth()->user()->name }}</h4>
				</div>
			</div>
			<hr class="my-4">
			<ul class="list-group list-group-flush">
			</ul>
		</div>
	</div>
</div>