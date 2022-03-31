<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gallery Images') }}
        </h2>
    </x-slot>
    <div class="container mt-4">
        @include("layouts.flash")
        @include("layouts.errors")
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Description</th>
                        <th>Manage</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($images as $image)
                    <tr>
                        <td>
                            <a href="{{ asset("storage/".$image->file) }}">
                                <img src="{{ asset("storage/".$image->file) }}" 
                                    style="width: 50px; height: 50px;" 
                                    alt="{{$image->id}}" class="img-fluid m-1">
                            </a>
                        </td>
                        <td>{{ $image->description }}</td>
                        <td>
                            <form action="{{ route('gallery.destroy', $image->id)}}" 
                                method="post">
                                @csrf
                                <input type="hidden" name="_method" value="delete">
                                <button class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="container mt-3 mb-3">
                {{ $images->links() }}
            </div>
        </div>
    </div>
</x-app-layout>