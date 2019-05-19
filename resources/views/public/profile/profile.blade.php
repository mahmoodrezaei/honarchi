@extends('public.layouts.master')

@section('content')

    <div id="_profile">
        <section class="container-fluid profile-page">
            <div class="container">
                <div class="row row-profile mb-3">

                    <profile-sidebar></profile-sidebar>

                    <router-view></router-view>

                </div>
            </div>
        </section>
    </div>

@endsection

@section('page-scripts')

    <script type="text/javascript" src="{{ asset('js/profile.js') }}"></script>

@endsection
