<div>
    <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
        <div class="card card-dark">
            <div class="card-header">
                <h4>Débiter le compte du partenaire</h4>
            </div>
            <div class="card-body">
                <div class="row mx-auto">
                    <h6 class="bg-dark text-white pt-2 pb-2 pl-2 pr-2 rounded-sm w-100">Solde Actuel : <input class="bg-dark text-bg-dark text-primary border-transparent text-lg float-end" style="font-size: 30px" readonly type="text" wire:model = "editUserBalance.balance" /> FCFA </h6>
                </div>
                <form method="POST" wire:submit.prevent = "updateBalance">
                    <div class="row">
                        <div class="form-group col-12">
                            <label for="first_name">Montant à retirer en Fcfa</label>
                            <input placeholder="" type="text" class="form-control @error('editUserBalance.newbalance') is-invalid @enderror" wire:model="editUserBalance.newbalance" autofocus="" name="balance" value = "" >
                            @error('editUserBalance.newbalance')
                                <span class="invalid-feedback text—danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-12">
                            <button type="submit" class="btn btn-dark btn-lg btn-block" wire:loading.attr="disabled" wire:target="updateBalance">
                                <span wire:loading.remove wire:target="updateBalance" >
                                    Retirer
                                </span>
                                <span wire:loading.delay wire:target="updateBalance" >
                                    <div class="spinner-border spinner-border-sm text-light text-center" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                    <span> Retrait en cours </span>
                                </span>
                            </button>
                        </div>
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
        
    </div>
</div>
