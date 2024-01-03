<div>
    <div class="relative">
        <div class="input-group mb-3">
            <input
            type="text"
            class="form-control"
            placeholder="Rechercher un Produit"
            wire:model="query"
            wire:keydown.arrow-down.prevent="incrementHighLight"
            wire:keydown.arrow-up.prevent="decrementHighLight"
            wire:keydown.bakspace="resetValue"
            wire:keydown.tab="resetValue"
         />
            
        </div>

        <div wire:loading class="absolute z-10 list-group bg-white w-full rounded-t-none shadow-lg">
            <div class="list-item">Searching...</div>
        </div>
        @if (!empty($query))
            <div class="absolute z-10 list-group bg-white w-full rounded-t-none shadow-lg">
                @if (!empty($produits))
                    @foreach ($produits as $i => $produit)
                        <a wire:click="$emit('produitSelected', {{ $produit->id }})"
                            class="list-item cursor-pointer py-2 pl-2 {{ $i === $highlightIndex ? 'bg-blue-100' : '' }}">
                            {{ $produit->nomProduit }} =>&nbsp;Code BAR : {{ $produit->codeBar }}
                        </a>
                    @endforeach
                @endif
            </div>
        @endif
    </div>
</div>
