<x-guest-layout>
    <div class="container" style="margin-top: 120px;">
        @include("layouts.flash")
        @include('layouts.errors')
        <form method="POST" action="{{ route('login') }}" class="auth-form">
            @csrf
            <!-- Email Address -->
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" 
                    class="form-control" 
                    name="email" 
                    placeholder="email" 
                    id="email"
                    value="@if(old('email')){{old('email')}}@endif">
            </div>

            <!-- Password -->
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" 
                    name="password" 
                    id="password" 
                    class="form-control" 
                    placeholder="Strong*Password@2022">
            </div>

            <!-- Remember Me -->
            <div class="form-check">
                <input type="checkbox" name="remember_me" id="remember_me" class="form-check-input">
                <label for="remember_me" class="form-check-label">Remember me</label>
            </div>

            <div class="form-group mt-4">
                <button class="btn btn-primary" type="submit">Login</button>
            </div>
        </form>
    </div>
</x-guest-layout>
