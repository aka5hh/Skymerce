<div wire:ignore.self class="modal fade" id="addBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Brands</h1>
                <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="storeBrand" action="">
                
            <div class="modal-body">
                <div class="md-3">
                    <label>Brand Name</label>
                    <input type="text" wire:model.defer="name" class="form-control">
                    @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="md-3">
                    <label>Brand slug</label>
                    <input type="text" wire:model.defer="slug" class="form-control">
                    @error('slug') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="md-3">
                    <label>Status</label>
                    <input type="checkbox" wire:model.defer="status" style="width:130px;" />Checked = Visible, Un-checked = Hidden
                    @error('status') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" wire:click="closeModal" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary text-white">Save</button>
            </div>

        </form>      
    </div>
    </div>
</div>

{{-- Brand Update modal --}}

<div wire:ignore.self class="modal fade" id="updateBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Update Brands</h1>
                <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div wire:loading>
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>

            <div wire:loading.remove>
            <form wire:submit.prevent="updateBrand" action="">
                
            <div class="modal-body">
                <div class="md-3">
                    <label>Brand Name</label>
                    <input type="text" wire:model.defer="name" class="form-control" >
                    @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="md-3">
                    <label>Brand slug</label>
                    <input type="text" wire:model.defer="slug" class="form-control">
                    @error('slug') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="md-3">
                    <label>Status</label>
                    <input type="checkbox" wire:model.defer="status" style="width:130px;" />Checked = Visible, Un-checked = Hidden
                    @error('status') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" wire:click="closeModal" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary text-white">Update</button>
            </div>

        </form>     
        </div>
    </div>
    </div>
</div>
