@extends('layouts.app')
    @vite(['resources/css/app.css', 'resources/js/app.js'])

@section('content')
    <div class="container py-5">
        <h1 class="mb-4 text-center">Create and Manage Manuals</h1>
        <p class="lead text-center mb-5">
            Organize your documentation by category and author for easy access and management.
        </p>

        <div class="row">
            <!-- Manual Category Card 1 -->
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">User Guides</h5>
                        <p class="card-text">Manuals aimed at end-users to help them understand and operate your product or service.</p>
                    </div>
                </div>
            </div>

            <!-- Manual Category Card 2 -->
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Technical Documentation</h5>
                        <p class="card-text">Detailed reference manuals for developers, including API documentation and integration guides.</p>
                    </div>
                </div>
            </div>

            <!-- Manual Category Card 3 -->
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Admin Manuals</h5>
                        <p class="card-text">Documentation to assist administrators with managing the backend and user settings.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-5">
<a href="{{ route('manual-heads.create') }}" class="btn btn-primary btn-lg">Start Creating Manuals</a>
        </div>
    </div>
@endsection
