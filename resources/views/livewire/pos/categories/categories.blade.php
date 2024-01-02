<div>
    <ul class="tabs owl-carousel owl-theme owl-product border-0" wire:ignore>
        @foreach ($categories as $category)
            <li wire:key="{{ $category->id }}" wire:click="setActiveTab('{{ $category->id }}')"
                class="{{ $activeCategoryId == $category->id ? 'active' : '' }}">
                <div class="product-details">
                    <img src="{{ asset('storage/' . $category->image) }}" alt="img">
                    <h6>{{ $category->nomCategorie }}</h6>
                </div>
            </li>
        @endforeach
    </ul>
</div>
