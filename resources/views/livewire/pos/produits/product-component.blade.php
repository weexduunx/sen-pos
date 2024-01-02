<div class="tabs_container">
    <div class="tab_content active" data-tab="{{ $activeCategoryId }}">
        <div class="row">
            {{-- @if ($products)
                @foreach ($products as $product)
                    <div class="col-lg-3 col-sm-6 d-flex ">
                        <div class="productset flex-fill">
                            <div class="productsetimg">
                                <img src="{{ asset('storage/' . $product->image) }}" alt="img">
                                <h6>{{$product->quatite}}</h6>
                                <div class="check-product">
                                    <i class="fa fa-check"></i>
                                </div>
                            </div>
                            <div class="productsetcontent">
                                <h4>{{$product->nomProduit}}</h4>
                                <h6>{{$product->prixVente}} FCFA</h6>
                            </div>
                        </div>
                    </div>
                    <!-- Display product details here -->
                @endforeach
            @else
                <p>No products available for this category.</p>
            @endif --}}
            @if ($products && $products->count() > 0)
                @foreach ($products as $product)
                    <div class="col-lg-3 col-sm-6 d-flex ">
                        <div class="productset flex-fill">
                            <div class="productsetimg">
                                <img src="{{ asset('storage/' . $product->image) }}" alt="img">
                                <h6>{{ $product->quatite }}</h6>
                                <div class="check-product">
                                    <i class="fa fa-check"></i>
                                </div>
                            </div>
                            <div class="productsetcontent">
                                <h4>{{ $product->nomProduit }}</h4>
                                <h6>{{ $product->prixVente }} FCFA</h6>
                            </div>
                        </div>
                    </div>
                    <!-- Display product details here -->
                @endforeach
            @else
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Attention !!</strong>Il n'y a pas de produit pour cette catégorie
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

        </div>
    </div>
</div>
