<div class="d-flex justify-content-center">
    <div class="mx-auto">
        <form wire:submit.prevent='register' class="p-5" style="margin-top: 100px">
            <h1>Register Account</h1>
            <div class="form-group" style="width: 300px">
                <label for="name">Name:</label>
                <input type="text" name="" id="name" class="form-control" wire:model='name'>
                @error('name')
                <span class="text-danger text-lg">{{$message}}</span>
                @enderror
            </div>

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
                <label for="confirm Password">Confirm Password:</label>
                <input type="password" name="" id="confirm Password" class="form-control" wire:model='password_confirmation'>
            </div>

            <div class="form-group" style="width: 300px">
                <a href="/login">Already have an account?</a>
                <button type="submit" class="btn btn-success float-end mt-5">Register</button>
            </div>

        </form>
    </div>
</div>
