<div>
    <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
        <div class="card card-dark">
            <div class="card-header">
                <h4>Mettre à jour les informations du client</h4>
            </div>
            <div class="card-body">
                
                <div class="" >(<span class="text-danger" >*</span>) Obligatoire</div>
                <form method="POST" wire:submit.prevent = "updateCustomer">
                    <div class="row">
                        <div class="form-group col-12">
                            <label for="first_name">Prénom<span class="text-danger" >*</span></label>
                            <input placeholder="" type="text" class="form-control @error('editCustomer.first_name') is-invalid @enderror" wire:model="editCustomer.first_name" autofocus="" name="firstName" value = "{{ old('firstName')}}" >
                            @error('editCustomer.first_name')
                                <span class="invalid-feedback text—danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-12">
                            <label for="last_name">Nom<span class="text-danger" >*</span></label>
                            <input placeholder="" type="text" class="form-control @error('editCustomer.last_name') is-invalid @enderror" wire:model="editCustomer.last_name" autofocus="" name="lastName" value = "{{ old('lastName')}}">
                            @error('editCustomer.last_name')
                                <span class="invalid-feedback text—danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-12">
                            <label for="telephone">Téléphone<span class="text-danger" >*</span></label>
                            <input placeholder="Ex:97000000" type="text" class="form-control ellipsis @error('editCustomer.telephone') is-invalid @enderror" wire:model="editCustomer.telephone" autofocus="" name="tel1" value = "{{ old('tel1')}}" maxlength="8">
                            @error('editCustomer.telephone')
                                <span class="invalid-feedback text—danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-12">
                            <label for="numero_abonne">Numéro abonné<span class="text-danger" >*</span></label>
                            <input name="numero_abonne" value = "{{ old('numero_abonne')}}" placeholder="" type="text" class="form-control @error('editCustomer.numero_abonne') is-invalid @enderror" wire:model="editCustomer.numero_abonne" autofocus="">
                            @error('editCustomer.numero_abonne')
                                <span class="invalid-feedback text—danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-12">
                            <label for="numero_abonne2">Autre identifiant de l'abonné</label>
                            <input name="numero_abonne2" value = "{{ old('numero_abonne2')}}" placeholder="" type="text" class="form-control @error('editCustomer.numero_abonne2') is-invalid @enderror" wire:model="editCustomer.numero_abonne2" autofocus="">
                            @error('editCustomer.numero_abonne2')
                                <span class="invalid-feedback text—danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

            
                        <div class="form-group col-12">
                            <button type="submit" class="btn btn-dark btn-lg btn-block" wire:loading.attr="disabled" wire:target="updateCustomer">
                                <span wire:loading.remove wire:target="updateCustomer"></span>
                                    Mettre à jour 
                                </span>
                                <span wire:loading.delay wire:target="updateCustomer" >
                                    <div class="spinner-border spinner-border-sm text-light text-center" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                
                                </span>
                            </button><br>
                        </div>
                    </div>
                </form>

                <button type="submit" class="btn btn-primary btn-lg btn-block" wire:loading.attr="disabled" wire:click="returnBack" wire:target="returnBack" >
                    <span wire:loading.remove wire:target="returnBack">
                        Revenir sur la liste des clients 
                    </span>
                    <span wire:loading.delay wire:target="returnBack">
                        <div class="spinner-border spinner-border-sm text-light text-center" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </span>
                </button>
            </div>
        </div>
      </div>
</div>

