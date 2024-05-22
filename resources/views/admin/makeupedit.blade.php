@extends('admin.master')

@section('title')
Makeup Hub | Cosmetics Edit
@endsection


@section('makeupmenu')
active
@endsection

@section('content')

<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Cosmetics Menu</h4>
                    <hr>
                </div>
                <div class="card-body">
                    <h3><u>Edit Cosmetics Info</u></h3>
                    <form method="post" action="{{ asset('submiteditmakeup')}}" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="id" value="{{$makeup->id}}">
                        <div class="form-group">
                            <label for="name">Category</label>
                            <select class="form-control" name="category" required>
                                <option value="">Select Category</option>
                                @foreach($cat as $c)
                                <option @if ($makeup->category == $c->category)
                                    selected
                                    @endif value="{{$c->category}}">{{$c->category}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{$makeup->makeup_name}}" required>
                        </div>

                        <div class="form-group">
                            <label for="des">Description</label>
                            <textarea class="form-control" id="description" name="description" >{!! $makeup->description !!}</textarea>
                        </div><br>

                        <div class="input-group">
                            <label>Image</label>
                            <input type="file" name="image" class="form-control"><img src="/uploads/{{$makeup->image}}" height="100" width="150">
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" id="price" name="price" class="form-control" value="{{$makeup->price}}" required>
                        </div>

                        <div class="form-group">
                            <input type="submit" name="submit" value="Add" class="btn btn-success">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>

<script>
    ClassicEditor
        .create(document.querySelector('#description'))
        .then(editor => {
            editor.setData(`{!! $makeup->description !!}`);
        })
        .catch(error => {
            console.error(error);
        });
</script>
@endsection
