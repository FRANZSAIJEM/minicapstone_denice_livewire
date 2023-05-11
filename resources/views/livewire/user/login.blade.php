<div class="d-flex justify-content-center">
    <div class="mx-auto">
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        @if (session()->has('errorMsg'))
            <div class="alert alert-danger">
                {{ session('errorMsg') }}
            </div>
        @endif
        <form wire:submit.prevent='login' class="p-5" style="margin-top: 100px">
            <h1>Login Account</h1>

            <div class="form-group" style="width: 300px">
                <label for="email">Email:</label>
                <input type="email" name="" id="email" class="form-control" wire:model='email'>
                @error('email')
                <span class="text-danger text-lg">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group" style="width: 300px">
                <label for="password">Password:</label>
                <input type="password" name="" id="password" class="form-control" wire:model='password'>
                @error('password')
                <span class="text-danger text-lg">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group" style="width: 300px">
                <a href="/register">don't have an account?</a>
                <button type="submit" class="btn btn-success float-end mt-5">Login</button>
            </div>

        </form>
    </div>
</div>
