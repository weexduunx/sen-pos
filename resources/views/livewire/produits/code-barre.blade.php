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
            <div class="form-group col-12 col-md-6 col-sm-12 col-xs-12 mb-1">
                <label>Product Name *</label>
                <div class="input-groupicon">
                    <input wire:model.debounce.50ms="search" type="text"
                        placeholder="{{ $selectedProduct ? $selectedProduct->nomProduit : 'Please type product code and select...' }}">
                    <div class="addonset">
                        <img src="{{ asset('assets/img/icons/search.svg') }}" alt="img">
                    </div>
                </div>
            </div>
            @if ($searchResults)
                <div class="card col-12 col-md-6 col-sm-12 col-xs-12" id="hideCard"
                    style="z-index: 2;left: 0;right: 0;border: 0;">
                    <div class="card-body shadow">
                        <div class="d-flex justify-content-center">
                            <div wire:loading wire:target="search" class="spinner-border"
                                style="color:#FF9F43 !important; " role="status">
                                <span class="sr-only">Chargement...</span>
                            </div>
                        </div>
                        <ul class="list-group list-group-flush" wire:loading.remove>
                            @foreach ($searchResults as $result)
                                <li class="list-group-item list-group-item-action">
                                    <a wire:click="selectProduct('{{ $result->id }}')" href="#">
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
                    <div class="table-top">
                        <div class="card-title">
                            Liste des Produits
                        </div>
                        <div class="wordset">
                            <ul>
                                <li>
                                    <button wire:click="generateBarcode('C39')" type="button"
                                        class="btn btn-primary btn-sm" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="Générer Code Barre" data-bs-original-title="Générer Code Barre"
                                        aria-label="Code Barre">
                                        <i class="bi bi-upc-scan"></i> Code Barre
                                    </button>
                                </li>
                                <li>
                                    <button wire:click="generateBarcode('QRCODE')" type="button"
                                        class="btn btn-secondary btn-sm" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Générer QR Code"
                                        data-bs-original-title="Générer QR Code" aria-label="QR Code">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-qr-code-scan" viewBox="0 0 16 16">
                                            <path
                                                d="M0 .5A.5.5 0 0 1 .5 0h3a.5.5 0 0 1 0 1H1v2.5a.5.5 0 0 1-1 0zm12 0a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0V1h-2.5a.5.5 0 0 1-.5-.5M.5 12a.5.5 0 0 1 .5.5V15h2.5a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5v-3a.5.5 0 0 1 .5-.5m15 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H15v-2.5a.5.5 0 0 1 .5-.5M4 4h1v1H4z" />
                                            <path d="M7 2H2v5h5zM3 3h3v3H3zm2 8H4v1h1z" />
                                            <path d="M7 9H2v5h5zm-4 1h3v3H3zm8-6h1v1h-1z" />
                                            <path
                                                d="M9 2h5v5H9zm1 1v3h3V3zM8 8v2h1v1H8v1h2v-2h1v2h1v-1h2v-1h-3V8zm2 2H9V9h1zm4 2h-1v1h-2v1h3zm-4 2v-1H8v1z" />
                                            <path d="M12 9h2V8h-2z" />
                                        </svg>
                                        QR Code
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-9 col-sm-12 col-xs-12">
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
                                                    <a class="delete-set">
                                                        <img src="{{ asset('assets/img/icons/delete.svg') }}"
                                                            alt="img"></a>
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
                                </table>

                            </div>
                        </div>
                        <div class="col-12 col-md-3 col-sm-12 col-xs-12">
                            <div class="card flex-fill bg-white">
                                @if ($selectedProduct && $imagePath)
                                    <h5 class="text-center">{{ $selectedProduct->nomProduit }}</h5>
                                    <img src="data:image/png;base64,{{ $imagePath }}" alt="Barcode"
                                        class="card-img-top">
                                    <h5 class="text-center">{{ $selectedProduct->code_produit }}</h5>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mt-1">
                <div class="card-body shadow">
                    <div class="table-top">
                        <div class="card-title">
                            Liste des Codes Barres ou QR Codes Générés
                        </div>
                        <div class="wordset">
                            <ul>
                                <li>
                                    <button class="btn btn-primary btn-sm" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="imprimer" data-bs-original-title="imprimer"
                                        aria-label="imprimer" onclick="imprimerCodesBarres()">
                                        <i class="bi bi-printer"></i>
                                        Imprimer
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <hr>
                    <div  class="row">
                        @if ($selectedProduct && !empty($imagePath))
                            @for ($i = 0; $i < $selectedProduct->quatite; $i++)
                                <div class="col-md-4 mb-4" id="codesBarresContainer{{ $i }}">
                                    <div class="card flex-fill bg-white">
                                        <img alt="Code-barre" src="data:image/png;base64,{{ $imagePath }}"
                                            class="card-img-top">
                                    </div>
                                </div>
                            @endfor
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /add -->
    @php
        $quantityToPrint = $selectedProduct ? $selectedProduct->quatite : 0;
    @endphp
</div>
@push('scripts')
    <script>
        window.addEventListener('codeBarreSelected', event => {
            document.querySelector('#hideCard').style.display = 'none';
        })
        function imprimerCodesBarres() {
        // Ouvrir une nouvelle fenêtre pour l'impression
        var printWindow = window.open('', '_blank');

        // Construire le contenu HTML à imprimer
        @if ($selectedProduct)
            @for ($i = 0; $i < $selectedProduct->quatite; $i++)
                var container{{ $i }} = document.getElementById('codesBarresContainer{{ $i }}');
                var htmlContent{{ $i }} = container{{ $i }} ? container{{ $i }}.innerHTML : '';
            @endfor
        @endif

        // Remplacer le contenu de la nouvelle fenêtre par le contenu HTML
        printWindow.document.write('<html><head><title>Impression des Codes Barres</title></head><body>');
        @if ($selectedProduct)
            @for ($i = 0; $i < $selectedProduct->quatite; $i++)
                printWindow.document.write(htmlContent{{ $i }});
            @endfor
        @endif
        printWindow.document.write('</body></html>');

        // Imprimer le contenu
        printWindow.print();
        }
    </script>
@endpush
