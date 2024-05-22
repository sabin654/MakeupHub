@extends('admin.master')

@section('title')
Makeup Hub | District
@endsection

@section('district')
   active
@endsection

@section('content')

	<div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">District</h4><hr>

              </div>

              <div class="card-body">

                <div style="border: 1px solid black; padding: 30px;">
                  <h3 class="text-primary">District</h3><hr>
                <form action="{{ asset('adddistrict')}}" method="post">

                  @csrf
                <input type="text" name="name" placeholder="Enter district.." class="form-control" style="font-size: 18px; height: 42px;" required><br>
                <input type="submit" name="submit" class="btn btn-primary" value="Add">
              </form>

              </div>
              <hr><br>

                @if(Session::has('success'))
                <p class="alert alert-success">{{ Session::get('success')}}</p>
                @endif

                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                        S.N
                      </th>
                      <th>
                        Name
                      </th>
                      <th colspan="2" class="text-right">
                        Action
                      </th>
                    </thead>
                    <tbody>
                      <tr>
                        <?php $i=1 ?>
                        @forelse($district as $dis)
                        <td>
                          {{$i}}
                        </td>
                        <td>
                          {{$dis->name}}
                        </td>

                        <td class="text-right">
                        <form id="delete-form-{{$dis->id}}" action="districtdelete/{{$dis->id}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger delete-btn" data-id="{{$dis->id}}">Delete</button>
                        </form>
                        </td>
                      </tr>
                      <?php $i++; ?>
                      @empty
                      <h5 class="bg-danger">No District Found !!</h5>
                      @endforelse
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


@endsection
@section('js')
<script>
   $(document).ready(function() {
        $('.delete-btn').on('click', function() {
            var id = $(this).data('id');
            var confirmation = confirm('Are you sure to delete?');
            if (confirmation) {
                $('#delete-form-' + id).submit();
            }
        });
    });
</script>
@endsection
