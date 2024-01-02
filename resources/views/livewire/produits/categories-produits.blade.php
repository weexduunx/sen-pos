<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    <div class="content">

        <x-slot name="header">
            <h4>
                {{ __('Gestion des catégories') }}
            </h4>
        </x-slot>

        <!-- /product list -->
        <div class="card">
            <div class="card-body">
                <div class="table-top">
                    <div class="search-set">
                        <div class="search-input">
                            <a class="btn btn-searchset">
                                <img src="assets/img/icons/search-white.svg" alt="img">
                            </a>
                            <div id="DataTables_Table_0_filter" class="dataTables_filter">
                                <label>
                                    <input type="search" wire:model="search" class="form-control form-control-sm" placeholder="Search..."
                                        aria-controls="DataTables_Table_0">
                                </label>
                            </div>
                        </div>
                    </div>                    
                    <div class="wordset">
                        <ul>
                            <li>
                                <a data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                    data-bs-original-title="pdf" aria-label="pdf"><img src="assets/img/icons/pdf.svg"
                                        alt="img"></a>
                            </li>
                            <li>
                                <a data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                    data-bs-original-title="excel" aria-label="excel"><img
                                        src="assets/img/icons/excel.svg" alt="img"></a>
                            </li>
                            <li>
                                <a data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                    data-bs-original-title="print" aria-label="print"><img
                                        src="assets/img/icons/printer.svg" alt="img"></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-nowrap mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nom Categorie </th>
                                <th>Code</th>
                                <th>Image</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $category->nomCategorie }}</td>
                                <td>{{ $category->code }}</td>
                                <td>
                                    @if($category->image)
                                        <img src="{{ asset('storage/'.$category->image) }}" alt="{{ $category->nomCategorie }}" width="50" height="50">
                                    @else
                                        N/A
                                    @endif
                                </td>
                                <td>
                                    <a class="me-3" href="editproduct.html">
                                        <img src="assets/img/icons/edit.svg" alt="img">
                                    </a>
                                    <a class="confirm-text" href="javascript:void(0);">
                                        <img src="assets/img/icons/delete.svg" alt="img">
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- Afficher la pagination -->
                </div>
                {{ $categories->links() }} 
            </div>
        </div>
        <!-- /product list -->
    </div>
    <div wire:ignore.self class="modal fade" id="AddCategorie" tabindex="-1" aria-labelledby="create" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ajout Catégories De Produit</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label>Nom </label>
                                        <input wire:model="nomCategorie" type="text" id="code">
                                        @error('nomCategorie') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label>Code Categorie</label>
                                        <input wire:model="code" type="text" id="code">
                                        @error('code') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Image</label>
                                        <div class="image-upload image-upload-new">
                                            <input wire:model="image" type="file" accept="image/*" id="image">
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
                                            @error('image') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="col-lg-12">
                                <a wire:click="createCategorie" class="btn btn-submit me-2">Submit</a>
                                <a class="btn btn-cancel" data-bs-dismiss="modal">Cancel</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


