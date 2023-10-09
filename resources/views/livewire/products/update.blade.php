<div>
    <h4 class="text-primary">Update new product</h4>
    <form wire:submit.prevent='update' method="post" enctype="multipart/form-data">
        <div class="form-group mb-3">
            <div class="row">
                <div class="col">
                    <label for="name">Name products</label>
                    <input wire:model='name' type="text" name="name"
                        class="form-control @error('name') is-invalid @enderror" placeholder="Name product" autofocus>
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col">
                    <label for="price">Price products</label>
                    <input wire:model='price' type="number" id="price" name="price"
                        class="form-control @error('price') is-invalid @enderror" placeholder="Rp.">
                    @error('price')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-group mb-3">
            <div class="row">
                <div class="col">
                    <label for="description">Description</label>
                    <textarea wire:model='description' name="description" cols="10" rows="5" id="description" class="form-control @error('description')
                        is-invalid
                    @enderror" placeholder="Descript your product..."></textarea>
                    @error('description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col">
                    <label for="image">Upload Image</label>
                    <input wire:model='image' type="file" class="form-control @error('image') is-invalid @enderror"
                        name="image" id="image">
                    @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                    @if ($image)
                    <img class="mt-2" src="{{ $image->temporaryUrl() }}" height="200">
                    @else
                    <img src="{{ $imageOld }}" height="200">
                    @endif
                </div>
            </div>
            <div>
                <button type="submit" class="btn btn-success mt-3"> Save</button>
                <button wire:click="$approve('formClose')" type="button" class="btn btn-danger mt-3"> Close</button>
            </div>
        </div>
    </form>
</div>