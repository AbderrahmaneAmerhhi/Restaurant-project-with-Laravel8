

{{-- Errors and validation alerts --}}
@if ($errors->all())
    @foreach ($errors->all() as $error)
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong> {!! $error !!}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endforeach
@endif



{{-- Success alert --}}
@if (Session::get('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>  {{Session::get('success')}}</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>


@endif



{{-- Info alert --}}
@if (Session::get('info'))
<div class="alert alert-info alert-dismissible fade show" role="alert">
  <strong>  {{Session::get('info')}}</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

@endif
