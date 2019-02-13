@extends('panel.layouts.master')

@section('content')

    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title ">Create A Category</h3>
            </div>
        </div>
    </div>

    <form method="POST" action="{{ route('categories.store') }}" class="m-form m-form--fit m-form--label-align-right">
        @csrf
        <div class="m-portlet__body">
            <div class="form-group m-form__group row">
                <label class="col-form-label col-lg-3 col-sm-12">Name</label>
                <div class="col-lg-7 col-md-7 col-sm-12">
                    <input type="text" name="name" class="form-control m-input" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter post title" value="{{ $category->name }}">
                </div>
            </div>

            <select name="parent_id">
            @foreach ($categories as $item)
                    <option name="parent_id" @if($item->id == $category->parent_id) selected="selected" @endif value="{{$item->id}}">{{ $item->name }}</option>
            @endforeach
            </select>

        </div>
        <div class="m-portlet__foot m-portlet__foot--fit">
            <div class="m-form__actions m-form__actions">
                <div class="row">
                    <div class="col-lg-9 ml-lg-auto">
                        <button type="submit" class="btn btn-brand">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </form>



@endsection