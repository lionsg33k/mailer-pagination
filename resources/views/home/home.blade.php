@extends('layouts.index')

@section('content')
    <div class="text-white">

        @foreach ($users as $user)
            <h1>{{ $user->name }}</h1>
        @endforeach

        {{--  pagination links  --}}
        <div class="papa">{{ $users->links('pagination::tailwind') }}</div>

    </div>
@endsection
