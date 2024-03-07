@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center ">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $user->name . __(' - Profile') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <div class="d-flex flex-row justify-content-around">
                        <ul class="profile-block">
                            <img src="/storage/{{$user->profile_image}}" class="rounded-circle" width="100" height="100"/>
                            <form method="POST" action="/change-profileimg/{{$user->id}}" enctype="multipart/form-data">
                            @csrf
                            @method("PUT")
                            <label for="profileImage"> 
                             <a style="cursor: pointer;" class="avatar_block"><em class="fa fa-minus"></em></a></label> 
                            <input type="file" name="avatar" id="profileImage" style="display: none;">
                            <input type="submit" name="submit" value="Change" class="btn"/>
                            </form>
                            <li> {{ $user->name }}</li>
                            <li>{{ $user->email }}</li>
                           
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection