@extends('web.auth.layouts.default')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
@endpush

@push('scripts')
<script src="{{ asset('js/script.js') }}"></script>
<script src="https://unpkg.com/flowbite@1.5.2/dist/flowbite.js"></script>
@endpush

@section('contents')
@include('web.auth.pages.login.sections.form-login')
@endsection