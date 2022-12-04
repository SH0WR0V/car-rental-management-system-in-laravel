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
        <th>Action</th>
        <th></th>
      </tr>
    </thead>
    @foreach ($BUser as $BUser )
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
              <p class="fw-bold mb-1">{{ $BUser->first_name." ".$BUser->last_name}}</p>
              <p class="text-muted mb-0">{{ $BUser->username }}</p>
              <p class="text-muted mb-0">{{ $BUser->email }}</p>
            </div>
          </div>
        </td>
        <td>
          <p class="fw-normal mb-1">{{ $BUser->dob }}</p>
          <p class="text-muted mb-1">{{ $BUser->gender}}</p>
          <p class="text-muted mb-1">{{ $BUser->phone_number }}</p>
        </td>
        <td>
          <p class="fw-normal mb-1">{{ $BUser->address }}</p>
        </td>
        <td>
          <p class="badge badge-success rounded-pill d-inline">{{ $BUser->nid_number }}</p>
        </td>
        <td>
          <span class="badge badge-success rounded-pill d-inline">{{ $BUser->dl_number }}</span>
        </td>
        <td>{{ $BUser->type }}</td>
        <td>
          <a class="btn btn-primary me-3" href="{{ route('admin unblock',['id'=>encrypt($BUser->id)]) }}">UNBLOCK</a>
        </td>
        <td>
          <a class="btn btn-primary me-3" href="{{ route('admin single blockuser details',['id'=>encrypt($BUser->id)]) }}">VIEW</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

@endsection
