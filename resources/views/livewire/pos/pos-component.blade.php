<div>
    <div class="content">
        <div class="row">
            <div class="col-lg-8 col-sm-12 tabs_wrapper">
                {{-- <div class="page-header ">
                    <div class="page-title">
                        <h4>Categories</h4>
                        <h6>Manage your purchases</h6>
                    </div>

                </div> --}}

                <div class="row">
                    <div class="col-md-3 col-sm-12">
                        @if ($hasCaisse)
                            <a href="javascript:void(0);" class="btn btn-warning btn-adds" data-bs-toggle="modal" data-bs-target="#CloseCaisse">
                                <i class="fa fa-times-circle me-2"></i> <!-- Icône de fermeture -->
                                Fermer Caisse
                            </a>
            
                            {{-- <a href="javascript:void(0);" class="btn btn-adds" data-bs-toggle="modal"
                            data-bs-target="#CloseCaisse"><i class="fa fa-plus-circle me-2"></i>
                            Fermer Caisse</a> --}}
                        @else
                        <!-- Display "Ouvrir Caisse" button if hasCaisse is false -->
                            <a href="javascript:void(0);" class="btn btn-adds" data-bs-toggle="modal"
                            data-bs-target="#OpenCaisse"><i class="fa fa-plus-circle me-2"></i>
                            Ouvrir caisse</a>
                        @endif
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <div class="dash-widget dash2">
                            <div class="dash-widgetimg">
                                <span><img src="{{ asset('assets/img/icons/dash3.svg') }}" alt="img"></span>
                            </div>
                            <div class="dash-widgetcontent">
                                <h5>50</h5>
                                <h6>Ventes</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <div class="dash-widget dash2">
                            <div class="dash-widgetimg">
                                <span><img src="{{ asset('assets/img/icons/dash2.svg') }}" alt="img"></span>
                            </div>
                            <div class="dash-widgetcontent">
                                <h5>40000</h5>
                                <h6></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <div class="dash-widget dash2">
                            <div class="dash-widgetimg">
                                <span><img src="{{ asset('assets/img/icons/dash1.svg') }}" alt="img"></span>
                            </div>
                            <div class="dash-widgetcontent">
                                <h5>40000</h5>
                                <h6>Montant Ventes</h6>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Liviwirere  Categories--}}
                @livewire('pos.categories.categories')
                {{-- Liviwirere  Produits--}}
                <livewire:pos.produits.product-component  />
                {{-- @livewire('pos.produits.product-component') --}}
            </div>
            {{-- Liviwirere  Order--}}
            @livewire('pos.ventes.order')
        </div>
    </div>
       <!-- Modal Calculator-->
    <div class="modal fade" id="calculator" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Define Quantity</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="calculator-set">
                        <div class="calculatortotal">
                            <h4>0</h4>
                        </div>
                        <ul>
                            <li>
                                <a href="javascript:void(0);">1</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">2</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">3</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">4</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">5</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">6</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">7</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">8</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">9</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="btn btn-closes"><img
                                        src="assets/img/icons/close-circle.svg" alt="img"></a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">0</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="btn btn-reverse"><img
                                        src="assets/img/icons/reverse.svg" alt="img"></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div  wire:ignore.self class="modal fade" id="OpenCaisse" tabindex="-1" aria-labelledby="create" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ouverture de Caisse</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Montant d'ouverture</label>
                                <input wire:model="montantOuverture" type="number" class="form-control">
                                @error('montantOuverture')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <a wire:click="ouvrirCaisse" class="btn btn-submit me-2">Submit</a>
                            {{-- <button wire:click="ouvrirCaisse()" class="btn btn-submit me-2" type="button">Submit</button> --}}
                            <a class="btn btn-cancel" data-bs-dismiss="modal">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div wire:ignore.self class="modal fade" id="CloseCaisse" tabindex="-1" aria-labelledby="create" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Fermeture Caisse</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Montant Fermeture</label>
                                <input wire:model="montantFermeture" type="number" class="form-control">
                                @error('montantFermeture')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <a wire:click="fermerCaisse" class="btn btn-submit me-2">Submit</a>
                            {{-- <button wire:click="ouvrirCaisse()" class="btn btn-submit me-2" type="button">Submit</button> --}}
                            <a class="btn btn-cancel" data-bs-dismiss="modal">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Modal-->
    <!-- Modal holdsales -->
    <div class="modal fade" id="holdsales" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hold order</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="hold-order">
                        <h2>4500.00</h2>
                    </div>
                    <div class="form-group">
                        <label>Order Reference</label>
                        <input type="text">
                    </div>
                    <div class="para-set">
                        <p>The current order will be set on hold. You can retreive this order from the pending order
                            button. Providing a reference to it might help you to identify the order more quickly.</p>
                    </div>
                    <div class="col-lg-12">
                        <a class="btn btn-submit me-2">Submit</a>
                        <a class="btn btn-cancel" data-bs-dismiss="modal">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Modal holdsales -->
    <!-- Modal Edit -->
    <div class="modal fade" id="edit" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Order</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Product Price</label>
                                <input type="text" value="20">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Product Price</label>
                                <select class="select select2-hidden-accessible" data-select2-id="7" tabindex="-1"
                                    aria-hidden="true">
                                    <option data-select2-id="9">Exclusive</option>
                                    <option>Inclusive</option>
                                </select><span class="select2 select2-container select2-container--default"
                                    dir="ltr" data-select2-id="8" style="width: 100%;"><span
                                        class="selection"><span class="select2-selection select2-selection--single"
                                            role="combobox" aria-haspopup="true" aria-expanded="false"
                                            tabindex="0" aria-disabled="false"
                                            aria-labelledby="select2-6szj-container"><span
                                                class="select2-selection__rendered" id="select2-6szj-container"
                                                role="textbox" aria-readonly="true"
                                                title="Exclusive">Exclusive</span><span
                                                class="select2-selection__arrow" role="presentation"><b
                                                    role="presentation"></b></span></span></span><span
                                        class="dropdown-wrapper" aria-hidden="true"></span></span>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label> Tax</label>
                                <div class="input-group">
                                    <input type="text">
                                    <a class="scanner-set input-group-text">
                                        %
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Discount Type</label>
                                <select class="select select2-hidden-accessible" data-select2-id="10" tabindex="-1"
                                    aria-hidden="true">
                                    <option data-select2-id="12">Fixed</option>
                                    <option>Percentage</option>
                                </select><span class="select2 select2-container select2-container--default"
                                    dir="ltr" data-select2-id="11" style="width: 100%;"><span
                                        class="selection"><span class="select2-selection select2-selection--single"
                                            role="combobox" aria-haspopup="true" aria-expanded="false"
                                            tabindex="0" aria-disabled="false"
                                            aria-labelledby="select2-7jhj-container"><span
                                                class="select2-selection__rendered" id="select2-7jhj-container"
                                                role="textbox" aria-readonly="true" title="Fixed">Fixed</span><span
                                                class="select2-selection__arrow" role="presentation"><b
                                                    role="presentation"></b></span></span></span><span
                                        class="dropdown-wrapper" aria-hidden="true"></span></span>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Discount</label>
                                <input type="text" value="20">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Sales Unit</label>
                                <select class="select select2-hidden-accessible" data-select2-id="13" tabindex="-1"
                                    aria-hidden="true">
                                    <option data-select2-id="15">Kilogram</option>
                                    <option>Grams</option>
                                </select><span class="select2 select2-container select2-container--default"
                                    dir="ltr" data-select2-id="14" style="width: 100%;"><span
                                        class="selection"><span class="select2-selection select2-selection--single"
                                            role="combobox" aria-haspopup="true" aria-expanded="false"
                                            tabindex="0" aria-disabled="false"
                                            aria-labelledby="select2-7wqp-container"><span
                                                class="select2-selection__rendered" id="select2-7wqp-container"
                                                role="textbox" aria-readonly="true"
                                                title="Kilogram">Kilogram</span><span class="select2-selection__arrow"
                                                role="presentation"><b
                                                    role="presentation"></b></span></span></span><span
                                        class="dropdown-wrapper" aria-hidden="true"></span></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <a class="btn btn-submit me-2">Submit</a>
                        <a class="btn btn-cancel" data-bs-dismiss="modal">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Modal Edit -->
    <!-- Modal Create -->
    <div class="modal fade" id="create" tabindex="-1" aria-labelledby="create" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Customer Name</label>
                                <input type="text">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Country</label>
                                <input type="text">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>City</label>
                                <input type="text">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <a class="btn btn-submit me-2">Submit</a>
                        <a class="btn btn-cancel" data-bs-dismiss="modal">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Modal create -->
    <!-- Modal Delete -->
    <div class="modal fade" id="delete" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Order Deletion</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="delete-order">
                        <img src="assets/img/icons/close-circle1.svg" alt="img">
                    </div>
                    <div class="para-set text-center">
                        <p>The current order will be deleted as no payment has been <br> made so far.</p>
                    </div>
                    <div class="col-lg-12 text-center">
                        <a class="btn btn-danger me-2">Yes</a>
                        <a class="btn btn-cancel" data-bs-dismiss="modal">No</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Modal delete -->
    <!-- Modal recents -->
    <div class="modal fade" id="recents" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Recent Transactions</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="tabs-sets">
                        <ul class="nav nav-tabs" id="myTabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="purchase-tab" data-bs-toggle="tab"
                                    data-bs-target="#purchase" type="button" aria-controls="purchase"
                                    aria-selected="true" role="tab">Purchase</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="payment-tab" data-bs-toggle="tab"
                                    data-bs-target="#payment" type="button" aria-controls="payment"
                                    aria-selected="false" role="tab">Payment</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="return-tab" data-bs-toggle="tab"
                                    data-bs-target="#return" type="button" aria-controls="return"
                                    aria-selected="false" role="tab">Return</button>
                            </li>
                        </ul>
                        {{-- <div class="tab-content">
                            <div class="tab-pane fade show active" id="purchase" role="tabpanel"
                                aria-labelledby="purchase-tab">
                                <div class="table-top">
                                    <div class="search-set">
                                        <div class="search-input">
                                            <a class="btn btn-searchset"><img src="assets/img/icons/search-white.svg"
                                                    alt="img"></a>
                                            <div id="DataTables_Table_0_filter" class="dataTables_filter"><label>
                                                    <input type="search" class="form-control form-control-sm"
                                                        placeholder="Search..."
                                                        aria-controls="DataTables_Table_0"></label></div>
                                            <div id="DataTables_Table_0_filter" class="dataTables_filter"><label>
                                                    <input type="search" class="form-control form-control-sm"
                                                        placeholder="Search..."
                                                        aria-controls="DataTables_Table_0"></label></div>
                                            <div id="DataTables_Table_1_filter" class="dataTables_filter"><label>
                                                    <input type="search" class="form-control form-control-sm"
                                                        placeholder="Search..."
                                                        aria-controls="DataTables_Table_1"></label></div>
                                            <div id="DataTables_Table_0_filter" class="dataTables_filter"><label>
                                                    <input type="search" class="form-control form-control-sm"
                                                        placeholder="Search..."
                                                        aria-controls="DataTables_Table_0"></label></div>
                                            <div id="DataTables_Table_0_filter" class="dataTables_filter"><label>
                                                    <input type="search" class="form-control form-control-sm"
                                                        placeholder="Search..."
                                                        aria-controls="DataTables_Table_0"></label></div>
                                            <div id="DataTables_Table_0_filter" class="dataTables_filter"><label>
                                                    <input type="search" class="form-control form-control-sm"
                                                        placeholder="Search..."
                                                        aria-controls="DataTables_Table_0"></label></div>
                                            <div id="DataTables_Table_1_filter" class="dataTables_filter"><label>
                                                    <input type="search" class="form-control form-control-sm"
                                                        placeholder="Search..."
                                                        aria-controls="DataTables_Table_1"></label></div>
                                            <div id="DataTables_Table_0_filter" class="dataTables_filter"><label>
                                                    <input type="search" class="form-control form-control-sm"
                                                        placeholder="Search..."
                                                        aria-controls="DataTables_Table_0"></label></div>
                                            <div id="DataTables_Table_0_filter" class="dataTables_filter"><label>
                                                    <input type="search" class="form-control form-control-sm"
                                                        placeholder="Search..."
                                                        aria-controls="DataTables_Table_0"></label></div>
                                            <div id="DataTables_Table_0_filter" class="dataTables_filter"><label>
                                                    <input type="search" class="form-control form-control-sm"
                                                        placeholder="Search..."
                                                        aria-controls="DataTables_Table_0"></label></div>
                                            <div id="DataTables_Table_1_filter" class="dataTables_filter"><label>
                                                    <input type="search" class="form-control form-control-sm"
                                                        placeholder="Search..."
                                                        aria-controls="DataTables_Table_1"></label></div>
                                            <div id="DataTables_Table_0_filter" class="dataTables_filter"><label>
                                                    <input type="search" class="form-control form-control-sm"
                                                        placeholder="Search..."
                                                        aria-controls="DataTables_Table_0"></label></div>
                                            <div id="DataTables_Table_2_filter" class="dataTables_filter"><label>
                                                    <input type="search" class="form-control form-control-sm"
                                                        placeholder="Search..."
                                                        aria-controls="DataTables_Table_2"></label></div>
                                        </div>
                                    </div>
                                    <div class="wordset">
                                        <ul>
                                            <li>
                                                <a data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                                    data-bs-original-title="pdf" aria-label="pdf"><img
                                                        src="assets/img/icons/pdf.svg" alt="img"></a>
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
                                    <div id="DataTables_Table_0_wrapper"
                                        class="dataTables_wrapper dt-bootstrap4 no-footer">
                                        <table class="table datanew dataTable no-footer" id="DataTables_Table_0"
                                            role="grid" aria-describedby="DataTables_Table_0_info">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting_asc" tabindex="0"
                                                        aria-controls="DataTables_Table_0" rowspan="1"
                                                        colspan="1" aria-sort="ascending"
                                                        aria-label="Date: activate to sort column descending"
                                                        style="width: 0px;">Date</th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="DataTables_Table_0" rowspan="1"
                                                        colspan="1"
                                                        aria-label="Reference: activate to sort column ascending"
                                                        style="width: 0px;">Reference</th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="DataTables_Table_0" rowspan="1"
                                                        colspan="1"
                                                        aria-label="Customer: activate to sort column ascending"
                                                        style="width: 0px;">Customer</th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="DataTables_Table_0" rowspan="1"
                                                        colspan="1"
                                                        aria-label="Amount	: activate to sort column ascending"
                                                        style="width: 0px;">Amount </th>
                                                    <th class="text-end sorting" tabindex="0"
                                                        aria-controls="DataTables_Table_0" rowspan="1"
                                                        colspan="1"
                                                        aria-label="Action: activate to sort column ascending"
                                                        style="width: 0px;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <tr class="odd">
                                                    <td class="sorting_1">2022-03-07 </td>
                                                    <td>INV/SL0101</td>
                                                    <td>Walk-in Customer</td>
                                                    <td>$ 1500.00</td>
                                                    <td>
                                                        <a class="me-3" href="javascript:void(0);">
                                                            <img src="assets/img/icons/eye.svg" alt="img">
                                                        </a>
                                                        <a class="me-3" href="javascript:void(0);">
                                                            <img src="assets/img/icons/edit.svg" alt="img">
                                                        </a>
                                                        <a class="me-3 confirm-text" href="javascript:void(0);">
                                                            <img src="assets/img/icons/delete.svg" alt="img">
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr class="even">
                                                    <td class="sorting_1">2022-03-07 </td>
                                                    <td>INV/SL0101</td>
                                                    <td>Walk-in Customer</td>
                                                    <td>$ 1500.00</td>
                                                    <td>
                                                        <a class="me-3" href="javascript:void(0);">
                                                            <img src="assets/img/icons/eye.svg" alt="img">
                                                        </a>
                                                        <a class="me-3" href="javascript:void(0);">
                                                            <img src="assets/img/icons/edit.svg" alt="img">
                                                        </a>
                                                        <a class="me-3 confirm-text" href="javascript:void(0);">
                                                            <img src="assets/img/icons/delete.svg" alt="img">
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr class="odd">
                                                    <td class="sorting_1">2022-03-07 </td>
                                                    <td>INV/SL0101</td>
                                                    <td>Walk-in Customer</td>
                                                    <td>$ 1500.00</td>
                                                    <td>
                                                        <a class="me-3" href="javascript:void(0);">
                                                            <img src="assets/img/icons/eye.svg" alt="img">
                                                        </a>
                                                        <a class="me-3" href="javascript:void(0);">
                                                            <img src="assets/img/icons/edit.svg" alt="img">
                                                        </a>
                                                        <a class="me-3 confirm-text" href="javascript:void(0);">
                                                            <img src="assets/img/icons/delete.svg" alt="img">
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr class="even">
                                                    <td class="sorting_1">2022-03-07 </td>
                                                    <td>INV/SL0101</td>
                                                    <td>Walk-in Customer</td>
                                                    <td>$ 1500.00</td>
                                                    <td>
                                                        <a class="me-3" href="javascript:void(0);">
                                                            <img src="assets/img/icons/eye.svg" alt="img">
                                                        </a>
                                                        <a class="me-3" href="javascript:void(0);">
                                                            <img src="assets/img/icons/edit.svg" alt="img">
                                                        </a>
                                                        <a class="me-3 confirm-text" href="javascript:void(0);">
                                                            <img src="assets/img/icons/delete.svg" alt="img">
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr class="odd">
                                                    <td class="sorting_1">2022-03-07 </td>
                                                    <td>INV/SL0101</td>
                                                    <td>Walk-in Customer</td>
                                                    <td>$ 1500.00</td>
                                                    <td>
                                                        <a class="me-3" href="javascript:void(0);">
                                                            <img src="assets/img/icons/eye.svg" alt="img">
                                                        </a>
                                                        <a class="me-3" href="javascript:void(0);">
                                                            <img src="assets/img/icons/edit.svg" alt="img">
                                                        </a>
                                                        <a class="me-3 confirm-text" href="javascript:void(0);">
                                                            <img src="assets/img/icons/delete.svg" alt="img">
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr class="even">
                                                    <td class="sorting_1">2022-03-07 </td>
                                                    <td>INV/SL0101</td>
                                                    <td>Walk-in Customer</td>
                                                    <td>$ 1500.00</td>
                                                    <td>
                                                        <a class="me-3" href="javascript:void(0);">
                                                            <img src="assets/img/icons/eye.svg" alt="img">
                                                        </a>
                                                        <a class="me-3" href="javascript:void(0);">
                                                            <img src="assets/img/icons/edit.svg" alt="img">
                                                        </a>
                                                        <a class="me-3 confirm-text" href="javascript:void(0);">
                                                            <img src="assets/img/icons/delete.svg" alt="img">
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr class="odd">
                                                    <td class="sorting_1">2022-03-07 </td>
                                                    <td>INV/SL0101</td>
                                                    <td>Walk-in Customer</td>
                                                    <td>$ 1500.00</td>
                                                    <td>
                                                        <a class="me-3" href="javascript:void(0);">
                                                            <img src="assets/img/icons/eye.svg" alt="img">
                                                        </a>
                                                        <a class="me-3" href="javascript:void(0);">
                                                            <img src="assets/img/icons/edit.svg" alt="img">
                                                        </a>
                                                        <a class="me-3 confirm-text" href="javascript:void(0);">
                                                            <img src="assets/img/icons/delete.svg" alt="img">
                                                        </a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="dataTables_length" id="DataTables_Table_0_length"><label><select
                                                    name="DataTables_Table_0_length"
                                                    aria-controls="DataTables_Table_0"
                                                    class="custom-select custom-select-sm form-control form-control-sm">
                                                    <option value="10">10</option>
                                                    <option value="25">25</option>
                                                    <option value="50">50</option>
                                                    <option value="100">100</option>
                                                </select></label></div>
                                        <div class="dataTables_paginate paging_numbers"
                                            id="DataTables_Table_0_paginate">
                                            <ul class="pagination">
                                                <li class="paginate_button page-item active"><a href="#"
                                                        aria-controls="DataTables_Table_0" data-dt-idx="0"
                                                        tabindex="0" class="page-link">1</a></li>
                                            </ul>
                                        </div>
                                        <div class="dataTables_info" id="DataTables_Table_0_info" role="status"
                                            aria-live="polite">1 - 7 of 7 items</div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="payment" role="tabpanel">
                                <div class="table-top">
                                    <div class="search-set">
                                        <div class="search-input">
                                            <a class="btn btn-searchset"><img src="assets/img/icons/search-white.svg"
                                                    alt="img"></a>
                                            <div id="DataTables_Table_0_filter" class="dataTables_filter"><label>
                                                    <input type="search" class="form-control form-control-sm"
                                                        placeholder="Search..."
                                                        aria-controls="DataTables_Table_0"></label></div>
                                            <div id="DataTables_Table_0_filter" class="dataTables_filter"><label>
                                                    <input type="search" class="form-control form-control-sm"
                                                        placeholder="Search..."
                                                        aria-controls="DataTables_Table_0"></label></div>
                                            <div id="DataTables_Table_1_filter" class="dataTables_filter"><label>
                                                    <input type="search" class="form-control form-control-sm"
                                                        placeholder="Search..."
                                                        aria-controls="DataTables_Table_1"></label></div>
                                            <div id="DataTables_Table_0_filter" class="dataTables_filter"><label>
                                                    <input type="search" class="form-control form-control-sm"
                                                        placeholder="Search..."
                                                        aria-controls="DataTables_Table_0"></label></div>
                                            <div id="DataTables_Table_0_filter" class="dataTables_filter"><label>
                                                    <input type="search" class="form-control form-control-sm"
                                                        placeholder="Search..."
                                                        aria-controls="DataTables_Table_0"></label></div>
                                            <div id="DataTables_Table_0_filter" class="dataTables_filter"><label>
                                                    <input type="search" class="form-control form-control-sm"
                                                        placeholder="Search..."
                                                        aria-controls="DataTables_Table_0"></label></div>
                                            <div id="DataTables_Table_1_filter" class="dataTables_filter"><label>
                                                    <input type="search" class="form-control form-control-sm"
                                                        placeholder="Search..."
                                                        aria-controls="DataTables_Table_1"></label></div>
                                            <div id="DataTables_Table_0_filter" class="dataTables_filter"><label>
                                                    <input type="search" class="form-control form-control-sm"
                                                        placeholder="Search..."
                                                        aria-controls="DataTables_Table_0"></label></div>
                                            <div id="DataTables_Table_0_filter" class="dataTables_filter"><label>
                                                    <input type="search" class="form-control form-control-sm"
                                                        placeholder="Search..."
                                                        aria-controls="DataTables_Table_0"></label></div>
                                            <div id="DataTables_Table_0_filter" class="dataTables_filter"><label>
                                                    <input type="search" class="form-control form-control-sm"
                                                        placeholder="Search..."
                                                        aria-controls="DataTables_Table_0"></label></div>
                                            <div id="DataTables_Table_1_filter" class="dataTables_filter"><label>
                                                    <input type="search" class="form-control form-control-sm"
                                                        placeholder="Search..."
                                                        aria-controls="DataTables_Table_1"></label></div>
                                            <div id="DataTables_Table_0_filter" class="dataTables_filter"><label>
                                                    <input type="search" class="form-control form-control-sm"
                                                        placeholder="Search..."
                                                        aria-controls="DataTables_Table_0"></label></div>
                                            <div id="DataTables_Table_2_filter" class="dataTables_filter"><label>
                                                    <input type="search" class="form-control form-control-sm"
                                                        placeholder="Search..."
                                                        aria-controls="DataTables_Table_2"></label></div>
                                        </div>
                                    </div>
                                    <div class="wordset">
                                        <ul>
                                            <li>
                                                <a data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                                    data-bs-original-title="pdf" aria-label="pdf"><img
                                                        src="assets/img/icons/pdf.svg" alt="img"></a>
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
                                    <div id="DataTables_Table_1_wrapper"
                                        class="dataTables_wrapper dt-bootstrap4 no-footer">
                                        <table class="table datanew dataTable no-footer" id="DataTables_Table_1"
                                            role="grid" aria-describedby="DataTables_Table_1_info">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting_asc" tabindex="0"
                                                        aria-controls="DataTables_Table_1" rowspan="1"
                                                        colspan="1" aria-sort="ascending"
                                                        aria-label="Date: activate to sort column descending"
                                                        style="width: 0px;">Date</th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="DataTables_Table_1" rowspan="1"
                                                        colspan="1"
                                                        aria-label="Reference: activate to sort column ascending"
                                                        style="width: 0px;">Reference</th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="DataTables_Table_1" rowspan="1"
                                                        colspan="1"
                                                        aria-label="Customer: activate to sort column ascending"
                                                        style="width: 0px;">Customer</th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="DataTables_Table_1" rowspan="1"
                                                        colspan="1"
                                                        aria-label="Amount	: activate to sort column ascending"
                                                        style="width: 0px;">Amount </th>
                                                    <th class="text-end sorting" tabindex="0"
                                                        aria-controls="DataTables_Table_1" rowspan="1"
                                                        colspan="1"
                                                        aria-label="Action: activate to sort column ascending"
                                                        style="width: 0px;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <tr class="odd">
                                                    <td class="sorting_1">2022-03-07 </td>
                                                    <td>0101</td>
                                                    <td>Walk-in Customer</td>
                                                    <td>$ 1500.00</td>
                                                    <td>
                                                        <a class="me-3" href="javascript:void(0);">
                                                            <img src="assets/img/icons/eye.svg" alt="img">
                                                        </a>
                                                        <a class="me-3" href="javascript:void(0);">
                                                            <img src="assets/img/icons/edit.svg" alt="img">
                                                        </a>
                                                        <a class="me-3 confirm-text" href="javascript:void(0);">
                                                            <img src="assets/img/icons/delete.svg" alt="img">
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr class="even">
                                                    <td class="sorting_1">2022-03-07 </td>
                                                    <td>0102</td>
                                                    <td>Walk-in Customer</td>
                                                    <td>$ 1500.00</td>
                                                    <td>
                                                        <a class="me-3" href="javascript:void(0);">
                                                            <img src="assets/img/icons/eye.svg" alt="img">
                                                        </a>
                                                        <a class="me-3" href="javascript:void(0);">
                                                            <img src="assets/img/icons/edit.svg" alt="img">
                                                        </a>
                                                        <a class="me-3 confirm-text" href="javascript:void(0);">
                                                            <img src="assets/img/icons/delete.svg" alt="img">
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr class="odd">
                                                    <td class="sorting_1">2022-03-07 </td>
                                                    <td>0103</td>
                                                    <td>Walk-in Customer</td>
                                                    <td>$ 1500.00</td>
                                                    <td>
                                                        <a class="me-3" href="javascript:void(0);">
                                                            <img src="assets/img/icons/eye.svg" alt="img">
                                                        </a>
                                                        <a class="me-3" href="javascript:void(0);">
                                                            <img src="assets/img/icons/edit.svg" alt="img">
                                                        </a>
                                                        <a class="me-3 confirm-text" href="javascript:void(0);">
                                                            <img src="assets/img/icons/delete.svg" alt="img">
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr class="even">
                                                    <td class="sorting_1">2022-03-07 </td>
                                                    <td>0104</td>
                                                    <td>Walk-in Customer</td>
                                                    <td>$ 1500.00</td>
                                                    <td>
                                                        <a class="me-3" href="javascript:void(0);">
                                                            <img src="assets/img/icons/eye.svg" alt="img">
                                                        </a>
                                                        <a class="me-3" href="javascript:void(0);">
                                                            <img src="assets/img/icons/edit.svg" alt="img">
                                                        </a>
                                                        <a class="me-3 confirm-text" href="javascript:void(0);">
                                                            <img src="assets/img/icons/delete.svg" alt="img">
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr class="odd">
                                                    <td class="sorting_1">2022-03-07 </td>
                                                    <td>0105</td>
                                                    <td>Walk-in Customer</td>
                                                    <td>$ 1500.00</td>
                                                    <td>
                                                        <a class="me-3" href="javascript:void(0);">
                                                            <img src="assets/img/icons/eye.svg" alt="img">
                                                        </a>
                                                        <a class="me-3" href="javascript:void(0);">
                                                            <img src="assets/img/icons/edit.svg" alt="img">
                                                        </a>
                                                        <a class="me-3 confirm-text" href="javascript:void(0);">
                                                            <img src="assets/img/icons/delete.svg" alt="img">
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr class="even">
                                                    <td class="sorting_1">2022-03-07 </td>
                                                    <td>0106</td>
                                                    <td>Walk-in Customer</td>
                                                    <td>$ 1500.00</td>
                                                    <td>
                                                        <a class="me-3" href="javascript:void(0);">
                                                            <img src="assets/img/icons/eye.svg" alt="img">
                                                        </a>
                                                        <a class="me-3" href="javascript:void(0);">
                                                            <img src="assets/img/icons/edit.svg" alt="img">
                                                        </a>
                                                        <a class="me-3 confirm-text" href="javascript:void(0);">
                                                            <img src="assets/img/icons/delete.svg" alt="img">
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr class="odd">
                                                    <td class="sorting_1">2022-03-07 </td>
                                                    <td>0107</td>
                                                    <td>Walk-in Customer</td>
                                                    <td>$ 1500.00</td>
                                                    <td>
                                                        <a class="me-3" href="javascript:void(0);">
                                                            <img src="assets/img/icons/eye.svg" alt="img">
                                                        </a>
                                                        <a class="me-3" href="javascript:void(0);">
                                                            <img src="assets/img/icons/edit.svg" alt="img">
                                                        </a>
                                                        <a class="me-3 confirm-text" href="javascript:void(0);">
                                                            <img src="assets/img/icons/delete.svg" alt="img">
                                                        </a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="dataTables_length" id="DataTables_Table_1_length"><label><select
                                                    name="DataTables_Table_1_length"
                                                    aria-controls="DataTables_Table_1"
                                                    class="custom-select custom-select-sm form-control form-control-sm">
                                                    <option value="10">10</option>
                                                    <option value="25">25</option>
                                                    <option value="50">50</option>
                                                    <option value="100">100</option>
                                                </select></label></div>
                                        <div class="dataTables_paginate paging_numbers"
                                            id="DataTables_Table_1_paginate">
                                            <ul class="pagination">
                                                <li class="paginate_button page-item active"><a href="#"
                                                        aria-controls="DataTables_Table_1" data-dt-idx="0"
                                                        tabindex="0" class="page-link">1</a></li>
                                            </ul>
                                        </div>
                                        <div class="dataTables_info" id="DataTables_Table_1_info" role="status"
                                            aria-live="polite">1 - 7 of 7 items</div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="return" role="tabpanel">
                                <div class="table-top">
                                    <div class="search-set">
                                        <div class="search-input">
                                            <a class="btn btn-searchset"><img
                                                    src="assets/img/icons/search-white.svg" alt="img"></a>
                                            <div id="DataTables_Table_0_filter" class="dataTables_filter"><label>
                                                    <input type="search" class="form-control form-control-sm"
                                                        placeholder="Search..."
                                                        aria-controls="DataTables_Table_0"></label></div>
                                            <div id="DataTables_Table_0_filter" class="dataTables_filter"><label>
                                                    <input type="search" class="form-control form-control-sm"
                                                        placeholder="Search..."
                                                        aria-controls="DataTables_Table_0"></label></div>
                                            <div id="DataTables_Table_1_filter" class="dataTables_filter"><label>
                                                    <input type="search" class="form-control form-control-sm"
                                                        placeholder="Search..."
                                                        aria-controls="DataTables_Table_1"></label></div>
                                            <div id="DataTables_Table_0_filter" class="dataTables_filter"><label>
                                                    <input type="search" class="form-control form-control-sm"
                                                        placeholder="Search..."
                                                        aria-controls="DataTables_Table_0"></label></div>
                                            <div id="DataTables_Table_0_filter" class="dataTables_filter"><label>
                                                    <input type="search" class="form-control form-control-sm"
                                                        placeholder="Search..."
                                                        aria-controls="DataTables_Table_0"></label></div>
                                            <div id="DataTables_Table_0_filter" class="dataTables_filter"><label>
                                                    <input type="search" class="form-control form-control-sm"
                                                        placeholder="Search..."
                                                        aria-controls="DataTables_Table_0"></label></div>
                                            <div id="DataTables_Table_1_filter" class="dataTables_filter"><label>
                                                    <input type="search" class="form-control form-control-sm"
                                                        placeholder="Search..."
                                                        aria-controls="DataTables_Table_1"></label></div>
                                            <div id="DataTables_Table_0_filter" class="dataTables_filter"><label>
                                                    <input type="search" class="form-control form-control-sm"
                                                        placeholder="Search..."
                                                        aria-controls="DataTables_Table_0"></label></div>
                                            <div id="DataTables_Table_0_filter" class="dataTables_filter"><label>
                                                    <input type="search" class="form-control form-control-sm"
                                                        placeholder="Search..."
                                                        aria-controls="DataTables_Table_0"></label></div>
                                            <div id="DataTables_Table_0_filter" class="dataTables_filter"><label>
                                                    <input type="search" class="form-control form-control-sm"
                                                        placeholder="Search..."
                                                        aria-controls="DataTables_Table_0"></label></div>
                                            <div id="DataTables_Table_1_filter" class="dataTables_filter"><label>
                                                    <input type="search" class="form-control form-control-sm"
                                                        placeholder="Search..."
                                                        aria-controls="DataTables_Table_1"></label></div>
                                            <div id="DataTables_Table_0_filter" class="dataTables_filter"><label>
                                                    <input type="search" class="form-control form-control-sm"
                                                        placeholder="Search..."
                                                        aria-controls="DataTables_Table_0"></label></div>
                                            <div id="DataTables_Table_2_filter" class="dataTables_filter"><label>
                                                    <input type="search" class="form-control form-control-sm"
                                                        placeholder="Search..."
                                                        aria-controls="DataTables_Table_2"></label></div>
                                        </div>
                                    </div>
                                    <div class="wordset">
                                        <ul>
                                            <li>
                                                <a data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                                    data-bs-original-title="pdf" aria-label="pdf"><img
                                                        src="assets/img/icons/pdf.svg" alt="img"></a>
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
                                    <div id="DataTables_Table_2_wrapper"
                                        class="dataTables_wrapper dt-bootstrap4 no-footer">
                                        <table class="table datanew dataTable no-footer" id="DataTables_Table_2"
                                            role="grid" aria-describedby="DataTables_Table_2_info">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting_asc" tabindex="0"
                                                        aria-controls="DataTables_Table_2" rowspan="1"
                                                        colspan="1" aria-sort="ascending"
                                                        aria-label="Date: activate to sort column descending"
                                                        style="width: 0px;">Date</th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="DataTables_Table_2" rowspan="1"
                                                        colspan="1"
                                                        aria-label="Reference: activate to sort column ascending"
                                                        style="width: 0px;">Reference</th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="DataTables_Table_2" rowspan="1"
                                                        colspan="1"
                                                        aria-label="Customer: activate to sort column ascending"
                                                        style="width: 0px;">Customer</th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="DataTables_Table_2" rowspan="1"
                                                        colspan="1"
                                                        aria-label="Amount	: activate to sort column ascending"
                                                        style="width: 0px;">Amount </th>
                                                    <th class="text-end sorting" tabindex="0"
                                                        aria-controls="DataTables_Table_2" rowspan="1"
                                                        colspan="1"
                                                        aria-label="Action: activate to sort column ascending"
                                                        style="width: 0px;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <tr class="odd">
                                                    <td class="sorting_1">2022-03-07 </td>
                                                    <td>0101</td>
                                                    <td>Walk-in Customer</td>
                                                    <td>$ 1500.00</td>
                                                    <td>
                                                        <a class="me-3" href="javascript:void(0);">
                                                            <img src="assets/img/icons/eye.svg" alt="img">
                                                        </a>
                                                        <a class="me-3" href="javascript:void(0);">
                                                            <img src="assets/img/icons/edit.svg" alt="img">
                                                        </a>
                                                        <a class="me-3 confirm-text" href="javascript:void(0);">
                                                            <img src="assets/img/icons/delete.svg" alt="img">
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr class="even">
                                                    <td class="sorting_1">2022-03-07 </td>
                                                    <td>0102</td>
                                                    <td>Walk-in Customer</td>
                                                    <td>$ 1500.00</td>
                                                    <td>
                                                        <a class="me-3" href="javascript:void(0);">
                                                            <img src="assets/img/icons/eye.svg" alt="img">
                                                        </a>
                                                        <a class="me-3" href="javascript:void(0);">
                                                            <img src="assets/img/icons/edit.svg" alt="img">
                                                        </a>
                                                        <a class="me-3 confirm-text" href="javascript:void(0);">
                                                            <img src="assets/img/icons/delete.svg" alt="img">
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr class="odd">
                                                    <td class="sorting_1">2022-03-07 </td>
                                                    <td>0103</td>
                                                    <td>Walk-in Customer</td>
                                                    <td>$ 1500.00</td>
                                                    <td>
                                                        <a class="me-3" href="javascript:void(0);">
                                                            <img src="assets/img/icons/eye.svg" alt="img">
                                                        </a>
                                                        <a class="me-3" href="javascript:void(0);">
                                                            <img src="assets/img/icons/edit.svg" alt="img">
                                                        </a>
                                                        <a class="me-3 confirm-text" href="javascript:void(0);">
                                                            <img src="assets/img/icons/delete.svg" alt="img">
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr class="even">
                                                    <td class="sorting_1">2022-03-07 </td>
                                                    <td>0104</td>
                                                    <td>Walk-in Customer</td>
                                                    <td>$ 1500.00</td>
                                                    <td>
                                                        <a class="me-3" href="javascript:void(0);">
                                                            <img src="assets/img/icons/eye.svg" alt="img">
                                                        </a>
                                                        <a class="me-3" href="javascript:void(0);">
                                                            <img src="assets/img/icons/edit.svg" alt="img">
                                                        </a>
                                                        <a class="me-3 confirm-text" href="javascript:void(0);">
                                                            <img src="assets/img/icons/delete.svg" alt="img">
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr class="odd">
                                                    <td class="sorting_1">2022-03-07 </td>
                                                    <td>0105</td>
                                                    <td>Walk-in Customer</td>
                                                    <td>$ 1500.00</td>
                                                    <td>
                                                        <a class="me-3" href="javascript:void(0);">
                                                            <img src="assets/img/icons/eye.svg" alt="img">
                                                        </a>
                                                        <a class="me-3" href="javascript:void(0);">
                                                            <img src="assets/img/icons/edit.svg" alt="img">
                                                        </a>
                                                        <a class="me-3 confirm-text" href="javascript:void(0);">
                                                            <img src="assets/img/icons/delete.svg" alt="img">
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr class="even">
                                                    <td class="sorting_1">2022-03-07 </td>
                                                    <td>0106</td>
                                                    <td>Walk-in Customer</td>
                                                    <td>$ 1500.00</td>
                                                    <td>
                                                        <a class="me-3" href="javascript:void(0);">
                                                            <img src="assets/img/icons/eye.svg" alt="img">
                                                        </a>
                                                        <a class="me-3" href="javascript:void(0);">
                                                            <img src="assets/img/icons/edit.svg" alt="img">
                                                        </a>
                                                        <a class="me-3 confirm-text" href="javascript:void(0);">
                                                            <img src="assets/img/icons/delete.svg" alt="img">
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr class="odd">
                                                    <td class="sorting_1">2022-03-07 </td>
                                                    <td>0107</td>
                                                    <td>Walk-in Customer</td>
                                                    <td>$ 1500.00</td>
                                                    <td>
                                                        <a class="me-3" href="javascript:void(0);">
                                                            <img src="assets/img/icons/eye.svg" alt="img">
                                                        </a>
                                                        <a class="me-3" href="javascript:void(0);">
                                                            <img src="assets/img/icons/edit.svg" alt="img">
                                                        </a>
                                                        <a class="me-3 confirm-text" href="javascript:void(0);">
                                                            <img src="assets/img/icons/delete.svg" alt="img">
                                                        </a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="dataTables_length" id="DataTables_Table_2_length"><label><select
                                                    name="DataTables_Table_2_length"
                                                    aria-controls="DataTables_Table_2"
                                                    class="custom-select custom-select-sm form-control form-control-sm">
                                                    <option value="10">10</option>
                                                    <option value="25">25</option>
                                                    <option value="50">50</option>
                                                    <option value="100">100</option>
                                                </select></label></div>
                                        <div class="dataTables_paginate paging_numbers"
                                            id="DataTables_Table_2_paginate">
                                            <ul class="pagination">
                                                <li class="paginate_button page-item active"><a href="#"
                                                        aria-controls="DataTables_Table_2" data-dt-idx="0"
                                                        tabindex="0" class="page-link">1</a></li>
                                            </ul>
                                        </div>
                                        <div class="dataTables_info" id="DataTables_Table_2_info" role="status"
                                            aria-live="polite">1 - 7 of 7 items</div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Modal recents -->
</div>
