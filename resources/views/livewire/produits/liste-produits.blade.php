    <div>
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Product List</h4>
                    <h6>Manage your products</h6>
                </div>
                <div class="page-btn">
                    <button type="button" class="btn btn-added" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <img src="{{ asset('assets/img/icons/plus.svg') }}" alt="img" class="me-1">Add New Product
                    </button>
                    {{-- <a href="addproduct.html" class="btn btn-added"><img src="{{asset('assets/img/icons/plus.svg')}}" alt="img" class="me-1">Add New Product</a> --}}
                </div>
            </div>

            <!-- /product list -->
            <div class="card">
                <div class="card-body">
                    <div class="table-top">
                        <div class="search-set">
                            <div class="search-path">
                                <a class="btn btn-filter" id="filter_search">
                                    <img src="{{ asset('assets/img/icons/filter.svg') }}" alt="img">
                                    <span><img src="{{ asset('assets/img/icons/closes.svg') }}" alt="img"></span>
                                </a>
                            </div>
                            <div class="search-input">
                                <a class="btn btn-searchset"><img src="{{ asset('assets/img/icons/search-white.svg') }}"
                                        alt="img"></a>
                            </div>
                        </div>
                        <div class="wordset">
                            <ul>
                                <li>
                                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img
                                            src="{{ asset('assets/img/icons/pdf.svg') }}" alt="img"></a>
                                </li>
                                <li>
                                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="excel"><img
                                            src="{{ asset('assets/img/icons/excel.svg') }}" alt="img"></a>
                                </li>
                                <li>
                                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="print"><img
                                            src="{{ asset('assets/img/icons/printer.svg') }}" alt="img"></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /Filter -->
                    <div class="card mb-0" id="filter_inputs">
                        <div class="card-body pb-0">
                            <div class="row">
                                <div class="col-lg-12 col-sm-12">
                                    <div class="row">
                                        <div class="col-lg col-sm-6 col-12">
                                            <div class="form-group">
                                                <select class="select">
                                                    <option>Choose Product</option>
                                                    <option>Macbook pro</option>
                                                    <option>Orange</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg col-sm-6 col-12">
                                            <div class="form-group">
                                                <select class="select">
                                                    <option>Choose Category</option>
                                                    <option>Computers</option>
                                                    <option>Fruits</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg col-sm-6 col-12">
                                            <div class="form-group">
                                                <select class="select">
                                                    <option>Choose Sub Category</option>
                                                    <option>Computer</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg col-sm-6 col-12">
                                            <div class="form-group">
                                                <select class="select">
                                                    <option>Brand</option>
                                                    <option>N/D</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg col-sm-6 col-12 ">
                                            <div class="form-group">
                                                <select class="select">
                                                    <option>Price</option>
                                                    <option>150.00</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-1 col-sm-6 col-12">
                                            <div class="form-group">
                                                <a class="btn btn-filters ms-auto"><img
                                                        src="{{ asset('assets/img/icons/search-whites.svg') }}"
                                                        alt="img"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Filter -->
                    <div class="table-responsive">
                        <table class="table  datanew">
                            <thead>
                                <tr>
                                    <th>
                                        <label class="checkboxs">
                                            <input type="checkbox" id="select-all">
                                            <span class="checkmarks"></span>
                                        </label>
                                    </th>
                                    <th>Product Name</th>
                                    <th>Code barre</th>
                                    <th>Category </th>
                                    <th>Brand</th>
                                    <th>price</th>
                                    <th>Unit</th>
                                    <th>Qty</th>
                                    <th>Created By</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($produits as $produit)
                                    <tr>
                                        <td>
                                            <label class="checkboxs">
                                                <input type="checkbox">
                                                <span class="checkmarks"></span>
                                            </label>
                                        </td>
                                        <td class="productimgname">
                                            <a href="javascript:void(0);" class="product-img">
                                                <img src="{{ asset('storage/' . $produit->image) }}" alt="product">
                                            </a>
                                            <a href="javascript:void(0);"> {{ $produit->nomProduit }} </a>
                                        </td>
                                        <td>{{ $produit->codeBar }}</td>
                                        <td>{{ $produit->categorie->nomCategorie }}</td>
                                        <td>{{ $produit->marqueProduit }}</td>
                                        <td>{{ $produit->prixAchat }}</td>
                                        <td>{{ $produit->unit_id }}</td>
                                        <td>{{ $produit->quatite }}</td>
                                        <td>{{ $produit->created_at }}</td>
                                        <td>
                                            <a class="me-3" href="product-details.html">
                                                <img src="{{ asset('assets/img/icons/eye.svg') }}" alt="img">
                                            </a>
                                            <a class="me-3" href="editproduct.html">
                                                <img src="{{ asset('assets/img/icons/edit.svg') }}" alt="img">
                                            </a>
                                            <a class="confirm-text" href="javascript:void(0);">
                                                <img src="{{ asset('assets/img/icons/delete.svg') }}" alt="img">
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /product list -->
        </div>
        <!-- Modal Create -->
        <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        {{-- <h5 class="modal-title" id="exampleModalLabel">Product Add</h5> --}}
                        <div class="page-header modal-title mb-0">
                            <div class="page-title">
                                <h4>Product Add</h4>
                                <h6>Create new product</h6>
                            </div>
                        </div>
                        <button type="button" class="btn-close btn-secondary" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- /add -->
                        <div class="card">
                            <div class="card-body">
                                <form wire:submit="create">
                                    <div class="row">
                                        <div class="col-lg-4 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label>Nom Produit</label>
                                                <input type="text" wire:model='nomProduit'>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label>Prix d'Achat</label>
                                                <input type="text" wire:model='prixAchat'>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label>Prix de Vente</label>
                                                <input type="text" wire:model='prixVente'>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label>Catégorie</label>
                                                <div>
                                                    <select class="form-select" wire:model='categorie_id'>
                                                        <option>-- Choisissez une catégorie --</option>
                                                        @foreach ($categories as $category)
                                                            <option value="{{ $category->id }}">
                                                                {{ $category->nomCategorie }}</option>
                                                        @endforeach
                                                    </select>
                                                    <div>
                                                        @error('categorie_id')
                                                            <span class="error">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label>Sous Catégorie</label>
                                                <select class="form-select" wire:model='sousCategorie_id'>
                                                    <option>Choose Sub Category</option>
                                                    @foreach ($sousCategories as $sousCategorie)
                                                        <option value="{{ $sousCategorie->id }}">
                                                            {{ $sousCategorie->libelle }}</option>
                                                    @endforeach
                                                </select>
                                                <div>
                                                    @error('sousCategorie_id')
                                                        <span class="error">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label>Marque</label>
                                                <select class="form-select" wire:model='marqueProduit'>
                                                    <option>Choose Brand</option>
                                                    <option value="sympa">Sympa</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label>Code Bar</label>
                                                <input type="text" wire:model='codeBar'>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label>Unité</label>
                                                <select class="form-select" wire:model='unit_id'>
                                                    <option>Choose Unit</option>
                                                    <option value="unit">Unit</option>
                                                    <option value="kg">kg</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label>Seuil</label>
                                                <input type="text" wire:model='alertStock'>
                                            </div>
                                        </div>

                                        <div class="col-lg-2 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label>Quantité</label>
                                                <input type="text" wire:model='quatite'>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label> Status</label>
                                                <select class="form-select" wire:model='status'>
                                                    <option value="0">Closed</option>
                                                    <option value="1">Open</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea class="form-control" wire:model='description'></textarea>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label> Product Image</label>
                                                <div class="image-upload">
                                                    <input type="file" wire:model="image">
                                                    <div class="image-uploads">
                                                        @if ($image)
                                                            <img src="{{ $image->temporaryUrl() }}" width="80"
                                                                height="80" alt="img">
                                                        @else
                                                            <img src="{{ asset('assets/img/icons/upload.svg') }}"
                                                                alt="img">
                                                            <h4>Drag and drop a file to upload</h4>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <button class="btn btn-submit me-2" type="submit"
                                                wire:loading.attr="disabled" wire:target="create">Submit
                                                <div wire:loading>
                                                    <div class="spinner-border" role="status">
                                                        <span class="sr-only">Loading...</span>
                                                    </div>
                                                </div>
                                            </button>
                                            <button class="btn btn-cancel" data-bs-dismiss="modal">Cancel</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /add -->
                    </div>
                </div>
            </div>
        </div>

</div>
@push('scripts')
    <script>
        window.addEventListener('alert', event => {
            toastr[event.detail.type](event.detail.message,
                event.detail.title ?? ''), toastr.options = {
                "closeButton": true,
                "progressBar": true,
            }
        });
    </script>
@endpush
