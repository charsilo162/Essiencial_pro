@extends('layouts.dashboard')

@section('sidebar')

    <livewire:category-sidebar :active-category-slug="$activeCategorySlug ?? null" />
@endsection

@section('content')
@if(session('error'))
    <div style="background: #f8d7da; color: #842029; padding: 10px; margin-bottom: 15px; border-radius: 5px;">
        {{ session('error') }}
    </div>
@endif

@if(session('success'))
    <div style="background: #d1e7dd; color: #0f5132; padding: 10px; margin-bottom: 15px; border-radius: 5px;">
        {{ session('success') }}
    </div>
@endif
    {{ $slot }}
    
@endsection
