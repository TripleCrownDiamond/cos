<div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
    <div class="card card-dark">
        <div class="card-header">
            <h4>Créer une agence</h4>
        </div>
        <div class="card-body">
            <style>
                fieldset.scheduler-border {
                    border: 1px groove #ddd !important;
                    padding: 0 1.4em 1.4em 1.4em !important;
                    margin: 0 0 1.5em 0 !important;
                    -webkit-box-shadow:  0px 0px 0px 0px #000;
                            box-shadow:  0px 0px 0px 0px #000;
                }
                legend.scheduler-border {
                    width:inherit; /* Or auto */
                    padding:0 10px; /* To give a bit of padding on the left and right */
                    
                }
            </style>
            <div class="" >(<span class="text-danger" >*</span>) Obligatoire</div>
            <form method="POST" wire:submit.prevent = "submit">
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border"><h4>Informations de l'agence</h4></legend>
                    <div class="row">
                        <div class="form-group col-12">
                            <label for="name">Raison sociale<span class="text-danger" >*</span></label>
                            <input placeholder="Nom de votre agence" name="name" value = "{{ old('agency_name')}}" type="text" class="form-control @error('agency.agency_name') is-invalid @enderror" wire:model="agency.agency_name" autofocus="">
                            @error('agency.agency_name')
                                <span class="invalid-feedback text—danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>

                        <div class="form-group col-12">
                            <label for="ifu">Identifiant Fiscal</label>
                            <input placeholder="IFU" type="text" class="form-control @error('agency.ifu') is-invalid @enderror" wire:model="agency.ifu" autofocus="" name="ifu" value = "{{ old('ifu')}}" >
                            @error('agency.ifu')
                                <span class="invalid-feedback text—danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="agency_email">Email de votre agence</label>
                        <input placeholder="Email professionnel" type="text" class="form-control @error('agency.agency_email') is-invalid @enderror" wire:model="agency.agency_email" autofocus="" name="agencyEmail" value = "{{ old('agencyEmail')}}" >
                        @error('agency.agency_email')
                            <span class="invalid-feedback text—danger">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="agency_telephone">Téléphone de votre agence</label>
                        <input placeholder="Ex:97000000" type="text" class="form-control @error('agency.agency_telephone') is-invalid @enderror" wire:model="agency.agency_telephone" autofocus="" name="agencyPhone" value = "{{ old('agencyPhone')}}" maxlength="8">
                        @error('agency.agency_telephone')
                            <span class="invalid-feedback text—danger">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                </fieldset>
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border"><h4>Informations de votre compte</h4></legend>
                    <div class="row">
                        <div class="form-group col-12">
                            <label for="first_name">Prénom<span class="text-danger" >*</span></label>
                            <input placeholder="" type="text" class="form-control @error('user.first_name') is-invalid @enderror" wire:model="user.first_name" autofocus="" name="firstName" value = "{{ old('firstName')}}" >
                            @error('user.first_name')
                                <span class="invalid-feedback text—danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-12">
                            <label for="last_name">Nom<span class="text-danger" >*</span></label>
                            <input placeholder="" type="text" class="form-control @error('user.last_name') is-invalid @enderror" wire:model="user.last_name" autofocus="" name="lastName" value = "{{ old('lastName')}}">
                            @error('user.last_name')
                                <span class="invalid-feedback text—danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-12">
                            <label for="telephone">Téléphone<span class="text-danger" >*</span></label>
                            <input placeholder="Ex:97000000" type="text" class="form-control ellipsis @error('user.telephone') is-invalid @enderror" wire:model="user.telephone" autofocus="" name="tel1" value = "{{ old('tel1')}}" maxlength="8">
                            @error('user.telephone')
                                <span class="invalid-feedback text—danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-12">
                            <label for="whatsapp">WhatsApp</label>
                            <input placeholder="Avec l'indicatif(22997000000)" type="text" class="form-control ellipsis @error('user.whatsapp') is-invalid @enderror" wire:model="user.whatsapp" autofocus="" name="tel2" value = "{{ old('tel2')}}" maxlength="11">
                        </div>
                        @error('user.whatsapp')
                            <span class="invalid-feedback text—danger">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email<span class="text-danger" >*</span></label>
                        <input placeholder="Adresse email personnelle" type="text" class="form-control @error('user.email') is-invalid @enderror" wire:model="user.email" autofocus="" name="userEmail" value = "{{ old('userEmail')}}" >
                        @error('user.email')
                            <span class="invalid-feedback text—danger">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Mot de passe<span class="text-danger" >*</span></label>
                        <input name="password" value = "{{ old('password')}}" placeholder="" type="password" class="form-control @error('user.password') is-invalid @enderror" wire:model="user.password" autofocus="">
                        @error('user.password')
                            <span class="invalid-feedback text—danger">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Confirmer mot de passe<span class="text-danger" >*</span></label>
                        <input name="password_confirmation" placeholder="" type="password" class="form-control @error('user.password_confirmation') is-invalid @enderror" wire:model="user.password_confirmation" autofocus="">
                        @error('user.password_confirmation')
                            <span class="invalid-feedback text—danger">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </fieldset>
                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                    <input type="checkbox" name="agree" class="custom-control-input" id="agree" value = "{{ old('agree') ? 'checked' : '' }}" >
                    <label class="custom-control-label" for="agree">J'ai lu et je suis en accord avec les termes et conditions</label>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-dark btn-lg btn-block" wire:loading.attr="disabled" wire:target="submit">
                        <span wire:loading.remove wire:target="submit">
                            Créer mon agence 
                        </span>
                        <span wire:loading.delay wire:target="submit" >
                            <div class="spinner-border spinner-border-sm text-light text-center" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                            <span> Création de votre agence en cours </span>
                        </span>
                    </button>
                </div>
            </form>
        </div>
        <div class="mb-4 text-muted text-center">
            Avez vous déjà une agence? @if (Route::has('login')) <a href="{{ route('login') }}">Connectez vous</a>  @endif
        </div>
    </div>
  </div>