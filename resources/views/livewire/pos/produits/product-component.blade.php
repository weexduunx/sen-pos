<div class="tabs_container">
    <div class="tab_content active" data-tab="{{ $activeCategoryId }}">
        <div class="row">
            @foreach ($products as $product)
                <div class="col-lg-3 col-sm-6 d-flex">
                    <!-- Affichez les détails du produit -->
                </div>
            @endforeach
        </div>
    </div>
</div>
{{-- <div class="tabs_container">
    <div class="tab_content active" data-tab="{{ $activeTab }}">
        <div class="row">
            @foreach ($products as $product)
                <div class="col-lg-3 col-sm-6 d-flex">
                    <!-- Affichez les détails du produit -->
                    <h1>{{$product->nomProduit}}</h1>
                </div>
            @endforeach
        </div>
    </div>
</div> --}}