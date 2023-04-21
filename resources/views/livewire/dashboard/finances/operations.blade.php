<div>
    <div>
        <div class="row">
            <div class="col-12">
              <div class="row d-flex justify-content-between">
                <div class="col-6">
                  
                </div>
                <div class="col-4 float-left">
                {{--<input type="text" class="form-control" name="" id="" placeholder="Rechercher..." wire:model="search"> --}}
                  
                </div>
              </div>
              <div class="card">
                <div class="card-header">
                  <h4>Opérations Financières</h4>
                  
                  
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped table-hover" id="" style="width:100%;">
                      <thead>
                        <tr>
                          <th>Nom & Prénoms</th>
                          <th>Solde</th>
                          <th>Operations</th>
                        </tr>
                      </thead>
                      <tbody>
                    
                        @foreach ($users as $user)
                        <tr>             
                            <td><small>{{ $user->first_name }} {{ $user->last_name }}</small></td>
                            <td>
                                <small> {{ $user->balance }} FCFA</small>
                            </td>
                            <td>
                                <button class="btn btn-success btn-circle btn-sm" wire:click="goToCredit({{$user->id}})"> <i class="fas fa-piggy-bank"></i> </button>
                                <button class="btn btn-danger btn-circle btn-sm" wire:click="goToDebit({{$user->id}})" > <i class="fas fa-piggy-bank"></i></button>
                            </td>
                        </tr>
    
                        @endforeach
                     
                     
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="card-footer">
                    <div class="float-right">
                        @if ($users->hasPages())
                            <div class="pagination-wrapper">
                                {{ $users->links() }}
                            </div>
                        @endif
                    </div>
                </div>
              </div>
            </div>
          </div>
    </div>    
</div>
