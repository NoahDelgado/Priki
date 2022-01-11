@extends('layout')
@section('content')

    <p>
        <input type="number" id="quantity" name="quantity" min="1" value="{{ $nbDays }}">
    </p>
    {{-- TODO :changer le foreach par forealse --}}
    <div class="list-group">
        @foreach ($practices as $practice)

            <a href="/practice/{{ $practice->id }}"
                class="list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">{{ $practice->domain->name }}</h5>
                    <small>{{ \Carbon\Carbon::parse($practice->updated_at)->formatLocalized('%d %B %Y') }}</small>
                </div>
                <p class="mb-1">{{ $practice->description }}</p>
            </a>
        @endforeach
    </div>
@endsection
