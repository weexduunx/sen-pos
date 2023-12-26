<div>
    <div class="content">

        <div class="page-header">
            <div class="page-title">
                <h4>Product Add</h4>
                <h6>Create new product</h6>
            </div>
        </div>
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
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label >Catégorie</label>
                                <div>
                                    <select class="form-select  select2" wire:model='categorie_id'>
                                        <option >-- Select --</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->nomCategorie }}</option>
                                        @endforeach
                                    </select>
                                    <div>
                                        @error('categorie_id')
                                            <span class="error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="form-group">
                                <label>Catégorie</label>
                                <select class="" wire:model='categorieId'>
                                    <option>Choose Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->nomCategorie }}</option>
                                    @endforeach
                                </select>
                                <div>
                                    @error('categorieId')
                                        <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div> --}}
                        </div>

                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Sous Catégorie</label>
                                <select class="" wire:model='sousCategorie_id'>
                                    <option>Choose Sub Category</option>
                                    @foreach ($sousCategories as $sousCategorie)
                                        <option value="{{ $sousCategorie->id }}">{{ $sousCategorie->libelle }}</option>
                                    @endforeach
                                </select>
                                <div>
                                    @error('sousCategorie_id')
                                        <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Marque</label>
                                <select class="" wire:model='marqueProduit'>
                                    <option>Choose Brand</option>
                                    <option value="sympa">Sympa</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Code Bar</label>
                                <input type="text" wire:model='codeBar'>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Unité</label>
                                <select class="" wire:model='unit_id'>
                                    <option>Choose Unit</option>
                                    <option value="unit">Unit</option>
                                    <option value="kg">kg</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Seuil</label>
                                <input type="text" wire:model='alertStock'>
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Quantité</label>
                                <input type="text" wire:model='quatite'>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label> Status</label>
                                <select class="" wire:model='status'>
                                    <option value="0">Closed</option>
                                    <option value="1">Open</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" wire:model='description'></textarea>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            {{-- <div class="form-group">
                                <label>File Input</label>
                                <div >
                                    <input class="form-control" type="file"  wire:model="image">
                                    @if ($image)
                                        <img src="{{ $image->temporaryUrl() }}" width="100" height="100"
                                                alt="img">
                                    @endif
                                    @error('image') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div> --}}
                            <div class="form-group">
                                <label> Product Image</label>
                                <div class="image-upload">
                                    <input type="file" wire:model="image">
                                    <div class="image-uploads">
                                        @if ($image)
                                            <img src="{{ $image->temporaryUrl() }}" width="80" height="80"
                                                alt="img">
                                        @else
                                            <img src="{{ asset('assets/img/icons/upload.svg') }}" alt="img">
                                            <h4>Drag and drop a file to upload</h4>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <button class="btn btn-submit me-2" type="submit" wire:loading.attr="disabled"
                                wire:target="create">Submit
                                <div wire:loading>
                                    <div class="spinner-border" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                </div>
                            </button>
                            <button class="btn btn-cancel">Cancel</button>
                            {{-- <a href="javascript:void(0);" class="btn btn-submit me-2">Submit</a>
                        <a href="productlist.html" class="btn btn-cancel">Cancel</a> --}}
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /add -->
    </div>
</div>

<!-- Dans votre vue Livewire -->