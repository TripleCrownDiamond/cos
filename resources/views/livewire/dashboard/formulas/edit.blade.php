<div>
    <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
        <div class="card card-dark">
            <div class="card-header">
                <h4>Modifier la formule</h4>
            </div>
            <div class="card-body">
                
                <div class="" >(<span class="text-danger" >*</span>) Obligatoire</div>
                <form method="POST" wire:submit.prevent = "updateFormula">
                    <div class="row">
                        <div class="form-group col-12">
                            <label for="name">Nom<span class="text-danger" >*</span></label>
                            <input placeholder="" type="text" class="form-control @error('editFormula.name') is-invalid @enderror" wire:model="editFormula.name" autofocus="" name="" value = "{{ old('name')}}" >
                            @error('editFormula.name')
                                <span class="invalid-feedback text—danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-12">
                            <label for="regular_price">Prix Normal<span class="text-danger" >*</span></label>
                            <input placeholder="" type="number" class="form-control @error('editFormula.regular_price') is-invalid @enderror" wire:model="editFormula.regular_price" autofocus="" name="" value = "{{ old('regular_price')}}">
                            @error('editFormula.regular_price')
                                <span class="invalid-feedback text—danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                       
                    </div>
                   
            
                    <div class="form-group">
                        <button type="submit" class="btn btn-dark btn-lg btn-block" wire:loading.attr="disabled" wire:target="updateFormula">
                            <span wire:loading.remove wire:target="updateFormula"></span>
                                Mettre à jour 
                            </span>
                            <span wire:loading.delay wire:target="updateFormula" >
                                <div class="spinner-border spinner-border-sm text-light text-center" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                                <span> Mise à jour en cours </span>
                            </span>
                        </button><br>
                    </div>
                </form>
                <button type="submit" class="btn btn-primary btn-lg btn-block" wire:loading.attr="disabled" wire:click="returnBack" wire:target="returnBack" >
                    <span wire:loading.remove wire:target="returnBack">
                        Revenir sur la liste des formules 
                    </span>
                    <span wire:loading.delay wire:target="returnBack">
                        <div class="spinner-border spinner-border-sm text-light text-center" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                        <span> Retour en cours </span>
                    </span>
                </button>
            </div>
        </div>
      </div>
</div>

