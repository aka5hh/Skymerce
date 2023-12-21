<!-- Modal -->
<div wire:ignore.self class="modal fade" id="addBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Brands</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="storeBrand()" action="">
                
            <div class="modal-body">
                <div class="md-3">
                    <label>Brand Name</label>
                    <input type="text" wire:modal.defer="name" class="form-control">
                    @error('name') <small class="text-danger">{{ $message}}</small> @enderror
                </div>
                <div class="md-3">
                    <label>Brand slug</label>
                    <input type="text" wire:modal.defer="slug" class="form-control">
                    @error('slug') <small class="text-danger">{{ $message}}</small> @enderror
                </div>
                <div class="md-3">
                    <label>Status</label>
                    <input type="checkbox" wire:modal.defer="status" />Checked = Visible, Un-checked = Hidden
                    @error('checkbox') <small class="text-danger">{{ $message}}</small> @enderror
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary text-white">Save</button>
            </div>

        </form>      
    </div>
    </div>
</div>
