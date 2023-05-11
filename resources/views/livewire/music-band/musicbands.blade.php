
<div style="">
    <div class="d-flex">
        <div class="p-4">
            <div class="d-block" style="margin-top: -30px;">
                <div style="background-color:rgb(189, 74, 74);" class="best_shadow p-3 w-100 rounded m-2">
                    <h2><b>Search</b></h2>
                    <input type="text" name="" id="" placeholder="Search Name" class="form-control" wire:model='bandSearch'>
                </div>

                <div style="background-color:rgb(255, 107, 107);" class="best_shadow p-3 w-100 rounded m-2">
                    <h2><b>Genre</b></h2>
                    <h4><input type="checkbox" name="" id="" wire:model='genRock' value="Rock">&nbsp; Rock &nbsp;</h4>
                    <h4><input type="checkbox" name="" id="" wire:model='genPop' value="Pop">&nbsp; Pop &nbsp;</h4>
                    <h4><input type="checkbox" name="" id="" wire:model='genReggae' value="Reggae">&nbsp; Reggae &nbsp;</h4>
                    <h4><input type="checkbox" name="" id="" wire:model='genAcoustic' value="Acoustic">&nbsp; Acoustic &nbsp; </h4>
                    <h4><input type="checkbox" name="" id="" wire:model='genClassical' value="Classical">&nbsp; Classical</h4>
                </div>

                <div style="background-color:rgb(189, 74, 74);" class="best_shadow p-3 w-100 rounded m-2">
                    <h2><b>Location</b></h2>
                    <select wire:model="bandLocation" class="form-select">
                        <option value="all">All Locations</option>
                        @foreach($locations as $location)
                            <option value="{{ $location }}">{{ $location }}</option>
                        @endforeach
                    </select>
                </div>

                <div style="background-color:rgb(255, 107, 107);" class="best_shadow p-3 w-100 rounded m-2">
                    <h2><b>Rate</b></h2>
                    <label for="">Rate: <output class="mb-4" id="sortRangeInput" for="sortRangeInput">{{ number_format(floatval($sortRate), 2) }}</output></label><br>
                    <input style="width: 350px;" type="range" id="sortRangeInput" name="sortRangeInput" min="0" max="100"
                    oninput="showSortValue(this.value)" wire:model='sortRate'> <br>

                </div>

                <div style="background-color:rgb(189, 74, 74);" class="best_shadow p-3 w-100 rounded m-2">
                    <h2><b>Sort By</b></h2>
                    <select name="" id="" class="form-select" wire:model='sortBy'>
                        <option value=''>Sort By</option>
                        <option value="Lowest to Highest Fee">Lowest to Highest Fee</option>
                        <option value="Highest to Lowest Fee">Highest to Lowest Fee</option>
                    </select>
                </div>
            </div>
        </div>

        <div>
            <div class="d-flex" style="margin-left: 30px; margin-top: -15px">
                <button class="btn btn-danger p-5 m-3 best_shadow" wire:click='resetFilter'>Reset Filter</button> <br>
                <button class="btn btn-success p-5 m-3 best_shadow" data-bs-toggle="modal" data-bs-target="#addNew">Create New</button>
            </div>

            <div class="d-flex flex-wrap">
                @if ($musicbands->count()>0)
                @foreach ($musicbands as $musicbar)
                <div class="best_shadow card m-5 me-5" style="border-radius: 2%; width: 350px; background-color: rgb(202, 125, 125);">
                    <div class="card-body d-flex">
                        <img class="shadow_inner viewImg" data-bs-toggle="modal" data-bs-target="#view" wire:click='viewBar({{$musicbar->id}})' width="150"  src="" alt=""
                        style="z-index: 1; transform: translateY(-7px); background-image: url({{asset('uploads/image_uploads')}}/{{$musicbar->image}}); background-size:cover; border-radius: 3%; ">
                        <div class="text-dark ms-3">
                            <p class="bg-warning best_shadow text-dark p-2" style="width: 150px; transform: translateX(20px)">Name: {{$musicbar->name}}</p>
                            <p class="bg-warning best_shadow best_shadow" style="margin-bottom: 15px; margin-top: -56px; transform: translateX(-187px); z-index: -1;  width: 10px; padding: 20px"></p>

                            <p class="bg-warning best_shadow text-dark p-2" style="width: 150px; transform: translateX(20px)">Location: {{$musicbar->location}}</p>
                            <p class="bg-warning best_shadow best_shadow" style="margin-bottom: 15px; margin-top: -56px; transform: translateX(-187px); z-index: -1;  width: 10px; padding: 20px"></p>

                            <p class="bg-warning best_shadow text-dark p-2" style="width: 150px; transform: translateX(20px)">Rate: {{ number_format($musicbar->rate, 2) }}</p>
                            <p class="bg-warning best_shadow best_shadow" style="margin-bottom: 15px; margin-top: -56px; transform: translateX(-187px); z-index: -1;  width: 10px; padding: 20px"></p>

                            <p class="bg-warning best_shadow text-dark p-2" style="width: 150px; transform: translateX(20px)">Genre: {{$musicbar->genre}}</p>
                            <p class="bg-warning best_shadow best_shadow" style="margin-bottom: 15px; margin-top: -56px; transform: translateX(-187px); z-index: -1;  width: 10px; padding: 20px"></p>

                        </div>
                    </div>
                    <div class="mb-3 ms-3">
                        <button class="btn btn-success m-1 best_shadow w-50 text-center"  data-bs-toggle="modal" data-bs-target="#edit" wire:click='editBar({{$musicbar->id}})'
                            style="transform: translateX(-25px)"
                            >Edit</button>

                        <button class="btn btn-danger m-1 best_shadow w-50 text-center" data-bs-toggle="modal" data-bs-target="#delete" wire:click='deleteConfirm({{$musicbar->id}})'
                            style="transform: translateX(-25px)"
                            >Delete</button>

                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>





<footer>
    <div class="float-start" style="margin-left: 1125px;">
        {{$musicbands->links()}}
    </div>
</footer>

  <div wire:ignore.self style="margin-top: 100px;" class="modal text-black fade" id="addNew" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div style="display: grid; place-content: center;"  class="modal-dialog">
      <div class="modal-content bg-danger best_shadow" style="width: 1000px">
        <div class="modal-header">
          <h1 style="transform: translateX(-20px); margin-top: -20px" class="best_shadow modal-title text-center bg-warning p-3 rounded" id="staticBackdropLabel">Create New Bar</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">


            <form wire:submit.prevent='addBar'>
                <div class="elements mb-3">
                    <input type="file" name="" id="" class="form-control" wire:model='image'>
                    @if ($image && $image instanceof \Illuminate\Http\UploadedFile)
                        <img src="{{$image->temporaryUrl()}}" width="200" alt="" class="mt-3 rounded best_shadow">
                    @endif
                    @error('image')
                    <span class="text-white text-lg">{{$message}}</span>
                    @enderror
                </div>
                <div class="elements">

                    <input type="text" name="" id="name" class="form-control" wire:model='name' placeholder="Name">
                    @error('name')
                    <span class="text-white text-lg">{{$message}}</span>
                    @enderror
                </div> <br>
                <div class="elements">

                    <input type="text" name="" id="loc" class="form-control" wire:model='location' placeholder="location">
                    @error('location')
                    <span class="text-white text-lg">{{$message}}</span>
                    @enderror
                </div> <br>
                <div class="">

                    <input class="form-control" type="number" id="newRangeInput" name="newRangeInput" max="1000" placeholder="Rate" wire:model="rate">
                    @error('rate')
                    <span class="text-white text-lg">{{$message}}</span>
                    @enderror
               </div> <br>

                <div class="elements">
                    <select name="" id="" wire:model='genre' class="form-select">
                        <option value="">Select Genre</option>
                        <option value="Rock">Rock</option>
                        <option value="Pop">Pop</option>
                        <option value="Reggae">Reggae</option>
                        <option value="Acoustic">Acoustic</option>
                        <option value="Classical">Classical</option>
                    </select>




                    @error('genre')
                        <span class="text-white text-lg">{{ $message }}</span>
                    @enderror


                </div>


        </div>
            <div class="modal-footer" style="transform: translateY(20px);">
                <button style="transform: translateX(20px)" type="button" class="btn btn-secondary p-3 best_shadow w-25" data-bs-dismiss="modal">Close</button>
                <button style="transform: translateX(20px)" type="submit" class="btn btn-primary p-3 best_shadow w-25">Create</button>
            </div>
        </form>
      </div>

    </div>
  </div>

  <div wire:ignore.self class="modal fade text-black" id="edit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div style="display: grid; place-content: center" class="modal-dialog">
      <div  class="modal-content bg-danger" style="width: 1000px;">
        <div class="modal-header">
          <h1 style="transform: translateX(-20px); margin-top: -20px"  class="best_shadow modal-title text-center bg-warning p-3 rounded" id="staticBackdropLabel">Edit Bar</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form wire:submit.prevent='updateBarData'>
                <div class="elements mb-3">


                    @foreach ($musicbands as $musicbar)
                        @if ($musicbar->id === $selectedMusicBarId)
                            <img src="{{ asset('uploads/image_uploads/' . $musicbar->image) }}" width="250" class="rounded" alt="">
                        @endif
                    @endforeach

                    @if ($image && $image instanceof \Illuminate\Http\UploadedFile)

                        <img src="{{$image->temporaryUrl()}}" width="200" alt="" class="mt-3 rounded">
                    @endif

                    @error('image')
                    <span class="text-white text-lg">{{$message}}</span>
                    @enderror
                </div>
                <div class="elements">

                    <input type="text" name="" id="name" class="form-control" wire:model='name'>
                    @error('name')
                    <span class="text-white text-lg">{{$message}}</span>
                    @enderror
                </div> <br>
                <div class="elements">

                    <input type="text" name="" id="loc" class="form-control" wire:model='location'>
                    @error('location')
                    <span class="text-white text-lg">{{$message}}</span>
                    @enderror
                </div> <br>
                <div class="">

                    <input class="form-control" type="number" id="editRangeInput" name="editRangeInput" min="0" max="1000" wire:model="rate">
                    @error('rate')
                    <span class="text-white text-lg">{{$message}}</span>
                    @enderror
               </div> <br>

                <div class="elements">
                    <select name="" id="" wire:model='genre' class="form-select">
                        <option value="">Select Genre</option>
                        <option value="Rock">Rock</option>
                        <option value="Pop">Pop</option>
                        <option value="Reggae">Reggae</option>
                        <option value="Acoustic">Acoustic</option>
                        <option value="Classical">Classical</option>


                    </select>
                    @error('genre')
                    <span class="text-white text-lg">{{$message}}</span>
                    @enderror
                </div> <br>

        </div>
        <div class="modal-footer" style="transform: translateY(20px);">
            <button style="transform: translateX(20px)" type="button" class="btn btn-warning p-3 best_shadow w-25" data-bs-dismiss="modal">Cancel</button>
            <button style="transform: translateX(20px)" type="submit" class="btn btn-primary p-3 best_shadow w-25">Update</button>
          </div>
    </form>
      </div>
    </div>
  </div>

  <div wire:ignore.self class="modal fade text-black mt-lg-5" id="delete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div style="display: grid; place-content: center" class="modal-dialog">
      <div class="modal-content bg-danger" style="width: 1000px">
        <div class="modal-header">
          <h1 style="transform: translateX(-20px); margin-top: -20px"  class="best_shadow modal-title text-center bg-warning p-3 rounded" id="staticBackdropLabel">Delete Bar</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <h1 class="text-black">Are you sure you want to delete this Band?</h1>
        </div>
        <div class="modal-footer" style="transform: translateY(20px);">
          <button style="transform: translateX(20px)" type="button" class="btn btn-secondary p-3 best_shadow w-25" data-bs-dismiss="modal">No</button>
          <button style="transform: translateX(20px)" type="button" class="btn btn-warning p-3 best_shadow w-25" wire:click='deleteBardata' data-bs-dismiss="modal"> Yes</button>
        </div>
      </div>
    </div>
  </div>


  <div wire:ignore.self class="modal mt-5 fade text-black" id="view" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" style="display: grid; place-content: center">
      <div class="modal-content bg-danger text-white" style="width: 1000px">
        <div class="modal-body p-5">
            <div class="imageView text-center">
                @foreach ($musicbands as $musicbar)
                @if ($musicbar->id === $selectedMusicBarId)
                    <img src="{{ asset('uploads/image_uploads/' . $musicbar->image) }}" width="250" class="rounded imageViewCss" alt="">
                @endif
            @endforeach
            <h4>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quam fugit quae eius vel doloribus suscipit exercitationem, incidunt, placeat ratione asperiores obcaecati. Itaque deserunt assumenda eligendi tenetur quisquam repellendus laboriosam error! Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nemo adipisci amet perferendis eos? Molestias adipisci maxime saepe enim officia sapiente molestiae dolore, necessitatibus aperiam excepturi veritatis doloribus, fugiat voluptate inventore.</h4>
            <button class="btn btn-primary">Book Now</button>
            </div>



            <div class="modal-footer" style="transform: translateY(20px);">
                <button style="transform: translateX(20px)" type="button" class="btn btn-secondary p-3 best_shadow w-25" data-bs-dismiss="modal">Close</button>

            </div>


        </div>

      </div>
    </div>
  </div>
  <style>
    .shadow_inner{
        box-shadow: rgb(0, 0, 0) 0px 0px 20px 0px inset, rgba(0, 0, 0, 0.5) 0px 0px 20px 1px inset;
    }
    .best_shadow{
        box-shadow: rgba(0, 0, 0, 0.09) 0px 2px 1px, rgba(0, 0, 0, 0.09) 0px 4px 2px, rgba(0, 0, 0, 0.09) 0px 8px 4px, rgba(0, 0, 0, 0.09) 0px 16px 8px, rgba(0, 0, 0, 0.09) 0px 32px 16px;
    }
    </style>

    <script>


function showSortValue(val) {
    var sortdecimalPlaces = 2;

    var sortformattedVal = parseFloat(val).toFixed(sortdecimalPlaces);

    document.getElementById("newSortAmount").innerHTML = sortformattedVal;

    }


    function showValue(val) {
    var decimalPlaces = 2;

    var formattedVal = parseFloat(val).toFixed(decimalPlaces);

    document.getElementById("newAmount").innerHTML = formattedVal;

    }

    function editShowValue(val){
        var editDecimalPlaces = 2;

        var editFormattedVal = parseFloat(val).toFixed(editDecimalPlaces);

        document.getElementById("newEditAmount").innerHTML = editFormattedVal;
    }

    window.addEventListener('barSaved', function() {
    // close the modal
    var addNewModal = document.getElementById('edit');
    if (addNewModal) {
        var modal = bootstrap.Modal.getInstance(addNewModal);
        modal.hide();
        location.reload();
    }
});

window.addEventListener('barDeleted', function() {
    // close the modal
    var deleteModal = document.getElementById('delete');
    if (deleteModal) {
        var modal = bootstrap.Modal.getInstance(deleteModal);
        modal.hide();
        location.reload();
    }
});

window.addEventListener('barCreated', function() {
    // close the modal
    var deleteModal = document.getElementById('addNew');
    if (deleteModal) {
        var modal = bootstrap.Modal.getInstance(deleteModal);
        modal.hide();
        location.reload();
    }
});
    </script>
</div>

