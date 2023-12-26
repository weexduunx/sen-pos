<div>
    <div class="header">
        <!-- Logo -->
        <div class="header-left active">
            <a href="index.html" class="logo logo-normal">
                <img src="{{asset('assets/img/logo-senpos.png')}}"  alt="">
            </a>
            <a href="index.html" class="logo logo-white">
                <img src="{{asset('assets/img/logo-white-senpos.png')}}"  alt="">
            </a>
            <a href="index.html" class="logo-small">
                <img src="{{asset('assets/img/logo-small.png')}}"  alt="">
            </a>
            <a id="toggle_btn" href="javascript:void(0);">
                <i data-feather="chevrons-left" class="feather-16"></i>
            </a>
        </div>
        <!-- /Logo -->
        
        <a id="mobile_btn" class="mobile_btn" href="index.html#sidebar">
            <span class="bar-icon">
                <span></span>
                <span></span>
                <span></span>
            </span>
        </a>
        
        <!-- Header Menu -->
       <livewire:layout.header-menu />
        <!-- /Header Menu -->
        
        <!-- Mobile Menu -->
       <livewire:layout.mobile-menu />
        <!-- /Mobile Menu -->
    </div>
</div>
