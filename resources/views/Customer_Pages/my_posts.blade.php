@extends('Customer_Pages.Customer_nav.customer_nav')
@section('customer_main')


<table class="table align-middle mb-0 bg-white">
  <thead class="bg-light">
    <tr>
      
      <th>Poster User Name</th>
      <th>Poster Type</th>
      <th>Post Date</th>
      <th>Details</th>
      <th>Actions</th>
    </tr>
  </thead>

  @foreach ($s_user as $s_user )
  


  <tbody>
    <tr>
      <td>
        <div class="d-flex align-items-center">
        <img
              src="{{asset('post_imgs/'.$s_user->post_img)}}"
              
              alt=""
              style="width: 75px; height: 55px"
              
              >
              
          <div class="ms-3">
            <p class="fw-bold mb-1">{{$s_user->poster_name}}</p>
          </div>
        </div>
      </td>
      <td>
        <p class="fw-normal mb-1">{{$s_user->poster_type}}</p>
      </td>
      <td>
        <span class="badge badge-success rounded-pill d-inline">{{$s_user->post_date}}</span>
      </td>
      <td>{{$s_user->post_text}}</td>
      <td>
        <a href="my_posts_edit/{{$s_user->id}}">
          Edit
        </a>
        <a href="my_posts_delete/{{$s_user->id}}">
          Delete
        </a>
      </td>
    </tr>
   
    @endforeach
  </tbody>
</table>



@endsection