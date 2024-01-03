<div class="col-lg-4 col-sm-12 ">
    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <div class="col-md-12 text-danger text-center">
                <strong style="font-size: 21px">Montant : 0 FCFA</strong>
            </div>
        </div>
    </div>
    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-nowrap mb-0">
                    <thead>
                        <tr>
                            <th>Produit</th>
                            <th>Prix</th>
                            <th>Quantité</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="align-middle">
                                
                                
                            </td>
                            <td class="align-middle">
                                1300
                            </td>
                            <td class="align-middle">
                                <div class="increment-decrement">
                                    <div class="input-groups">
                                        <input type="button" value="-"
                                            class="button-minus dec button">
                                        <input type="text" name="child" value="0"
                                            class="quantity-field">
                                        <input type="button" value="+"
                                            class="button-plus inc button ">
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle" >
                                <a class="confirm-text" href=""><img
                                    src="{{ asset('assets/img/icons/delete-2.svg') }}" alt="img"></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            {{-- <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr class="text-center">
                            <th class="align-middle">Produit</th>
                            <th class="align-middle">Prix</th>
                            <th class="align-middle">Quantité</th>
                            <th class="align-middle">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="align-middle">
                                THON SOFIA <br>
                                <span class="badge badge-success">
                                    7398560234380
                                </span>
                                <!-- Button trigger Discount Modal -->
                                <span
                                    wire:click="$emitSelf('discountModalRefresh', '6', '04abe7f5bc3a2013da899d59ba8fef2c')"
                                    role="button" class="badge badge-warning pointer-event" data-toggle="modal"
                                    data-target="#discountModal6">
                                    <i class="bi bi-pencil-square text-white"></i>
                                </span>
                                <!-- Discount Modal -->
                                <div wire:ignore.self="" class="modal fade" id="discountModal6" tabindex="-1"
                                    role="dialog" aria-labelledby="discountModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="discountModalLabel">
                                                    THON SOFIA
                                                    <br>
                                                    <span class="badge badge-success">
                                                        7398560234380
                                                    </span>
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <form
                                                wire:submit.prevent="setProductDiscount('04abe7f5bc3a2013da899d59ba8fef2c', '6')"
                                                method="POST">
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label>Type de remise <span class="text-danger">*</span></label>
                                                        <select wire:model="discount_type.6" class="form-control"
                                                            required="">
                                                            <option value="fixed">Fixé</option>
                                                            <option value="percentage">Pourcentage</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Discount <span class="text-danger">*</span></label>
                                                        <input wire:model.defer="item_discount.6" type="number"
                                                            class="form-control" value="0">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Fermer</button>
                                                    <button type="submit" class="btn btn-primary">Sauvegarder les
                                                        modifications</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>

                            <td class="align-middle">
                                1.100 FCFA
                            </td>

                            <td class="align-middle">
                                <div class="increment-decrement">
                                    <div class="input-groups">
                                        <input type="button" value="-" class="button-minus dec button">
                                        <input type="text" name="child" value="0" class="quantity-field">
                                        <input type="button" value="+" class="button-plus inc button ">
                                    </div>
                                </div>
                            </td>

                            <td class="align-middle text-center">
                                <a href="#" wire:click.prevent="removeItem('04abe7f5bc3a2013da899d59ba8fef2c')">
                                    <i class="bi bi-x-circle font-2xl text-danger"></i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div> --}}

            {{-- <ul class="product-lists">
                <li>
                    <div class="productimg">
                        <div class="productimgs">
                            <img src="{{ asset('assets/img/product/product30.jpg') }}"
                                alt="img">
                        </div>
                        <div class="productcontet">
                            <h4>Pineapple
                                <a href="javascript:void(0);" class="ms-2" data-bs-toggle="modal"
                                    data-bs-target="#edit"><img
                                        src="{{ asset('assets/img/icons/edit-5.svg') }}"
                                        alt="img"></a>
                            </h4>
                            <div class="productlinkset">
                                <h5>PT001</h5>
                            </div>
                            <div class="increment-decrement">
                                <div class="input-groups">
                                    <input type="button" value="-"
                                        class="button-minus dec button">
                                    <input type="text" name="child" value="0"
                                        class="quantity-field">
                                    <input type="button" value="+"
                                        class="button-plus inc button ">
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li>3000.00 </li>
                <li><a class="confirm-text" href="javascript:void(0);"><img
                            src="{{ asset('assets/img/icons/delete-2.svg') }}" alt="img"></a>
                </li>
            </ul>   --}}
            <div class="card-body pt-0 pb-2">
                {{-- <div class="setvaluecash">
                    <ul>
                        <li>
                            <a href="" class="paymentmethod">
                                <img src="{{ asset('assets/img/icons/cash.svg') }}" alt="img"
                                    class="me-2">
                                Cash
                            </a>
                        </li>
                        <li>
                            <a href="" class="paymentmethod">
                                <img src="{{ asset('assets/img/icons/debitcard.svg') }}" alt="img"
                                    class="me-2">
                                Debit
                            </a>
                        </li>
                        <li>
                            <a href="" class="paymentmethod">
                                <img src="{{ asset('assets/img/icons/scan.svg') }}" alt="img"
                                    class="me-2">
                                Scan
                            </a>
                        </li>
                    </ul>
                </div> --}}
            </div>
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
    {{-- <div class="card card-order">
        <div class="split-card">
        </div>
        <div class="card-body pt-0">
            <div class="totalitem">
                <h4>Total items : 4</h4>
                <a href="javascript:void(0);">Clear all</a>
            </div>
            <div class="product-table">
                <ul class="product-lists">
                    <li>
                        <div class="productimg">
                            <div class="productimgs">
                                <img src="{{ asset('assets/img/product/product30.jpg') }}"
                                    alt="img">
                            </div>
                            <div class="productcontet">
                                <h4>Pineapple
                                    <a href="javascript:void(0);" class="ms-2" data-bs-toggle="modal"
                                        data-bs-target="#edit"><img
                                            src="{{ asset('assets/img/icons/edit-5.svg') }}"
                                            alt="img"></a>
                                </h4>
                                <div class="productlinkset">
                                    <h5>PT001</h5>
                                </div>
                                <div class="increment-decrement">
                                    <div class="input-groups">
                                        <input type="button" value="-"
                                            class="button-minus dec button">
                                        <input type="text" name="child" value="0"
                                            class="quantity-field">
                                        <input type="button" value="+"
                                            class="button-plus inc button ">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>3000.00 </li>
                    <li><a class="confirm-text" href="javascript:void(0);"><img
                                src="{{ asset('assets/img/icons/delete-2.svg') }}" alt="img"></a>
                    </li>
                </ul>
                <ul class="product-lists">
                    <li>
                        <div class="productimg">
                            <div class="productimgs">
                                <img src="{{ asset('assets/img/product/product34.jpg') }}"
                                    alt="img">
                            </div>
                            <div class="productcontet">
                                <h4>Green Nike
                                    <a href="javascript:void(0);" class="ms-2" data-bs-toggle="modal"
                                        data-bs-target="#edit"><img
                                            src="{{ asset('assets/img/icons/edit-5.svg') }}"
                                            alt="img"></a>
                                </h4>
                                <div class="productlinkset">
                                    <h5>PT001</h5>
                                </div>
                                <div class="increment-decrement">
                                    <div class="input-groups">
                                        <input type="button" value="-"
                                            class="button-minus dec button">
                                        <input type="text" name="child" value="0"
                                            class="quantity-field">
                                        <input type="button" value="+"
                                            class="button-plus inc button ">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>3000.00 </li>
                    <li><a class="confirm-text" href="javascript:void(0);"><img
                                src="{{ asset('assets/img/icons/delete-2.svg') }}" alt="img"></a>
                    </li>
                </ul>
                <ul class="product-lists">
                    <li>
                        <div class="productimg">
                            <div class="productimgs">
                                <img src="{{ asset('assets/img/product/product35.jpg') }}"
                                    alt="img">
                            </div>
                            <div class="productcontet">
                                <h4>Banana
                                    <a href="javascript:void(0);" class="ms-2" data-bs-toggle="modal"
                                        data-bs-target="#edit"><img
                                            src="{{ asset('assets/img/icons/edit-5.svg') }}"
                                            alt="img"></a>
                                </h4>
                                <div class="productlinkset">
                                    <h5>PT001</h5>
                                </div>
                                <div class="increment-decrement">
                                    <div class="input-groups">
                                        <input type="button" value="-"
                                            class="button-minus dec button">
                                        <input type="text" name="child" value="0"
                                            class="quantity-field">
                                        <input type="button" value="+"
                                            class="button-plus inc button ">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>3000.00 </li>
                    <li><a class="confirm-text" href="javascript:void(0);"><img
                                src="{{ asset('assets/img/icons/delete-2.svg') }}" alt="img"></a>
                    </li>
                </ul>
                <ul class="product-lists">
                    <li>
                        <div class="productimg">
                            <div class="productimgs">
                                <img src="{{ asset('assets/img/product/product31.jpg') }}"
                                    alt="img">
                            </div>
                            <div class="productcontet">
                                <h4>Strawberry
                                    <a href="javascript:void(0);" class="ms-2" data-bs-toggle="modal"
                                        data-bs-target="#edit"><img
                                            src="{{ asset('assets/img/icons/edit-5.svg') }}"
                                            alt="img"></a>
                                </h4>
                                <div class="productlinkset">
                                    <h5>PT001</h5>
                                </div>
                                <div class="increment-decrement">
                                    <div class="input-groups">
                                        <input type="button" value="-"
                                            class="button-minus dec button">
                                        <input type="text" name="child" value="0"
                                            class="quantity-field">
                                        <input type="button" value="+"
                                            class="button-plus inc button ">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>3000.00 </li>
                    <li><a class="confirm-text" href="javascript:void(0);"><img
                                src="{{ asset('assets/img/icons/delete-2.svg') }}" alt="img"></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="split-card">
        </div>
        <div class="card-body pt-0 pb-2">
            <div class="setvalue">
                <ul>
                    <li>
                        <h5>Subtotal </h5>
                        <h6>55.00$</h6>
                    </li>
                    <li>
                        <h5>Tax </h5>
                        <h6>5.00$</h6>
                    </li>
                    <li class="total-value">
                        <h5>Total </h5>
                        <h6>60.00$</h6>
                    </li>
                </ul>
            </div>
            <div class="setvaluecash">
                <ul>
                    <li>
                        <a href="javascript:void(0);" class="paymentmethod">
                            <img src="{{ asset('assets/img/icons/cash.svg') }}" alt="img"
                                class="me-2">
                            Cash
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="paymentmethod">
                            <img src="{{ asset('assets/img/icons/debitcard.svg') }}" alt="img"
                                class="me-2">
                            Debit
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="paymentmethod">
                            <img src="{{ asset('assets/img/icons/scan.svg') }}" alt="img"
                                class="me-2">
                            Scan
                        </a>
                    </li>
                </ul>
            </div>
            <div class="btn-totallabel">
                <h5>Checkout</h5>
                <h6>60.00$</h6>
            </div>
            <div class="btn-pos">
                <ul>
                    <li>
                        <a class="btn"><img src="{{ asset('assets/img/icons/pause1.svg') }}"
                                alt="img" class="me-1">Hold</a>
                    </li>
                    <li>
                        <a class="btn"><img src="{{ asset('assets/img/icons/edit-6.svg') }}"
                                alt="img" class="me-1">Quotation</a>
                    </li>
                    <li>
                        <a class="btn"><img src="{{ asset('assets/img/icons/trash12.svg') }}"
                                alt="img" class="me-1">Void</a>
                    </li>
                    <li>
                        <a class="btn"><img src="{{ asset('assets/img/icons/wallet1.svg') }}"
                                alt="img" class="me-1">Payment</a>
                    </li>
                    <li>
                        <a class="btn" data-bs-toggle="modal" data-bs-target="#recents"><img
                                src="{{ asset('assets/img/icons/transcation.svg') }}" alt="img"
                                class="me-1">
                            Transaction</a>
                    </li>
                </ul>
            </div>
        </div>
    </div> --}}
</div>
