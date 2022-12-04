@extends('Admin_Pages.Admin_nav.admin_nav')
@section('admin_main')
@foreach ($s_user as $s_user )


<table align=""style="width: 100%; height: 100%">
    <tr>
        <img
              src="https://mdbootstrap.com/img/new/avatars/8.jpg"
              alt=""
              align ="right"
              style="width: 100px; height: 100px"
              class="rounded-circle"
              />
    </tr>
    <tr>
        <td>
            <h2>Name : {{  $s_user->first_name." ".$s_user->last_name }}</h2>
        </td>
    </tr>
    <tr>
        <td>
            <h2>Username : {{  $s_user->username}}</h2>
        </td>
    </tr>
    <tr>
        <td>
            <h2>Email : {{  $s_user->email}}</h2>
        </td>
    </tr>
    <tr>
        <td>
            <tr>
                <td>
                    <h4>Date Of Birth : {{ $s_user->dob }}</h4>
                </td>
                <td>
                    <h4> Gender : {{ $s_user->gender}}</h4>
                </td>
                <td>
                    <h4> Phone Number : {{ $s_user->phone_number }}</h4>
                </td>
            </tr>
        </td>
    </tr>
    <tr>
        <td>
            <h2> Address : {{ $s_user->address }}</h2>
        </td>
    </tr>
    <tr>
        <td>
            <tr>
                <td>
                    <h4>NID Number : {{ $s_user->nid_number }}</h4>
                </td>
                <td>
                    <h4>Driving License Number : {{ $s_user->dl_number }}</h4>
                </td>
            </tr>
        </td>
    </tr>
    <tr>
        <td>
            <h2>Type : {{ $s_user->type }}</h2>
        </td>
    </tr>
</table>

@endforeach

@endsection
