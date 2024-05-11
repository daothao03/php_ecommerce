@extends('admin.layouts.master')

@section('title')
{{$settings->site_name}}
@endsection

@section('content')
<section class="section">
    <div class="section-header">
      <h1>ChildCategory</h1>

    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Create ChildCategory</h4>

            </div>
            <div class="card-body">
                <form action="{{route('admin.childCategory.store')}}" method="post" enctype="multipart/form-data">
                     @csrf
                     <div class="form-group">
                        <label for="inputState">Category</label>
                        <select id="inputState" class="form-control main-category" name="category">
                            <option value="">...</option>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputState">SubCategory</label>
                        <select id="inputState" class="form-control sub-category" name="sub_category">
                            <option value="">...</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" value="{{old('name')}}">
                    </div>
                    <div class="form-group">
                        <label for="inputState">Status</label>
                        <select id="inputState" class="form-control" name="status">
                          <option value="1">Active</option>
                          <option value="0">Inactive</option>
                        </select>
                      </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>

          </div>
        </div>

      </div>
    </div>
  </section>
@endsection

@push('scripts')
    <script>
        $(document).ready(function(){
            $('body').on('change', '.main-category', function(e){
                let id = $(this).val();
                // alert(id);
                $.ajax({
                    method: 'GET',
                    url: "{{route('admin.get-subcategories')}}",
                    data: {
                        id:id
                    },
                    success: function(data){
                        console.log(data);
                        // $.each(data, function(i, item) {
                        //     $('.sub-category').append(`<option value="${item.id}">${item.name}</option>`)
                        // })
                        $('.sub-category').html('<option value="">Select</option>')

                        $.each(data, function(i, item){
                            $('.sub-category').append(`<option value="${item.id}">${item.name}</option>`)
                        })
                    },
                    error: function(xhr, status, error){
                        console.log(error);
                    }
                })
            })

        })
    </script>
@endpush
