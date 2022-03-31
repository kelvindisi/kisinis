<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Admin Account') }}
        </h2>
    </x-slot>
    <div class="container mt-4">
        @include("layouts.flash")
        @include("layouts.errors")
        <form action="{{ route('gallery.store') }}" enctype="multipart/form-data" method="post" class="auth-form">
            @csrf
            <div class="form-group">
                <label for="picture">Picture</label>
                <input type="file" name="picture" id="picture" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" name="description" id="description" 
                    class="form-control" placeholder="description"
                    value="@if(old('description')){{old('description')}}@endif">
            </div>
            <div class="form-group mt-4">
                <button class="btn btn-primary" type="submit">Upload</button>
            </div>
        </form>
    </div>
</x-app-layout>