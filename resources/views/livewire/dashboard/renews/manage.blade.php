<div>
    <div>
        <div class="row">
            <div class="col-12">
              <div class="row d-flex justify-content-between">
                <div class="col-6">
                  <a href="" wire:click.prevent="goToAddCustomer()" class="btn btn-dark btn-compose mb-3"><i class="
                    fas fa-refresh"></i> Renouveller un abonnement</a>
                </div>
                <div class="col-4 float-left">
                {{--<input type="text" class="form-control" name="" id="" placeholder="Rechercher..." wire:model="search"> --}}
                  
                </div>
              </div>
              <div class="card">
                <div class="card-header">
                    @can('admin')
                        <h4>Gérer les réabonnement</h4>
                    @endcan

                    @can('partners')
                        <h4>Mes réabonnement</h4>
                    @endcan
                  
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped table-hover" id="" style="width:100%;">
                      <thead>
                        <tr>
                          <th>Nom du partenaire</th>
                          <th>Nom du client</th>
                          <th>Numéro d'abonné</th>
                          <th>Téléphone</th>
                          <th>Formule</th>
                          <th>Prix</th>
                          <th>Durée</th>
                          <th>Statut</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                    
                        @foreach ($agency_renews as $agency_renew)
                        <tr>
                            
                            <td><small> {{ $agency_renew->user()->first_name }}  {{ $agency_renew->user()->last_name }}</small></td>
                            
                            <td>
                                <small> </small>
                            </td>
                            <td>
                              
                                    <small> {{ $renew->numero_abonne }} </small>
                             
                            </td>
                            <td><small><span class="tag tag-success">{{ $renew->created_at->diffForHumans() }}</span></small></td>
                            <td>
                                <button class="btn btn-dark btn-circle btn-sm" wire:click="goToEditCustomer({{$renew->id}})"> <i class="far fa-edit"></i> </button>
                                <button class="btn btn-danger btn-circle btn-sm" wire:click="confirmDelete('{{ $renew->first_name }} {{ $renew->last_name }}', {{$renew->id}})" > <i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
    
                        @endforeach
                     
                     
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="card-footer">
                    <div class="float-right">
                        @if ($agency_renews->hasPages())
                            <div class="pagination-wrapper">
                                {{ $agency_renews->links() }}
                            </div>
                        @endif
                    </div>
                </div>
              </div>
            </div>
          </div>
    </div>    
</div>
