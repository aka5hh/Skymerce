<div>

    @include('livewire.admin.brand.modal-form')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        Brands List
                        <a href="#" data-bs-toggle="modal" data-bs-target="#addBrandModal"
                            class="btn btn-primary btn-sm float-end text-white">Add Brands</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($brands as $brand)
                                <tr>
                                    <td>{{ $brand->id }}</td>
                                    <td>{{ $brand->name }}</td>
                                    <td>{{ $brand->slug }}</td>
                                    <td>{{ $brand->status == '1' ? 'Visible' : 'Hidden' }}</td>
                                    <td>
                                        <a href="#" wire:click="editBrand({{ $brand->id }})"data-bs-toggle="modal" data-bs-target="#updateBrandModal" class="btn btn-sm btn-success">Edit</a>
                                        <a href="#" wire:click="deleteConfirm({{ $brand->id }})"class="btn btn-sm btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $brands->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        window.addEventListener('close-modal', event => {
            $('#addBrandModal').modal('hide');
            $('#updateBrandModal').modal('hide');
        });
    </script>
@endpush
