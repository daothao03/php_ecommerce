@extends('admin.layouts.master')

@section('title')
{{$settings->site_name}}
@endsection

@section('content')
<section class="section">
    <div class="section-header">
      <h1>Product Image Gallery</h1>
    </div>

    <div class="section-body">

        <div class="mb-3">
            <a href="{{route('admin.product.index')}}">Back</a>
        </div>
      <div class="row">

        <div class="col-12">
          <div class="card">
            <h4>Product: {{$product->name}}</h4>
            <div class="card-header">
              <h4>Upload Image</h4>

            </div>
            <div class="card-body">
                <form action="{{route('admin.products-image-gallery.store')}}" method="POST" enctype="multipart/form-data">
                   @csrf
                    <div class="form-group">
                        <label for="">Select Image</label>
                        <input type="file" name="image[]" id="" class="form-control" multiple>
                        <input type="hidden" name="product" value="{{$product->id}}" id="">
                    </div>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </form>
            </div>

          </div>
        </div>

      </div>

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Product Image Gallery Table</h4>

            </div>
            <div class="card-body">
                {{ $dataTable->table() }}
            </div>

          </div>
        </div>

      </div>
    </div>
  </section>


@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

    <script>
        $(document).ready(function(){
            $('body').on('click', '.change-status', function(){
                let isChecked = $(this).is(':checked');
                let id = $(this).data('id');

                $.ajax({
                    url: "{{route('admin.product.change-status')}}",
                    method: 'PUT',
                    data: {
                        status: isChecked,
                        id: id
                    },
                    success: function(data){
                        toastr.success(data.message);
                    },
                    error: function(xhr, status, error){
                        console.log(error);
                    }
                })
            })
        })
    </script>
@endpush
