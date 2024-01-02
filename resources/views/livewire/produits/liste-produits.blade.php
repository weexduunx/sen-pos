<div>
    <x-slot name="header">
        <h4>
            {{ __('Gestion des produits') }}
        </h4>
    </x-slot>
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
                <table class="table datanew">
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
                        @forelse ($produits as $produit)
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
                                <td>{{ $produit->created_at->format('d/m/Y H:i:s') }}</td>
                                <td>
                                    <a href="javascript:void(0);" class="btn"
                                        wire:click='details({{ $produit->id }})'>
                                        <img src="{{ asset('assets/img/icons/eye.svg') }}" alt="img">
                                    </a>

                                    <a href="javascript:void(0);" class="btn" data-bs-toggle="modal"
                                        wire:click='edit({{ $produit->id }})'>
                                        <img src="{{ asset('assets/img/icons/edit.svg') }}" alt="img">
                                    </a>
                                    <a href="javascript:void(0);" class="btn" wire:click='delete({{ $produit->id }})'>
                                        <img src="{{ asset('assets/img/icons/delete.svg') }}" alt="img">
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="10">Aucun produit trouvé.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- /product list -->

    <!-- Modal CreateAndUpdate -->
    <div wire:ignore.self class="modal fade" id="createAndUpdateModal" tabindex="-1"
        aria-labelledby="createAndUpdateModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    {{-- <h5 class="modal-title" id="exampleModalLabel">Product Add</h5> --}}
                    <div class="page-header modal-title mb-0">
                        <div class="page-title">
                            @if ($mode === 'create')
                                <h4>Product Add</h4>
                                <h6>Create new product</h6>
                            @else
                                <h4>Product Edit</h4>
                                <h6>Edit product details</h6>
                            @endif
                        </div>
                    </div>
                    <button type="button" class="btn-close btn-secondary" wire:click="fermer"
                        aria-label="Close">x</button>
                </div>
                <div class="modal-body">
                    <!-- /add -->
                    <div class="card">
                        <div class="card-body">
                            <form wire:submit.prevent="{{ $mode === 'create' ? 'create' : 'update' }}">
                                <div class="row">
                                    @if ($mode === 'edit')
                                        <input type="hidden" wire:model="idProduit">
                                    @endif
                                    <div class="col-lg-4 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label>Nom Produit</label>
                                            <input type="text" wire:model='nomProduit'>
                                            @error('nomProduit')
                                                <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label>Prix d'Achat</label>
                                            <input type="text" wire:model='prixAchat'>
                                            @error('prixAchat')
                                                <span class="error">{{ $message }}</span>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label>Prix de Vente</label>
                                            <input type="text" wire:model='prixVente'>
                                            @error('prixVente')
                                                <span class="error">{{ $message }}</span>
                                            @enderror
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
                                            @error('marqueProduit')
                                                <span class="error">{{ $message }}</span>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label>Code Bar</label>
                                            <input type="text" wire:model='codeBar'>
                                            @error('codeBar')
                                                <span class="error">{{ $message }}</span>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label>Unité</label>
                                            <select class="form-select" wire:model='unit_id'>
                                                <option>Choose Unit</option>
                                                <option value="métre">métre</option>
                                                <option value="pouce">"</option>
                                                <option value="50 kg"> 50 kg</option>
                                                <option value="25 kg"> 25 kg</option>
                                            </select>
                                            @error('unit_id')
                                                <span class="error">{{ $message }}</span>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label>Seuil</label>
                                            <input type="text" wire:model='alertStock'>
                                            @error('alertStock')
                                                <span class="error">{{ $message }}</span>
                                            @enderror

                                        </div>
                                    </div>

                                    <div class="col-lg-2 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label>Quantité</label>
                                            <input type="text" wire:model='quatite'>
                                            @error('quatite')
                                                <span class="error">{{ $message }}</span>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label> Status</label>
                                            <select class="form-select" wire:model='status'>
                                                <option value="0">Closed</option>
                                                <option value="1">Open</option>
                                            </select>
                                            @error('status')
                                                <span class="error">{{ $message }}</span>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control" wire:model='description'></textarea>
                                            @error('description')
                                                <span class="error">{{ $message }}</span>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label> Product Image</label>
                                            <div class="image-upload">
                                                <input type="file" wire:model="image">
                                                <div class="image-uploads">
                                                    @if ($mode === 'create')
                                                        @if ($image)
                                                            <img src="{{ $image->temporaryUrl() }}" width="80"
                                                                height="80" alt="img">
                                                        @else
                                                            <img src="{{ asset('assets/img/icons/upload.svg') }}"
                                                                alt="img">
                                                            <h4>Drag and drop a file to upload</h4>
                                                        @endif
                                                    @else
                                                        @if ($image)
                                                            <img src="{{ $image->temporaryUrl() }}" width="80"
                                                                height="80" alt="img">
                                                        @elseif ($imageDetail)
                                                            <img src="{{ asset('/storage/' . $imageDetail) }}"
                                                                width="80" height="80" alt="img">
                                                        @else
                                                            <img src="{{ asset('assets/img/icons/upload.svg') }}"
                                                                alt="img">
                                                            <h4>Drag and drop a file to upload</h4>
                                                        @endif
                                                    @endif
                                                </div>
                                                @error('image')
                                                    <span class="error">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <button class="btn btn-submit me-2" type="submit"
                                            wire:loading.attr="disabled"
                                            wire:target="{{ $mode === 'create' ? 'create' : 'update' }}">
                                            {{ $mode === 'create' ? 'Create' : 'Update' }}
                                            <div wire:loading>
                                                <div class="spinner-border" role="status">
                                                    <span class="sr-only">Loading...</span>
                                                </div>
                                            </div>
                                        </button>
                                        <button class="btn btn-cancel" type="button" wire:click="fermer">Cancel</button>
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
    <!-- /Modal CreateAndUpdate-->

    <!-- Modal Détails produits -->
    <div wire:model="produitDetails" class="modal modal1 fade" id="detailModal" tabindex="-1"
        aria-labelledby="detailModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="page-header modal-title mb-0">
                        <div class="page-title">
                            <h4>Product Details</h4>
                            <h6>Full details of a product</h6>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
                </div>
                <div class="modal-body">
                    <!-- /add -->
                    <div class="row">
                        <div class="col-lg-8 col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="bar-code-view">
                                        <img src="{{ asset('assets/img/barcode1.png') }}" alt="barcode">
                                        <a class="printimg">
                                            <img src="{{ asset('assets/img/icons/printer.svg') }}" alt="print">
                                        </a>
                                    </div>
                                    <div class="productdetails">
                                        <ul class="product-bar">
                                            <li>
                                                <h4>Nom Produit</h4>
                                                <h6>{{ $nomProduit }}</h6>
                                            </li>
                                            <li>
                                                <h4>Categorie</h4>
                                                <h6>{{ $nomCategorie }}</h6>
                                            </li>
                                            <li>
                                                <h4>Marque</h4>
                                                <h6>{{ $marqueProduit }}</h6>
                                            </li>
                                            <li>
                                                <h4>Prix d'achat</h4>
                                                <h6>{{ $prixAchat }}</h6>
                                            </li>
                                            <li>
                                                <h4>Prix de vente</h4>
                                                <h6>{{ $prixVente }}</h6>
                                            </li>
                                            <li>
                                                <h4>Unité</h4>
                                                <h6>{{ $unit_id }}</h6>
                                            </li>
                                            <li>
                                                <h4>Quantité</h4>
                                                <h6>{{ $quatite }}</h6>
                                            </li>
                                            <li>
                                                <h4>Crée le</h4>
                                                <h6>{{ $created_at }}</h6>
                                            </li>
                                            <li>
                                                <h4>Description</h4>
                                                <h6>{{ $description }}</h6>
                                            </li>

                                        </ul>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-12">
                            <div class="card">
                                <div class="card-body ">
                                    <div class="slider-product-details">
                                        <div wire:ignore.self class="owl-carousel owl-theme product-slide"
                                            wire:after="initOwlCarousel">
                                            <div class="slider-product">

                                                <img src="{{ asset('storage/' . $detailImage) }}" alt="img">
                                                <h4>{{ $nomProduit }}</h4>
                                                <h6>{{ $unit_id }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /add -->
                </div>
                <div class="modal-footer">
                    <button class="btn btn-cancel" data-bs-dismiss="modal">Cancel</button>
                </div>

            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script src="{{ asset('assets/plugins/owlcarousel/owl.carousel.min.js') }}"></script>
@endpush
