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
                                 <h3><i class="fas fa fa-list"></i> Add New Category</h3>
                            </div>
                            <div class="card-body">
                              <form action="{{route('categories.store')}}" method="post">
                               @csrf
                                <div class="row mb-3">
                                     <label for="title" class="col-md-2 col-sm-3 form-label">Title:</label>
                                     <input type="text"
                                            id="title"
                                            name="title"
                                            class="col form-control"
                                            placeholder="Entre Title of Category "
                                     >
                                </div>
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="radio" name="Visibility" value="0" id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Non visible
                                    </label>
                                    </div>
                                    <div class="form-check mb-3">
                                    <input class="form-check-input" type="radio" name="Visibility" value="1" id="flexRadioDefault2" checked>
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        visible
                                    </label>
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
