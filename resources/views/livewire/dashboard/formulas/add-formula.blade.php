<div>
    <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
        <div class="card card-dark">
            <div class="card-header">
                <h4>Ajouter une formule</h4>
            </div>
            <div class="card-body">
                
                <div class="" >(<span class="text-danger" >*</span>) Obligatoire</div>
                <form method="POST" wire:submit.prevent = "addFormula">
                    <div class="row">
                        <div class="form-group col-12">
                            <label for="name">Nom<span class="text-danger" >*</span></label>
                            <input placeholder="" type="text" class="form-control @error('newFormula.name') is-invalid @enderror" wire:model="newFormula.name" autofocus="" name="" value = "{{ old('firstName')}}" >
                            @error('newFormula.name')
                                <span class="invalid-feedback text—danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-12">
                            <label for="regular_price">Prix <span class="text-danger" >*</span></label>
                            <input placeholder="" type="number" class="form-control @error('newFormula.regular_price') is-invalid @enderror" wire:model="newFormula.regular_price" autofocus="" name="" value = "{{ old('lastName')}}">
                            @error('newFormula.regular_price')
                                <span class="invalid-feedback text—danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                       
                    </div>
                   
            
                    <div class="form-group">
                        <button type="submit" class="btn btn-dark btn-lg btn-block" wire:loading.attr="disabled" wire:target="addFormula">
                            <span wire:loading.remove wire:target="addFormula"></span>
                                Ajouter une formule 
                            </span>
                            <span wire:loading.delay wire:target="addFormula" >
                                <div class="spinner-border spinner-border-sm text-light text-center" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                                <span> Ajout de formule en cours </span>
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

