<div>
    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
        <div class="card card-dark">
            <div class="card-header">
                <div class=""><h4>Connexion</h4></div>
            </div>
            <div class="card-body">
                <form method="POST" wire:submit.prevent = "submit">
                    <div class="form-group">
                        <label for="email">Email</label>

                        <input type="text" placeholder="email@exemple.com" class="form-control @error('form.email') is-invalid @enderror" wire:model.lazy="form.email" value = "{{ old('email') }}" autofocus>

                        @error('form.email')
                            <span class="invalid-feedback text—danger">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>
                    <div class="form-group">
                        <div class="d-block">
                        <label for="password" class="control-label">Mot de passe</label>
                            <div class="float-right">
                                @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-small">
                                    Mot de passe oublié ?
                                </a>
                                @endif
                            </div>
                        </div>

                            <input type="password" class="form-control @error('form.password') is-invalid @enderror" wire:model.lazy="form.password">

                            @error('form.password')
                                <span class="invalid-feedback text—danger" >
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="remember" class="custom-control-input" >
                            <label class="custom-control-label" for="remember-me">Se souvenir de moi</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-dark btn-lg btn-block" tabindex="4" wire:loading.attr="disabled" wire:target="submit">
                            <span wire:loading.remove wire:target="submit">
                                Connexion 
                            </span>
                            <span wire:loading.delay wire:target="submit">
                                <div class="spinner-border spinner-border-sm text-light text-center" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                                <span> Connexion en cours </span>
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="mt-2 text-muted text-center">
            Vous êtes une agence et vous n'avez pas encore de compte? @if (Route::has('register')) <a href="{{ route('register') }}">Inscrivez vous</a>  @endif
        </div>
    </div>
</div>