<div>
    <x-slot name="header">
        <h4>{{ __('Print Barcode') }}</h4>
        <h6>{{ __('Print product barcodes') }}</h6>
    </x-slot>
    @include('sweetalert::alert')
    <!-- /add -->
    <div class="card">
        <div class="card-body">
            <div class="requiredfield">
                <h4>The field labels marked with * are required input fields.</h4>
            </div>
            <div class="form-group mb-1">
                <label>Product Name</label>
                <div class="input-groupicon">
                    <input wire:model.debounce.50ms="search" type="text" 
                    placeholder="{{ $selectedProduct ? $selectedProduct->nomProduit : 'Please type product code and select...' }}">
                    <div class="addonset">
                        <img src="{{ asset('assets/img/icons/search.svg') }}" alt="img">
                    </div>
                </div>
            </div>
            @if ($searchResults)
                <div  class="card" id="hideCard" style="z-index: 2;left: 0;right: 0;border: 0;">
                    <div class="card-body shadow">
                        <div class="d-flex justify-content-center"  >
                            <div wire:loading  wire:target="search" class="spinner-border" style="color:#FF9F43 !important; " role="status">
                                <span class="sr-only">Chargement...</span>
                            </div>
                        </div>
                        <ul class="list-group list-group-flush" wire:loading.remove>
                            @foreach ($searchResults as $result)
                            <li class="list-group-item list-group-item-action">
                                <a 
                                    wire:click="selectProduct('{{ $result->id }}')"
                                    href="#">
                                    {{ $result->nomProduit }} | {{ $result->code_produit }}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
            <div class="card mt-4">
                <div class="card-body shadow">
                    <div class="table-responsive ">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nom Produit</th>
                                    <th>Code</th>
                                    <th>Qté</th>
                                    <th></th>
                                </tr>
                            </thead>
                            @if ($selectedProduct)
                            <tbody>
                                <tr>
                                    <td>{{ $selectedProduct->nomProduit }}</td>
                                    <td>{{ $selectedProduct->code_produit }}</td>
                                    <td>{{ $selectedProduct->quatite }}</td>
                                    <td class="text-end">
                                        <a class="delete-set"><img src="assets/img/icons/delete.svg" alt="img"></a>
                                    </td>
                                </tr>
                            </tbody>
                            @else
                            <tbody>
                                <tr>
                                    <td colspan="4" class="text-center">Product not selected</td>
                                </tr>
                            </tbody>
                            @endif
                        </table> <br>
                        {{-- <button wire:click="generateBarcode" type="button"  class="btn btn-primary btn-sm">
                            <i class="bi bi-upc-scan"></i> <strong> Générer un code barre</strong>
                        </button> --}}
                        <button wire:click="generateBarcode('C39')" type="button"  class="btn btn-primary btn-sm"> <i class="bi bi-upc-scan"></i> Generate C39 Barcode</button>
                        <button wire:click="generateBarcode('QRCODE')" type="button"  class="btn btn-primary btn-sm"> <i class="bi bi-upc-scan"></i> Generate QR Code</button>
                        <button wire:click="generateBarcode('PDF417')" type="button"  class="btn btn-primary btn-sm"> <i class="bi bi-upc-scan"></i> Generate PDF417</button>
                        {{-- <button wire:click="generateBarcode('DATAMATRIX')">Generate DataMatrix</button> --}}
                        @if($selectedProduct && $imagePath)
                            {{-- <img src="{{ asset('storage/'.$imagePath) }}" alt="Barcode"> --}}
                            @php
                                // $image = DNS2D::getBarcodePNG($selectedProduct->code_produit, 'QRCODE');
                                echo '<img src="data:image/png,' . DNS1D::getBarcodePNG('4', 'C39+') . '" alt="barcode"   />';
                            @endphp
                            {{-- <img src="data:image/png;base64,' . DNS1D::getBarcodePNG('4', 'C39+') . '" alt="barcode"   /> --}}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /add -->
</div>
@push('scripts')
    <script>
        window.addEventListener('codeBarreSelected', event => {
            document.querySelector('#hideCard').style.display = 'none';
        })
    </script>
@endpush
