<nav class="p-3">
    <header class="d-flex justify-content-center">
        <h1 class="m-3 rounded best_shadow text-center" style="background-color: rgb(219, 100, 100); width: 500px">Music Bar</h1>
        @if(auth()->check())
        <div class="d-flex mx-auto">

            <h4 class="nav-btn p-2 m-3 rounded text-center best_shadow">Home</h4>
            <h4 class="nav-btn p-2 m-3 rounded text-center best_shadow">Dash Board</h4>
            <h4 class="nav-btn p-2 m-3 rounded text-center best_shadow">Calendar</h4>




        </div>
        <div class="mx-auto">
            <form action="{{ route('logout') }}" method="POST" class="d-flex">
                @csrf
                <h3 class="p-3">{{auth()->user()->name}}</h3>
                <button type="submit" class="nav-btn m-3 rounded text-center best_shadow text-white">Logout</button>
            </form>
        </div>

        @endif



    </header>

</nav>

<style>
    .best_shadow{
        box-shadow: rgba(0, 0, 0, 0.09) 0px 2px 1px, rgba(0, 0, 0, 0.09) 0px 4px 2px, rgba(0, 0, 0, 0.09) 0px 8px 4px, rgba(0, 0, 0, 0.09) 0px 16px 8px, rgba(0, 0, 0, 0.09) 0px 32px 16px;
    }
    .nav-btn{
        background-color: rgb(176, 75, 75);
        width: 200px;
        cursor: pointer;
        transition: 0.2s;
    }

    .page{
        cursor: pointer;
        transition: 0.5s;
        padding: 10px;
    }
    .page:hover{
        background-color: white;
        box-shadow: 0px 10px 0px 0px rgb(118, 118, 118);
        color: black;
        transform: translateY(-10px);
    }
</style>
