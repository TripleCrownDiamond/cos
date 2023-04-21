@can('admin')
<div>
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
                      <h4>Historique des transactions</h4>
                      
                      
                    </div>
                   {{--  <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-striped table-hover" id="" style="width:100%;">
                          <thead>
                            <tr>
                              <th>Txid</th>
                              <th>Montant</th>
                              <th>Type</th>
                              <th>Date</th>
                              <th>Détails</th>
                            </tr>
                          </thead>
                          <tbody>
                        
                            @foreach ($adminHistories as $ah)
                            <tr>             
                                <td><small>{{ $ah->txid }} </small></td>
                                <td>
                                    <small> {{ $ah->amount }} FCFA</small>
                                </td>
                                <td>
                                    @if ( $ah->type == "Crédit" )

                                        <small class="text-success"> {{ $ah->type }} </small>

                                    @elseif ( $ah->type == "Débit" )

                                        <small class="text-danger"> {{ $ah->type }} </small>

                                    @else

                                        <small class="text-info"> {{ $ah->type }} </small>

                                    @endif
                                    
                                </td>
                                <td>
                                    <small> {{ $ah->created_at->diffForHumans() }} </small>
                                </td>
                                <td>
                                    <button class="btn btn-primary btn-circle btn-sm" wire:click="goToDetail({{$ah->id}})"> <i class="fas fa-info-circle"></i> </button>
                                </td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="card-footer">
                        <div class="float-right">
                            @if ($adminHistories->hasPages())
                                <div class="pagination-wrapper">
                                    {{ $adminHistories->links() }}
                                </div>
                            @endif
                        </div>
                    </div> --}}
                  </div>
                </div>
              </div>
        </div>    
    </div>    
</div>    
@endcan

@can('partner')
<div>
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
                      <h4>Historique des transactions</h4>
                      
                      
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-striped table-hover" id="" style="width:100%;">
                          <thead>
                            <tr>
                              <th>Txid</th>
                              <th>Montant</th>
                              <th>Type</th>
                              <th>Date</th>
                              <th>Détails</th>
                            </tr>
                          </thead>
                          <tbody>
                        
                            @foreach ($userHistories as $ah)
                            <tr>             
                                <td><small>{{ $ah->txid }} </small></td>
                                <td>
                                    <small> {{ $ah->amount }} FCFA</small>
                                </td>
                                <td>
                                    @if ( $ah->type == "Crédit" )

                                        <small class="text-success"> {{ $ah->type }} </small>

                                    @elseif ( $ah->type == "Débit" )

                                        <small class="text-danger"> {{ $ah->type }} </small>

                                    @else

                                        <small class="text-info"> {{ $ah->type }} </small>

                                    @endif
                                    
                                </td>
                                <td>
                                    <small> {{ $ah->created_at->diffForHumans() }} </small>
                                </td>
                                <td>
                                    <button class="btn btn-primary btn-circle btn-sm" wire:click="goToDetail({{$ah->id}})"> <i class="fas fa-info-circle"></i> </button>
                                </td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="card-footer">
                        <div class="float-right">
                            @if ($adminHistories->hasPages())
                                <div class="pagination-wrapper">
                                    {{ $userHistories->links() }}
                                </div>
                            @endif
                        </div>
                    </div>
                  </div>
                </div>
              </div>
        </div>    
    </div>    
</div>  
@endcan