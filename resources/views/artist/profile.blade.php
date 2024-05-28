@extends('artist.master')

@section('title')
    My Profile
@endsection
<style>
       .work-samples {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }

        .work-sample-item {
            position: relative;
            display: inline-block;
            margin: 10px;
        }

        .work-sample-item img {
            display: block;
            max-width: 150px;
            max-height: 150px;
        }
</style>
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">My Profile</h4>
                    </div>
                    @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
                </div>
            @endif
                    <div class="card-body">
                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <table class="table">
                        <tr>
                                <th>Artist image:</th>
                                <td><img src="{{ asset('artistimages/'.$artist->image) }}" alt="Profile Image" style="max-width: 150px;"></td>
                            </tr>
                            <tr>
                                <th>Name:</th>
                                <td>{{ $user->name }}</td>
                            </tr>
                            <tr>
                                <th>Email:</th>
                                <td>{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <th>Phone:</th>
                                <td>{{ $user->phone }}</td>
                            </tr>
                            <tr>
                                <th>User Type:</th>
                                <td>{{ $user->usertype }}</td>
                            </tr>
                            <tr>
                                <th>Speciality:</th>
                                <td>{{ $artist->speciality }}</td>
                            </tr>
                            <tr>
                                <th>About Work:</th>
                                <td>{!! $artist->description !!}</td>
                            </tr>
                            <tr>
                                <th>Location:</th>
                                <td>{{ $artist->location }}</td>
                            </tr>
                            <tr>
                                <th>Price:</th>
                                <td>{{ $artist->price }}</td>
                            </tr>
                            <tr>
                                <th>Sample:</th>
                                <td>@if(!empty($artist->work_samples))
                            <div class="work-samples">
                                @foreach(json_decode($artist->work_samples) as $sample)
                                    <div class="work-sample-item">
                                        <a href="{{ asset('work_samples/'.$sample) }}" data-toggle="lightbox">
                                            <img src="{{ asset('work_samples/'.$sample) }}" alt="Work Sample" class="img-thumbnail">
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                            @endif
                        </td>
                            </tr>
                        </table>

                        <a href="{{ route('editProfile') }}" class="btn btn-primary">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
