<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SenPos') }}</title>

    <!-- Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.png') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <!-- Animation CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/owlcarousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/owlcarousel/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/select2.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datetimepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/toastr/toatr.css') }}">
    <!-- Datatable CSS -->
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap4.min.css') }}"> --}}

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <style>
        .modal1 .modal-dialog {
            width: 100%;
            max-width: none;
            height: 100%;
            margin: 0;
        }

        .modal1 .modal-content {
            height: 100%;
            border: 0;
            border-radius: 0;
            background-color: #f2f2f2;
        }

        .modal1 .modal-body {
            overflow-y: auto;
        }
    </style>
    <!-- Alpine -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    @livewireStyles

</head>

<body class="font-sans antialiased">

    <div id="global-loader">
        <div class="whirly-loader"> </div>
    </div>
    {{ $slot }}

    @stack('scripts')

    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <!-- Feather Icon JS -->
    <script src="{{ asset('assets/js/feather.min.js') }}"></script>

    <!-- Slimscroll JS -->
    <script src="{{ asset('assets/js/jquery.slimscroll.min.js') }}"></script>
    <!-- Bootstrap Core JS -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Datatable JS -->
    {{-- <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/dataTables.bootstrap4.min.js') }}"></script> --}}
    <!-- Select2 JS -->
    <script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!-- Owl JS -->
    <script src="{{ asset('assets/plugins/owlcarousel/owl.carousel.min.js') }}"></script>
    {{-- <!-- Sweetalert 2 -->
    <script src="{{ asset('assets/plugins/sweetalert/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/sweetalert/sweetalerts.min.js') }}"></script>
    <!-- Toastr -->
    <script src="{{ asset('assets/plugins/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/toastr/toastr.js') }}"></script> --}}
    <!-- Chart JS -->
    <script src="{{ asset('assets/plugins/apexchart/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/apexchart/chart-data.js') }}"></script>

    <!-- Custom JS -->
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script>
        document.addEventListener('livewire:load', () => {
            Livewire.on('fermerModal', (event) => {
                $('#createAndUpdateModal').modal('hide');
            });
        });
        document.addEventListener('livewire:load', () => {
            Livewire.on('openDetailsModal', (event) => {
                $('#detailModal').modal('show');
            });

        });
        document.addEventListener('livewire:load', () => {
            Livewire.on('fermerModal', (event) => {
                $('#editModal').modal('hide');
            });
        });
        document.addEventListener('livewire:load', () => {
            Livewire.on('openEditModal', (event) => {
                $('#createAndUpdateModal').modal('show');
            });

        });
        document.addEventListener('livewire:load', function() {
            Livewire.on('initOwlCarousel', function() {
                // Initialisation du carrousel Owl Carousel
                $('.owl-carousel').owlCarousel({
                    // Options de configuration du carrousel
                });
            });
        });
        window.addEventListener('alert', event => {
            toastr[event.detail.type](event.detail.message,
                event.detail.title ?? ''), 
                toastr.options = {
                    "closeButton": false,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                }
        });
    </script>
    <script>
        document.addEventListener('livewire:load', () => {
            Livewire.on('closeModal', () => {
                // Add code here to close your modal
                $('#AddCategorie').modal('hide');
            });
        });
    </script>
     {{-- <script>
        var SwalModal = (icon, title, html) => {
            Swal.fire({
                icon,
                title,
                html
            })
        }

        var SwalAvert = (title, text, icon, button) => {
            Swal.fire({
                title,
                text,
                icon,
                button,
            });
        }

        var SwalConfirm = (icon, title, html, confirmButtonText, method, params, callback) => {
            Swal.fire({
                icon,
                title,
                html,
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText,
            }).then((result) => {
                if (result.isConfirmed) {
                    return livewire.emit(method, params),
                        Swal.fire(
                            'Supprimé!',
                            'La ligne a été supprimé.',
                            'success'
                        )
                }

                if (callback) {
                    return livewire.emit(callback)
                }
            })
        }

        var SwalConfirmAr = (icon, title, html, confirmButtonText, method, params, callback) => {
            Swal.fire({
                icon,
                title,
                html,
                showCancelButton: true,
                confirmButtonColor: '#47C363',
                cancelButtonColor: '#FC544B',
                confirmButtonText,
            }).then((result) => {
                if (result.isConfirmed) {
                    return livewire.emit(method, params),
                        Swal.fire(
                            'Archivé!',
                            'Le bon a été archivé.',
                            'success'
                        )
                }

                if (callback) {
                    return livewire.emit(callback)
                }
            })
        }

        var SwalAlert = (icon, title, timeout = 7000) => {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: timeout,
                onOpen: toast => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon,
                title
            })
        }
        document.addEventListener('DOMContentLoaded', () => {
            this.livewire.on('swal:modal', data => {
                SwalModal(data.icon, data.title, data.text)
            })

            this.livewire.on('swal:confirm', data => {
                SwalConfirm(data.icon, data.title, data.text, data.confirmText, data.method, data.params,
                    data.callback)
            })

            this.livewire.on('swal:confirmar', data => {
                SwalConfirmAr(data.icon, data.title, data.text, data.confirmText, data.method, data.params,
                    data.callback)
            })

            this.livewire.on('swal:alert', data => {
                SwalAlert(data.icon, data.title, data.timeout)
            })

            this.livewire.on('swal:avert', data => {
                SwalAvert(data.title, data.text, data.icon, data.button)
            })
        })

        document.addEventListener('DOMContentLoaded', () => {
            this.livewire.on('urlChange', (url) => {
                history.pushState(null, null, url);
            });
        });
        document.addEventListener('DOMContentLoaded', () => {
            this.livewire.on('closeModal', (name) => {
                $('#' + name).modal('hide')
            });
        });
        document.addEventListener('DOMContentLoaded', () => {
            this.livewire.on('openModal', (name) => {
                $('#' + name).modal('show')
            });
        });
    </script> --}}
    
<<<<<<< HEAD
    @include('sweetalert::alert')
=======
    
>>>>>>> 7f1737184f7216ace671cbd30bd30dccc6c0763a
    @livewireScripts
    @stack('scripts')
</body>

</html>
