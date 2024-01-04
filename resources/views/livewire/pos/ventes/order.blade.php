<div class="col-lg-4 col-sm-12 ">
    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <div class="col-md-12 text-danger text-center">
                <strong style="font-size: 21px">Montant : {{ $total }} FCFA</strong>

            </div>
        </div>
    </div>
    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <div class="totalitem">
                <h4>Total Produits : {{ count($cart) }}</h4>
                {{-- <h4>Total Produits : 4</h4> --}}
                {{-- <a href="">Effacer Tout</a> --}}
                <a wire:click="clearCart">Effacer Tout</a>
            </div>
            <div class="table-responsive">
                <div class="product-table">
                    @if ($cart && count($cart) > 0)
                        @foreach ($cart as $item)
                            <ul class="product-lists">
                                <li>
                                    <div class="productimg">
                                        <div class="productimgs">
                                            <img src="{{ asset('storage/' . $item['image']) }}" alt="img">
                                        </div>
                                        <div class="productcontet">
                                            <h4>{{ $item['name'] }}</h4>
                                            <div class="productlinkset">
                                                <h5>{{ $item['codeBar'] }}</h5>
                                            </div>
                                            <div class="increment-decrement">
                                                <div class="input-groups">
                                                    <button wire:click="decrementQuantity({{ $item['id'] }})"
                                                        class="button-minus dec button">-</button>
                                                    <input type="text" name="child" value="{{ $item['quantity'] }}"
                                                        class="quantity-field">
                                                    <button wire:click="incrementQuantity({{ $item['id'] }})"
                                                        class="button-plus inc button">+</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>{{ $item['price'] }}</li>
                                <li><a wire:click="removeProduct({{ $item['id'] }})" class="confirm-text"
                                        href="javascript:void(0);"><img src="assets/img/icons/delete-2.svg"
                                            alt="img"></a></li>
                            </ul>
                        @endforeach
                    @else
                        {{-- <p>Aucun produit dans le panier pour le moment.</p> --}}
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Attention!</strong>Aucun produit dans le panier pour le moment.
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif
                </div>
            </div>
            <div class="card-body pt-0 pb-2 d-flex justify-content-center gap-3">
                <button type="button" class="btn btn-warning btn-lg">Annuler</button>
                <button type="button" class="btn btn-success btn-lg">Valider</button>
            </div>
        </div>
    </div>
    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <div class="btn-pos">
                <ul>
                    <li>
                        <a class="btn"><img src="{{ asset('assets/img/icons/pause1.svg') }}" alt="img"
                                class="me-1">Hold</a>
                    </li>
                    <li>
                        <a class="btn"><img src="{{ asset('assets/img/icons/edit-6.svg') }}" alt="img"
                                class="me-1">Quotation</a>
                    </li>
                    <li>
                        <a class="btn"><img src="{{ asset('assets/img/icons/trash12.svg') }}" alt="img"
                                class="me-1">Void</a>
                    </li>
                    <li>
                        <a class="btn"><img src="{{ asset('assets/img/icons/wallet1.svg') }}" alt="img"
                                class="me-1">Payment</a>
                    </li>
                    <li>
                        <a class="btn" data-bs-toggle="modal" data-bs-target="#recents"><img
                                src="{{ asset('assets/img/icons/transcation.svg') }}" alt="img" class="me-1">
                            Transaction</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
