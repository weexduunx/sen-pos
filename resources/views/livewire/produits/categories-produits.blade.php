<div>
    <x-slot name="header">
        <h4>{{ __('Gestion des catégories') }}</h4>
        <h6>{{ __('Liste des catégories') }}</h6>
    </x-slot>
    @include('sweetalert::alert')
    <!-- /Catégorie list -->
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
                                <input type="search" wire:model="search" class="form-control form-control-sm"
                                    placeholder="Search..." aria-controls="DataTables_Table_0">
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
                                data-bs-original-title="excel" aria-label="excel"><img src="assets/img/icons/excel.svg"
                                    alt="img"></a>
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
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $category->nomCategorie }}</td>
                                <td>{{ $category->code }}</td>
                                <td>
                                    @if ($category->image)
                                        <img src="{{ asset('storage/' . $category->image) }}"
                                            alt="{{ $category->nomCategorie }}" width="50" height="50">
                                    @else
                                        N/A
                                    @endif
                                </td>
                                <td>
                                    <a href="javascript:void(0);" class="btn" wire:click='editCategorie({{ $category->id }})'>
                                        <img src="{{ asset('assets/img/icons/edit.svg') }}" alt="img">
                                    </a>
                                    <a href="javascript:void(0);" class="btn" wire:click='delete({{ $category->id }})'>
                                        <img src="{{ asset('assets/img/icons/delete.svg') }}" alt="img">
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
    <!-- /Catégorie list -->
    <div wire:ignore.self class="modal fade" id="AddCategorie" tabindex="-1" aria-labelledby="create"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="page-header modal-title mb-0">
                        <div class="page-title">
                            @if ($mode === 'create')
                                <h4>Ajout</h4>
                                <h6>Ajouter une catégorie</h6>
                            @else
                                <h4>Modification</h4>
                                <h6>Modifier une catégorie</h6>
                            @endif
                        </div>
                    </div>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <form wire:submit.prevent="{{ $mode === 'create' ? 'createCategorie' : 'update' }}">
                            <div class="row">
                                @if ($mode === 'edit')
                                    <input type="hidden" wire:model="idCategorie">
                                @endif
                                <div class="col-lg-6 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label>Nom </label>
                                        <input wire:model="nomCategorie" type="text" id="code">
                                        @error('nomCategorie')
                                            <span class="error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label>Code Categorie</label>
                                        <input wire:model="code" type="text" id="code">
                                        @error('code')
                                            <span class="error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Image</label>
                                        <div class="image-upload image-upload-new">
                                            <input type="file" wire:model="image"  accept="image/*" id="image">
                                            <div class="image-uploads">
                                                @if ($mode === 'create')
                                                    @if ($image)
                                                        <img src="{{ $image->temporaryUrl() }}" width="150"
                                                            height="150" alt="img">
                                                    @else
                                                        <img src="{{ asset('assets/img/icons/upload.svg') }}"
                                                            alt="img">
                                                        <h4>Drag and drop a file to upload</h4>
                                                    @endif
                                                @else
                                                    @if ($image)
                                                        <img src="{{ $image->temporaryUrl() }}" width="150"
                                                            height="150" alt="img">
                                                    @elseif ($editedCategs->image)
                                                        <img src="{{ asset('storage/' . $editedImage) }}"
                                                            width="150" height="150" alt="img">
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
                                        {{-- <div class="image-upload image-upload-new">
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
                                            @error('image')
                                                <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="col-lg-12">
                                <button class="btn btn-submit me-2" type="submit"
                                wire:loading.attr="disabled"
                                wire:target="{{ $mode === 'create' ? 'createCategorie' : 'update' }}">
                                <span wire:loading class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                {{ $mode === 'create' ? 'Ajouter' : 'Modifier' }}
                            </button>
                            <button class="btn btn-cancel" type="button" wire:click="fermer">fermer</button>
                                {{-- <a wire:click="createCategorie" class="btn btn-submit me-2">Submit</a>
                                <a class="btn btn-cancel" data-bs-dismiss="modal">Cancel</a> --}}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script>
    document.addEventListener('livewire:load', () => {
        Livewire.on('closeModal', () => {
            $('#AddCategorie').modal('hide');
        });
    });
    document.addEventListener('livewire:load', () => {
        Livewire.on('openCategEditModal', (event) => {
            $('#AddCategorie').modal('show');
        });

    });
</script>
@endpush