@extends('Customer_Pages.Customer_nav.customer_nav')
@section('customer_main')


<form action="{{ route('my_posts_edit_submit') }}" method="post" enctype="multipart/form-data">

@if(Session::has('success'))
                  <div class="alert alert-success">{{Session::get('success')}}</div>
                  @endif
                  @if(Session::has('fail'))
                  <div class="alert alert-danger">{{Session::get('fail')}}</div>
                  @endif

{{@csrf_field()}}
<div class="container">
		<div class="main-body">
			<div class="row">
				
				<div class="col-lg-8">
					<div class="card">
						<div class="card-body">

						<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">ID</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="hidden" name="id" class="form-control"  value="{{$post->id}}" >
								</div>
							</div>

							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Poster Name</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="hidden" name="poster_name" class="form-control"  value="{{$post->poster_name}}" >
									<span class="text-danger">@error('poster_name') {{$message}} @enderror</span>
								</div>
							</div>
                            <div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Poster Type</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="hidden" name="poster_type" class="form-control"  value="{{$post->poster_type}}">
									<span class="text-danger">@error('poster_type') {{$message}} @enderror</span>
								</div>
							</div>
							
							
							
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Details</h6>
								</div>
								<div class="col-sm-9 text-secondary">
                                <!-- <input type="text" name="" class="form-control"  value=""> -->
                                <textarea name="post_text" cols="38" rows="5" placeholder="Write Something!">{{$post->post_text}}</textarea>
								<span class="text-danger">@error('post_text') {{$message}} @enderror</span>

								</div>
							</div>
                            <div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Image</h6>
								</div>
								<div class="col-sm-9 text-secondary">
                                <input type="file" name="post_img" class="form-control" value="{{$post->post_img}}">
                                
								<span class="text-danger">@error('post_img') {{$message}} @enderror</span>
								</div>
							</div>
                            
                            

							<div class="row">
								<div class="col-sm-3"></div>
								<div class="col-sm-9 text-secondary">
                                <button type="submit" class="btn btn-primary btn-lg">Update</button>
								</div>
							</div>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>
    </form>





@endsection