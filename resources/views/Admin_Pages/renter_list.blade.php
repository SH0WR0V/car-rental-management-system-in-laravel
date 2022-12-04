@extends('Admin_Pages.Admin_nav.admin_nav')
@section('admin_main')
@if(Session::has('success'))
    <div class="alert alert-success">{{Session::get('success')}}</div>
@endif
@if(Session::has('fail'))
    <div class="alert alert-danger">{{Session::get('fail')}}</div>
@endif
<table class="table align-middle mb-0 bg-white">
    <thead class="bg-light">
      <tr>
        <th>Name</th>
        <th>Title</th>
        <th>Address</th>
        <th>NID</th>
        <th>DL number</th>
        <th>Position</th>
        <th></th>
        <th>Action</th>
        <th></th>
      </tr>
    </thead>
    @foreach ($renters as $renter )
    <tbody>
      <tr>
        <td>
          <div class="d-flex align-items-center">
            <img
                src="https://mdbootstrap.com/img/new/avatars/8.jpg"
                alt=""
                style="width: 45px; height: 45px"
                class="rounded-circle"
                />
            <div class="ms-3">
              <p class="fw-bold mb-1">{{ $renter->first_name." ".$renter->last_name}}</p>
              <p class="text-muted mb-0">{{ $renter->username }}</p>
              <p class="text-muted mb-0">{{ $renter->email }}</p>
            </div>
          </div>
        </td>
        <td>
          <p class="fw-normal mb-1">{{ $renter->dob }}</p>
          <p class="text-muted mb-1">{{ $renter->gender}}</p>
          <p class="text-muted mb-1">{{ $renter->phone_number }}</p>
        </td>
        <td>
          <p class="fw-normal mb-1">{{ $renter->address }}</p>
        </td>
        <td>
          <p class="badge badge-success rounded-pill d-inline">{{ $renter->nid_number }}</p>
        </td>
        <td>
          <span class="badge badge-success rounded-pill d-inline">{{ $renter->dl_number }}</span>
        </td>

        <td>{{ $renter->type }}</td>
        <td>
            <a class="btn btn-primary me-3" href="{{ route('admin edit',['id'=>encrypt($renter->id)]) }}">EDIT</a>
          </td>
          <td>
            @if ($renter->block_status == 1)
            <h6>Its a block User</h6>
            @else
            <a class="btn btn-primary me-3" href="{{ route('admin block',['id'=>encrypt($renter->id)]) }}">BLOCK</a>
            @endif
          </td>
          <td>
            <a class="btn btn-primary me-3" href="{{ route('admin single user details',['id'=>encrypt($renter->id)]) }}">VIEW</a>
          </td>
      </tr>
      @endforeach
    </tbody>
  </table>

@endsection


