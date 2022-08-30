<div>
    <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
        <div class="card card-dark">
            <div class="card-header">
                <h4>Mettre à jour les informations du partenaire</h4>
            </div>
            <div class="card-body">
                <div class="" ></div>
                <form method="POST" wire:submit.prevent = "updateUser">
                    <div class="row">
                        <div class="form-group col-12">
                            <label for="first_name">Prénom</label>
                            <input placeholder="" type="text" class="form-control @error('editUser.first_name') is-invalid @enderror" wire:model="editUser.first_name" autofocus="" name="firstName" value = "{{ old('firstName')}}" >
                            @error('editUser.first_name')
                                <span class="invalid-feedback text—danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-12">
                            <label for="last_name">Nom</label>
                            <input placeholder="" type="text" class="form-control @error('editUser.last_name') is-invalid @enderror" wire:model="editUser.last_name" autofocus="" name="lastName" value = "{{ old('lastName')}}">
                            @error('editUser.last_name')
                                <span class="invalid-feedback text—danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-12">
                            <label for="telephone">Téléphone</label>
                            <input placeholder="Ex:97000000" type="text" class="form-control ellipsis @error('editUser.telephone') is-invalid @enderror" wire:model="editUser.telephone" autofocus="" name="tel1" value = "{{ old('tel1')}}" maxlength="8">
                            @error('editUser.telephone')
                                <span class="invalid-feedback text—danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-12">
                            <label for="whatsapp">WhatsApp</label>
                            <input placeholder="Avec l'indicatif(22997000000)" type="text" class="form-control ellipsis @error('editUser.whatsapp') is-invalid @enderror" wire:model="editUser.whatsapp" autofocus="" name="tel2" value = "{{ old('tel2')}}" maxlength="11">
                        </div>
                        @error('editUser.whatsapp')
                            <span class="invalid-feedback text—danger">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input placeholder="Adresse email personnelle" type="text" class="form-control @error('editUser.email') is-invalid @enderror" wire:model="editUser.email" autofocus="" name="editUserEmail" value = "{{ old('editUserEmail')}}" >
                        @error('editUser.email')
                            <span class="invalid-feedback text—danger">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
            
                    <div class="form-group">
                        <button type="submit" class="btn btn-dark btn-lg btn-block" wire:loading.attr="disabled" wire:target="updateUser">
                            <span wire:loading.remove wire:target="updateUser" >
                                Mettre à jour
                            </span>
                            <span wire:loading.delay wire:target="updateUser" >
                                <div class="spinner-border spinner-border-sm text-light text-center" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                                <span> Mise à jour en cours </span>
                            </span>
                        </button>
                    </div>
                </form>
                <button type="submit" class="btn btn-primary btn-lg btn-block" wire:loading.attr="disabled" wire:target="returnBack" wire:click="returnBack">
                    <span wire:loading.remove wire:target="returnBack">
                        Revenir sur la liste des partenaires 
                    </span>
                    <span wire:loading.delay wire:click="returnBack" wire:target="returnBack">
                        <div class= "spinner-border spinner-border-sm text-light text-center" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                        <span> Retour en cours en cours </span>
                    </span>
                </button>
            </div>
        </div>
        <div class="card card-dark">
            <div class="card-header">
                <h4>Réinitialisation du mot de passe à "password"</h4>
            </div>
            <div class="card-body">
            <ul>
                <li>
                    <a href="#" class="btn btn-link" wire:click.prevent="confirmPwdReset()">Réinitialiser le mot de passe</a>
                    <span>(par défaut: "password") </span>
                </li>
            </ul>
            </div>
        </div>
    </div>
</div>
