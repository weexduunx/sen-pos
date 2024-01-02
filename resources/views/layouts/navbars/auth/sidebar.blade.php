    <div class="sidebar" id="sidebar">
        <div class="sidebar-inner slimscroll">
            <div id="sidebar-menu" class="sidebar-menu">
                <ul>
                    <li class="submenu-open">
                        <h6 class="submenu-hdr">Tableau de Bord</h6>
                        <ul>
                            <li class="@if (Route::currentRouteName() == 'dashboard') active @endif">
                                <a href="{{ route('dashboard') }}" wire:navigate><i data-feather="grid"></i><span>Dashboard</span></a>
                            </li>
                        </ul>
                    </li>
                    <li class="submenu-open">
                        <h6 class="submenu-hdr">Gestion Produits</h6>
                        <ul>
                            <li class="@if (Route::currentRouteName() == 'listeProduits') active @endif">
                                <a href="{{ route('listeProduits') }}" wire:navigate><i data-feather="box"></i><span>Produits</span></a>
                            </li>
                            {{-- <li class="@if (Route::currentRouteName() == 'createProduits') active @endif"><a
                                    href="{{ route('createProduits') }}" wire:navigate><i data-feather="plus-square"></i><span>Create
                                        Product</span></a></li> --}}
                            <li class="@if (Route::currentRouteName() == 'categories') active @endif">
                                <a href="{{route('categories')}}"><i data-feather="codepen"></i><span>Categories</span></a>
                            </li>
                            <li class="@if (Route::currentRouteName() == 'units') active @endif">
                                <a href="{{route('units')}}"><i data-feather="tag"></i><span>Units</span></a>
                            </li>
                            <li><a href="barcode.html"><i data-feather="align-justify"></i><span>Code Bar</span></a></li>
                            <li><a href="importproduct.html"><i data-feather="minimize-2"></i><span>Importer
                                        Produits</span></a></li>
                        </ul>
                    </li>
                    <li class="submenu-open">
                        <h6 class="submenu-hdr">Gestions des Ventes</h6>
                        <ul>
                            <li><a href="saleslist.html"><i data-feather="shopping-cart"></i><span>Ventes</span></a></li>
                            <li><a href="{{ route('pos') }}"><i data-feather="hard-drive"></i><span>POS</a></li>
                        </ul>
                    </li>
                    <li class="submenu-open">
                        <h6 class="submenu-hdr">Gestion Stock</h6>
                        <ul>
                            <li><a href="purchaselist.html"><i data-feather="shopping-bag"></i><span>Stock</span></a></li>
    
                            <li><a href="importpurchase.html"><i data-feather="minimize-2"></i><span>Ajustements</span></a>
                            </li>
                            <li><a href="importpurchase.html"><i data-feather="layers"></i><span>Fournisseurs</span></a>
                            </li>
                        </ul>
                    </li>
                    <li class="submenu-open">
                        <h6 class="submenu-hdr">Gestion des Finances</h6>
                        <ul>
                            <li><a href="purchaselist.html"><i data-feather="minus-circle"></i><span>Dépenses</span></a>
                            </li>
                            <li><a href="purchaselist.html"><i data-feather="dollar-sign"></i><span>Bénéfices</span></a>
                            </li>
                        </ul>
                    </li>
                    <li class="submenu-open">
                        <h6 class="submenu-hdr">Boutique</h6>
                        <ul>
                            <li><a href="customerlist.html"><i data-feather="minus-square"></i><span>Caisses</span></a></li>
                            <li><a href="supplierlist.html"><i data-feather="users"></i><span>Caissiers</span></a></li>
                        </ul>
                    </li>
                    <li class="submenu-open">
                        <h6 class="submenu-hdr">Statistiques</h6>
                        <ul>
                            <li><a href="salesreport.html"><i data-feather="bar-chart-2"></i><span>Ventes</span></a></li>
                            <li><a href="purchaseorderreport.html"><i data-feather="users"></i><span>Caissiers</span></a>
                            </li>
                            <li><a href="inventoryreport.html"><i
                                        data-feather="credit-card"></i><span>Inventaires</span></a></li>
                            <li><a href="supplierreport.html"><i data-feather="database"></i><span>Finances</span></a></li>
                        </ul>
                    </li>
                    <li class="submenu-open">
                        <h6 class="submenu-hdr">Gestion des Utilisateurs</h6>
                        <ul>
                            <li class="submenu">
                                <a href="javascript:void(0);"><i data-feather="users"></i><span>Gérer Users</span><span
                                        class="menu-arrow"></span></a>
                                <ul>
                                    <li class="@if (Route::currentRouteName() == 'users') active @endif">
                                        <a href="{{route('users')}}">Utilisateurs </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="submenu-open">
                        <h6 class="submenu-hdr">Settings</h6>
                        <ul>
                            <li class="submenu">
                                <a href="javascript:void(0);"><i data-feather="settings"></i><span>Settings</span><span
                                        class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="generalsettings.html">Parametres Généraux</a></li>
                                    <li><a href="taxrates.html">Taxes</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="signin.html"><i data-feather="log-out"></i><span>Logout</span> </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>