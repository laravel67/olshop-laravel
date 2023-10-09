 <div class="container">
     <div class="row justify-content-center">
         <div class="col-md-8">
             <div class="card">
                 <div class="card-header d-flex justify-content-between">
                     <strong>Products</strong>
                     <button wire:click="$toggle('formVisible')" class="btn btn-success btn-sm">+ new product</button>
                 </div>
                 <div class="card-body">
                     <div class="mb-3">
                         @if ($formVisible)
                             @if (!$formUpdate)
                                 @livewire('products.create')
                             @else
                                 @livewire('products.update')
                             @endif
                             <hr>
                         @endif
                     </div>
                     @include('livewire.products.flash')
                     <div class="row">
                         <div class="col-1">
                             <label for="">Show:</label>
                         </div>
                         <div class="col">
                             <select wire:model.live="paginate" name="" id=""
                                 class="form-control form-control-sm text-center w-auto border-danger">
                                 <option value="5">5 Entries</option>
                                 <option value="10">10 Entries</option>
                                 <option value="15">15 Entries</option>
                                 <option value="50">50 Entries</option>
                                 <option value="100">50 Entries</option>
                             </select>
                         </div>
                         <div class="col">
                             <input wire:model.live="search" type="text" class="form-control form-control-sm"
                                 placeholder="Search">
                         </div>
                     </div>
                     <hr>
                     <table class="table">
                         <thead class="thead-dark">
                             <tr>
                                 <th>No.</th>
                                 <th>Name Product</th>
                                 <th>Price</th>
                                 <th>Action</th>
                             </tr>
                         </thead>
                         <tbody>
                             @foreach ($products as $index => $product)
                                 <tr>
                                     <td>{{ $products->firstItem() + $index }}</td>
                                     <td>{{ $product->name }}</td>
                                     <td><strong>Rp.</strong> {{ number_format($product->price, 2, ',', '.') }}</td>
                                     <td>
                                         <button wire:click="editProduct({{ $product->id }})" class="btn btn-warning text-white">Edit</button>
                                         <button wire:click="deleteProduct({{ $product->id }})" class="btn btn-danger text-white">Delete</button>
                                     </td>
                                 </tr>
                             @endforeach
                         </tbody>
                     </table>
                     <div>{{ $products->links() }}</div>
                     @php $jumlah= count($products) @endphp
                     <div>Jumlah Product: {{ $jumlah }} </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
