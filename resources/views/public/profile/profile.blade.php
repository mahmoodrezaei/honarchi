@extends('public.layouts.master')

@section('content')

<div id="_profile">

    <profile-sidebar></profile-sidebar>

    <router-view></router-view>
</div>

@endsection

@section('page-scripts')

    <script type="text/javascript" src="{{ asset('js/profile.js') }}"></script>

@endsection
