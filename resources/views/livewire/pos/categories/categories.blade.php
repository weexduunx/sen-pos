<div>
    {{-- Do your work, then step back. --}}
    <ul class=" tabs owl-carousel owl-theme owl-product  border-0 ">
        @foreach ($categories as $category)
            <li wire:key="{{ $category->id }}" id="{{ Str::slug($category->nomCategorie) }}">
                <div class="product-details">
                    <img src="{{ asset('storage/' . $category->image) }}" alt="img">
                    <h6>{{ $category->nomCategorie }}</h6>
                </div>
            </li>
        @endforeach
    </ul>
</div>
