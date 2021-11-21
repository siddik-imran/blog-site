@extends('layouts.app')

@section('page_heading')
     Category List
@endsection

@section('page_name')
    Category
@endsection

@section('content')
<div class="col-lg-12 mb-4">
    <div class="card">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Category List Table</h6>
      </div>
      <div class="table-responsive">
        <table class="table align-items-center table-flush">
          <thead class="thead-light">
            <tr>
              <th>Category Name</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{$category->name}}</td>
                    <td>
                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        <button class="btn btn-danger btn-sm" onclick="handleDelete({{$category->id}})">Delete</button>
                    </td>
                </tr>
            @endforeach

          </tbody>
        </table>

        <!-- Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <form action="" method="POST" id="deleteCategory">
                @csrf
                @method('DELETE')
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Delete Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                    <p class="text-center text-bold">
                        Are you sure to delete {{$category->name}}?
                    </p>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Go Back</button>
                    <button type="submit" class="btn btn-sm btn-danger">Yes, Delete</button>
                    </div>
                </div>
            </form>
            </div>
        </div>

      </div>
      <div class="card-footer"></div>
    </div>
  </div>
</div>
@endsection

@section('script')
    <script>
        function handleDelete($id)
        {
            var form =document.getElementById('deleteCategory')
            form.action = '/categories/'+$id
            //console.log(form)
            $('#deleteModal').modal('show')
        }
    </script>
@endsection
