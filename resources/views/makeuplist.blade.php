@extends('cmaster')

@section('title')
Makeup Hub | Makeup Category
@endsection

@section('menuactive')
active
@endsection

@section('content')
<div class="container">
<h2 class="text-center m-4">Cosmetic Category</h2>

    <div id="accordion">
        @foreach($makeup->unique('category') as $data)
        <div class="card">
            <div class="card-header bg-success" id="heading{{$data->id}}">
                <h5 class="mb-0">
                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapse{{$data->id}}" aria-expanded="true" aria-controls="collapse{{$data->id}}">
                        <h3 class="text-white"> -> {{$data->category}}</h3>
                    </button>
                </h5>
            </div>
            <div id="collapse{{$data->id}}" class="collapse" aria-labelledby="heading{{$data->id}}" data-parent="#accordion">
                <div class="card-body" style="display: flex; flex-wrap: wrap;">
                    @foreach($makeup->where('category', $data->category) as $item)
                    <div class="col-md-4 col-lg-3 col-sm-6 col-xs-12 mb-3">
                        <div class="card" style="width: 100%;">
                            <a href="makeup-details/{{$item->id}}">
                                <img class="card-img-top" src="uploads/{{$item->image ?? ''}}" alt="Card image cap" height="150px">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title text-primary">{{$item->makeup_name}}</h5>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item font-weight-bold text-danger">Rs.{{$item->price}}</li>
                            </ul>
                            <div class="view">
                                <a href="makeup-details/{{$item->id}}" class="btn btn-danger"><i class="fa fa-eye"></i> View</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
