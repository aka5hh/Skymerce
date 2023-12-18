<div class="row">
    <div class="col-md-12 grid-margin">
        @if (session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif
        <div class = "card">
            <div class = "card-header">
                <h3> Category
                    <a href = "{{ url('admin/category/create') }}" class="btn btn-primary text-white btn-sm float-end">Add Category</a>
                </h3>
            </div>
            <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category )
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->name}}</td>
                        <td>{{$category->status =='1' ? 'Visible':'Hidden'}}</td>
                        <td>
                            <a href="{{url('admin/category/'.$category->id.'/edit')}}" class="btn btn-success">Edit</a>
                            <a href="" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
                {{$categories->links() }}
            </div>
            </div>
        </div>
    </div>
</div>