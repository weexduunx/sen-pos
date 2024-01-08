<div>
    {{-- <div class="mb-3">
        <button wire:click="addModePaiement" class="btn btn-primary">Ajouter un mode de paiement</button>
    </div> --}}
    <div class="gift-card mb-25">
        <p class="card-text" wire:click="addModePaiement">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-plus-circle mr-50 font-medium-5">
                <circle cx="12" cy="12" r="10"></circle>
                <line x1="12" y1="8" x2="12" y2="16"></line>
                <line x1="8" y1="12" x2="16" y2="12"></line>
            </svg>
            <span class="align-middle">Moyen de Paiement</span>
        </p>
    </div>
    @foreach ($modesPaiement as $index => $modePaiement)
        <div class="card">
            <div class="card-body">
                <div class="mb-3">
                    <label>Mode de Paiement</label>
                    <select wire:model="modesPaiement.{{ $index }}.mode_id" class="form-control">
                        <option value="">Sélectionnez un mode de paiement</option>
                        @foreach ($modesPaiementDisponibles as $modeDisponible)
                            <option value="{{ $modeDisponible->id }}">{{ $modeDisponible->nom }}</option>
                        @endforeach
                    </select>

                    <label>Montant</label>
                    <input wire:model="modesPaiement.{{ $index }}.montant" type="number" class="form-control">
                </div>
                <button wire:click="removeModePaiement({{ $index }})" class="btn btn-danger">Supprimer</button>
            </div>
        </div>
    @endforeach
   
    {{-- <h1> ID Vente : {{$venteId}}</h1> --}}
    <div class="mb-3">
        <button wire:click="enregistrerPaiement" class="btn btn-primary">Valider</button>
    </div>
</div>
