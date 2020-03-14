@extends('layout.app')



@section('content')
    <main role="main" class="container" style="margin-top: 100px">
        @if (\Session::has('success'))
            <div class="alert alert-success" style="font-size: 12px">
                {!! \Session::get('success') !!}
            </div>
        @endif
        <div class="d-flex justify-content-between align-items-center p-3 my-3 bg-purple rounded shadow-sm">
            <div class="m-3">
                <img class="mb-4" src="{{asset('dist/images/user.png')}}" alt="" width="48" height="48">
                <h6 class="mb-0 lh-100">{{auth()->user()->name}}</h6>
                <small>{{\App\Model\User::find(auth()->user()->id)->profile->profile_number}}</small>
            </div>
            <div class="m-3 float-right">
                <a class="btn btn-primary" href="{{route('reservations.create')}}">New Reservation</a>
            </div>
        </div>

        <div class="my-3 p-3 bg-white rounded shadow-sm">
            <h6 class="border-bottom border-gray pb-2 mb-0">Reservations</h6>
            @foreach($reservations as $reservation)
                <div class="media text-muted pt-3">
                    <svg class="bd-placeholder-img mr-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 32x32"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"></rect><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>
                    <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                        <strong class="d-block text-gray-dark">{{$reservation->clinic->name}}</strong>
                        {{$reservation->date}}
                    </p>
                    <small class="d-block text-right mt-3">
                        <a class="text-primary" href="#">Update</a>
                        <a class="text-danger" href="#">Cancel</a>
                    </small>
                </div>
            @endforeach
        </div>
    </main>
@endsection
