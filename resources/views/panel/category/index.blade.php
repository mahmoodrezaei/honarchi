@extends('panel.layouts.master')

@section('content')

    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title ">مدیریت دسته‌بندی‌ها</h3>
            </div>
        </div>
    </div>

    <table class="table table-bordered m-table m-table--border-danger m-table--head-bg-primary">
        <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>parent</th>
        </tr>
        </thead>
        <tbody>

            @foreach ($categories as $category)
                <tr>
                <th scope="row">{{ $category->id }}</th>
                <td>{{ $category->name }}</td>
                <td>{{ $category->parent_id }}</td>
                </tr>
            @endforeach

        </tbody>
    </table>



@endsection