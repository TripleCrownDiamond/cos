<div>
    <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
        <div class="card card-dark">
            <div class="card-header">
                <h4>Ajouter un partenaire</h4>
            </div>
            <div class="card-body">
                
                <div class="" >(<span class="text-danger" >*</span>) Obligatoire</div>
                <form method="POST" wire:submit.prevent = "addUser">
                    <div class="row">
                        <div class="form-group col-12">
                            <label for="first_name">Prénom<span class="text-danger" >*</span></label>
                            <input placeholder="" type="text" class="form-control @error('newUser.first_name') is-invalid @enderror" wire:model="newUser.first_name" autofocus="" name="firstName" value = "{{ old('firstName')}}" >
                            @error('newUser.first_name')
                                <span class="invalid-feedback text—danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-12">
                            <label for="last_name">Nom<span class="text-danger" >*</span></label>
                            <input placeholder="" type="text" class="form-control @error('newUser.last_name') is-invalid @enderror" wire:model="newUser.last_name" autofocus="" name="lastName" value = "{{ old('lastName')}}">
                            @error('newUser.last_name')
                                <span class="invalid-feedback text—danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-12">
                            <label for="telephone">Téléphone<span class="text-danger" >*</span></label>
                            <input placeholder="Ex:97000000" type="text" class="form-control ellipsis @error('newUser.telephone') is-invalid @enderror" wire:model="newUser.telephone" autofocus="" name="tel1" value = "{{ old('tel1')}}" maxlength="8">
                            @error('newUser.telephone')
                                <span class="invalid-feedback text—danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-12">
                            <label for="whatsapp">WhatsApp</label>
                            <input placeholder="Avec l'indicatif(22997000000)" type="text" class="form-control ellipsis @error('newUser.whatsapp') is-invalid @enderror" wire:model="newUser.whatsapp" autofocus="" name="tel2" value = "{{ old('tel2')}}" maxlength="11">
                        </div>
                        @error('newUser.whatsapp')
                            <span class="invalid-feedback text—danger">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email<span class="text-danger" >*</span></label>
                        <input placeholder="Adresse email personnelle" type="text" class="form-control @error('newUser.email') is-invalid @enderror" wire:model="newUser.email" autofocus="" name="newUserEmail" value = "{{ old('newUserEmail')}}" >
                        @error('newUser.email')
                            <span class="invalid-feedback text—danger">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Mot de passe<span class="text-danger" >*</span></label>
                        <input name="password" value = "{{ old('password')}}" placeholder="" type="password" class="form-control @error('newUser.password') is-invalid @enderror" wire:model="newUser.password" autofocus="">
                        @error('newUser.password')
                            <span class="invalid-feedback text—danger">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Confirmer mot de passe<span class="text-danger" >*</span></label>
                        <input name="password_confirmation" placeholder="" type="password" class="form-control @error('newUser.password_confirmation') is-invalid @enderror" wire:model="newUser.password_confirmation" autofocus="">
                        @error('newUser.password_confirmation')
                            <span class="invalid-feedback text—danger">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
            
                    <div class="form-group">
                        <button type="submit" class="btn btn-dark btn-lg btn-block" wire:loading.attr="disabled" wire:target="addUser">
                            <span wire:loading.remove wire:target="addUser"></span>
                                Ajouter un partenaire 
                            </span>
                            <span wire:loading.delay wire:target="addUser" >
                                <div class="spinner-border spinner-border-sm text-light text-center" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                                <span> Ajout de partenaire en cours </span>
                            </span>
                        </button><br>
                    </div>
                </form>
                <button type="submit" class="btn btn-primary btn-lg btn-block" wire:loading.attr="disabled" wire:click="returnBack" wire:target="returnBack" >
                    <span wire:loading.remove wire:target="returnBack">
                        Revenir sur la liste des partenaires 
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

