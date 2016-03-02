@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="page-header">
                <div class="admin-greeting">
                    <h2>Welcome Yazmin</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="projects">
                @if(count($projects))
                    <ul>
                        @foreach($projects as $project)
                            <li>
                                <h2>{{ $project->title }}</h2>
                                <p> {{ $project->description }}</p>
                                <h5> {{ $project->dates->start_date }}</h5>
                                <h5> {{ $project->dates->end_date }}</h5>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>
@endsection