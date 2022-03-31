<x-guest-layout>
    <div class="container" style="margin-top: 120px;">
        @include('layouts.errors')
        <form action="{{ route('register')}}" method="post" class="auth-form">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" 
                    class="form-control" name="name" 
                    value="@if(old('name')){{old('name')}}@endif" 
                    placeholder="John Doe">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control"
                     id="email" 
                     value="@if(old('email')){{old('email')}}@endif"
                    name="email" placeholder="johndoe@gmail.com">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" 
                    class="form-control" placeholder="Strong*Password@2022">
            </div>
            <div class="form-group">
                <label for="password_confirmation">Password Confirmation</label>
                <input type="password" name="password_confirmation" class="form-control" 
                    id="password_confirmation" placeholder="Strong*Password@2022">
            </div>
            <div class="form-group mt-3">
                <button class="btn btn-primary">Register</button>
            </div>
        </form>
    </div>
</x-guest-layout>