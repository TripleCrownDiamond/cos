<div>
    <div class="row">
        <div class="col-12">
            <div>
            <a href="" wire:click.prevent="goToAddFormula()" class="btn btn-dark btn-compose mb-3"><i class="
                fas fa-user-plus"></i> Nouvelle Formule</a>
            </div>
          <div class="card">
            <div class="card-header">
              <h4>Gérer les formules</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-hover" id="" style="width:100%;">
                  <thead>
                    <tr>
                      <th>Nom</th>
                      <th>Prix </th>
                      
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  
                    @foreach ($formulas as $formula)
                    <tr>
                        <td><small> {{ $formula->name }} </small></td>
                        
                        <td>
                          
                            <small> {{ $formula->regular_price }} FCFA</small>
                          
                        </td>
                    
                        
                        <td>
                            <button class="btn btn-dark btn-circle btn-sm" wire:click="goToEditFormula({{$formula->id}})"> <i class="far fa-edit"></i> </button>
                            <button class="btn btn-danger btn-circle btn-sm" wire:click="confirmDelete('{{ $formula->name }}', {{$formula->id}})" > <i class="fas fa-trash"></i></button>
                        </td>
                    </tr>

                    @endforeach
                   
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
</div>



