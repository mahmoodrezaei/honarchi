@extends('public.layouts.master')

@section('content')

    <div id="_profile">
        <section class="container-fluid profile-page">
            <div class="container">
                <div class="row row-profile mb-3">

                    <profile-sidebar></profile-sidebar>

                    {{-- Container for vue-router - SPA --}}
                    <router-view></router-view>

                    {{-- Displaying messages --}}
                    <flash></flash>

                </div>
            </div>
        </section>
    </div>

@endsection

@section('page-scripts')

    <script type="text/javascript" src="{{ asset('js/profile.js') }}"></script>

@endsection
