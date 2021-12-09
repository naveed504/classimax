<style>
	.nice-select{ 
		width: 100%;
	}
</style>
<div class="advance-search">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-10 col-md-12" id="here">
				<form action="{{ route('search.listing') }}" method="POST">
					@csrf
					<div class="form-row">
						<div class="form-group col-lg-6">
										<div class="input-group">
											<input class="form-control border-end-0 border" type="search" id="inputtext4"
											name="name" placeholder="What are you looking for">
											<span class="input-group-append">
												<button type="submit" class="btn btn-outline-secondary bg-white border ms-n5" style="border-left:0px !important" type="button">
													<i class="fa fa-search"></i>
												</button>
											</span>
										</div>
						</div>
						
						<div class="form-group col-lg-6">
						<select class="form-control"  name="category" id="categorySelectBox" style="display: block;">
							<option value=''>Select Category</option>
							@foreach ($categories as $category)
								<option  value="{{$category->name}}">{{ $category->name }}</option>
							@endforeach
						</select>
						</div>
					</div>
				</form>
			</div>
			
			<div class="col-lg-2 text-left">
				<button class="btn btn-info text-white" id="clearsearch" style="font-size: 13px;">Clear Search</button>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$('#clearsearch').click(function() {
			$('#categorySelectBox')[0].selectedIndex = 0;
			$('#categorySelectBox').css('display', 'block');
			$('.nice-select').css('display', 'none');
		   $('#inputtext4').val('');
});
	});
</script>
