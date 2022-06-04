@extends('layout.sidebar')

@section('content')

    {{-- Categories list --}}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card p-3">
                            <div class="card-title margin-bottom">
                                 <h3><i class="fas fa fa-list"></i> Add New Menu</h3>
                            </div>
                            <div class="card-body">
                              <form action="{{route('Menu.store')}}" method="post" enctype="multipart/form-data">
                               @csrf
                                <div class="row mb-3">
                                     <label for="title" class="col-md-2 col-sm-3 form-label">Title:</label>
                                     <input type="text"
                                            id="title"
                                            name="title"
                                            class="col form-control"
                                            placeholder="Entre Title of Mneu "
                                     >
                                </div>
                               <div class="row form-floating mb-3">
                                    <textarea class="form-control" name="description" placeholder="Entre Menu Description" id="floatingTextarea"></textarea>
                                    <label for="floatingTextarea">Description</label>
                                </div>
                                <div class="row mb-3">
                                     <label for="price" class="col-md-2 col-sm-3 form-label">Pric </label>
                                    <div class="input-group ">
                                            <input type="text" class="form-control" name="pric" id="price" aria-label="Dollar amount (with dot and two decimal places)">
                                             <span class="input-group-text">MAD</span>
                                    </div>
                                </div>
                                <div class="row input-group mb-3">
                                    <label for="old_price" class="col-md-2 col-sm-3 form-label">Old Price</label>
                                   <div class="input-group ">
                                        <input type="text" class="form-control" name="old_price" id="old_price" aria-label="Dollar amount (with dot and two decimal places)">
                                        <span class="input-group-text">MAD</span>
                                    </div>

                                </div>
                                <div class="row input-group mb-3">
                                    <label for="inputGroupFile02" class="col-md-2 col-sm-3 form-label">Image</label>
                                    <div class="input-group ">
                                        <input type="file" class="form-control" name="image" id="inputGroupFile02">
                                        <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="cats" class="col-md-2 col-sm-3 form-label">Category</label>
                                    <select class="form-select" name="categorie_id" aria-label="Default select example" id="cats">
                                        <option selected>Choose the category of menu</option>
                                        @foreach ($cats as $cat)
                                           <option value="{{$cat->id}}">{{$cat->title}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <input type="submit" value="Send" class="btn btn-primary">
                                </div>
                              </form>
                            </div>
                        </div>

                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
@endsection
