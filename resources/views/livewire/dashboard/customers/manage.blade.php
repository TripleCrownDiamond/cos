<div>
    <div>
        <div class="row">
            <div class="col-12">
              <div class="row d-flex justify-content-between">
                <div class="col-6">
                  <a href="" wire:click.prevent="goToAddCustomer()" class="btn btn-dark btn-compose mb-3"><i class="
                    fas fa-customer-plus"></i> Nouveau Client</a>
                </div>
                <div class="col-4 float-left">
                {{--<input type="text" class="form-control" name="" id="" placeholder="Rechercher..." wire:model="search"> --}}
                  
                </div>
              </div>
              <div class="card">
                <div class="card-header">
                  <h4>Gérer les clients</h4>
                  
                  
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped table-hover" id="" style="width:100%;">
                      <thead>
                        <tr>
                          <th>Nom & Prénoms</th>
                          <th>Téléphone</th>
                          <th>Numéro abonné</th>
                          <th>Ajouté</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                    
                        @foreach ($customers as $customer)
                        <tr>
                            
                            <td><small>{{ $customer->first_name }} {{ $customer->last_name }}</small></td>
                            
                            <td>
                                <small> {{ $customer->telephone }}</small>
                            </td>
                            <td>
                              
                                    <small> {{ $customer->numero_abonne }} </small>
                             
                            </td>
                            <td><small><span class="tag tag-success">{{ $customer->created_at->diffForHumans() }}</span></small></td>
                            <td>
                                <button class="btn btn-dark btn-circle btn-sm" wire:click="goToEditCustomer({{$customer->id}})"> <i class="far fa-edit"></i> </button>
                                <button class="btn btn-danger btn-circle btn-sm" wire:click="confirmDelete('{{ $customer->first_name }} {{ $customer->last_name }}', {{$customer->id}})" > <i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
    
                        @endforeach
                     
                     
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="card-footer">
                    <div class="float-right">
                        @if ($customers->hasPages())
                            <div class="pagination-wrapper">
                                {{ $customers->links() }}
                            </div>
                        @endif
                    </div>
                </div>
              </div>
            </div>
          </div>
    </div>    
</div>
