<div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
    <div class="card border">
        <div class="card-body">
            <form action="{{ route('admin.advertisement.fourbanner') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <h5>banner 1</h5>
                <div class="form-group">
                    <label for="">Status</label>
                    <br>
                    <label class="custom-switch mt-2">
                        <input type="checkbox" {{ $fourBanner->banner_one->status == 1 ? 'checked' : '' }}
                            name="banner_one_status" class="custom-switch-input">
                        <span class="custom-switch-indicator"></span>
                    </label>
                </div>
                <div class="form-group">
                    <img src="{{ asset($fourBanner->banner_one->banner_image) }}" alt="" width="150px">
                </div>
                <div class="form-group">

                    <label>Banner Image</label>
                    <input type="file" class="form-control" name="banner_one_image" value="">
                    <input type="hidden" class="form-control" name="banner_one_old_image"
                        value="{{ $fourBanner->banner_one->banner_image }}">
                </div>
                <div class="form-group">
                    <label>Banner url</label>
                    <input type="text" class="form-control" name="banner_one_url"
                        value="{{ $fourBanner->banner_one->banner_url }}">
                </div>
                <hr>
                <h5>banner 2</h5>
                <div class="form-group">
                    <label for="">Status</label>
                    <br>
                    <label class="custom-switch mt-2">
                        <input {{ $fourBanner->banner_two->status == 1 ? 'checked' : '' }} type="checkbox"
                            name="banner_two_status" class="custom-switch-input">
                        <span class="custom-switch-indicator"></span>
                    </label>
                </div>
                <div class="form-group">
                    <img src="{{ asset($fourBanner->banner_two->banner_image) }}" alt="" width="150px">
                </div>
                <div class="form-group">
                    <label>Banner Image</label>
                    <input type="file" class="form-control" name="banner_two_image" value="">
                    <input type="hidden" class="form-control" name="banner_two_old_image"
                        value="{{ $fourBanner->banner_two->banner_image }}">
                </div>
                <div class="form-group">
                    <label>Banner url</label>
                    <input type="text" class="form-control" name="banner_two_url"
                        value="{{ $fourBanner->banner_two->banner_url }}">
                </div>

                <h5>banner 3</h5>
                <div class="form-group">
                    <label for="">Status</label>
                    <br>
                    <label class="custom-switch mt-2">
                        <input {{ $fourBanner->banner_three->status == 1 ? 'checked' : '' }} type="checkbox"
                            name="banner_three_status" class="custom-switch-input">
                        <span class="custom-switch-indicator"></span>
                    </label>
                </div>
                <div class="form-group">
                    <img src="{{ asset($fourBanner->banner_three->banner_image) }}" alt="" width="150px">
                </div>
                <div class="form-group">

                    <label>Banner Image</label>
                    <input type="file" class="form-control" name="banner_three_image" value="">
                    <input type="hidden" class="form-control" name="banner_three_old_image"
                        value="{{ $fourBanner->banner_three->banner_image }}">
                </div>
                <div class="form-group">
                    <label>Banner url</label>
                    <input type="text" class="form-control" name="banner_three_url"
                        value="{{ $fourBanner->banner_three->banner_url }}">
                </div>


                <h5>banner 3</h5>
                <div class="form-group">
                    <label for="">Status</label>
                    <br>
                    <label class="custom-switch mt-2">
                        <input {{ $fourBanner->banner_four->status == 1 ? 'checked' : '' }} type="checkbox"
                            name="banner_four_status" class="custom-switch-input">
                        <span class="custom-switch-indicator"></span>
                    </label>
                </div>
                <div class="form-group">
                    <img src="{{ asset($fourBanner->banner_four->banner_image) }}" alt="" width="150px">
                </div>
                <div class="form-group">

                    <label>Banner Image</label>
                    <input type="file" class="form-control" name="banner_four_image" value="">
                    <input type="hidden" class="form-control" name="banner_four_old_image"
                        value="{{ $fourBanner->banner_four->banner_image }}">
                </div>
                <div class="form-group">
                    <label>Banner url</label>
                    <input type="text" class="form-control" name="banner_four_url"
                        value="{{ $fourBanner->banner_four->banner_url }}">
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
