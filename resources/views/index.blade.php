@extends('layout')
@section('content')

    <p>
        <input type="number" id="quantity" name="quantity" min="1" value="{{ $nbDays }}">
    </p>
    {{-- TODO :changer le foreach par forealse --}}
    @foreach ($publication_states as $practice)
        <p>{{ $practice->description }}<br>{{ $practice->domain->name }}</p>
    @endforeach
@endsection
