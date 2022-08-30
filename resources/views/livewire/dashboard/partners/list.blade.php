<div>
    <div class="row">
        <div class="col-12">
          <div class="alert alert-primary" role="alert">
            <h4 class="alert-heading">Informations importantes</h4>
            <hr>
            <p>1. Si vous ne retrouvez pas les boutons de <span class="text-success h5">"pagination et la barre de recherche"</span>, <span class="text-success h5">rechargez</span> la page. (Nous travaillons à corriger ce bug)</p>
            <p>2. Pour avoir les données les plus récentes, cliquez sur le bouton avec ce symbole <span class="text-success h5">"↑↓"</span> à l'extrémité droite de la colone <span class="text-success h5">"Date d'inscription"</span>.</p>
            <p class="mb-0"></p>
          </div>
          <div>
          <a href="" wire:click.prevent="goToAddUser()" class="btn btn-dark btn-compose mb-3"><i class="
              fas fa-user-plus"></i> Nouveau Partenaire</a>
          </div>
          <div class="card">
            <div class="card-header">
              <h4>Gérer les partenaires</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">

                <table class="table table-striped table-hover" id="save-stage" style="width:100%;">
                  <thead>
                    <tr>
                      <th>Nom & Prénoms</th>
                      <th>Téléphone</th>
                      <th>WhatsApp</th>
                      <th>Date d'inscription</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                        <td>
                            {{ $user->telephone }}
                        </td>
                        <td>
                            @if($user->whatsapp == NULL)
                                <span class="text-danger ml-3">Indisponible</span>
                            @else
                                <a href="https://wa.me/{{ $user->whatsapp }}" target="blank" > <i class="fa fa-whatsapp"></i> Contacter </a>
                            @endif
                        </td>
                        <td><span class="tag tag-success">{{ $user->created_at->diffForHumans() }}</span></td>
                        <td>
                            <button class="btn btn-dark btn-circle btn-sm"> <i class="far fa-edit"></i> </button>
                            <button class="btn btn-danger btn-circle btn-sm" wire:click="confirmDelete('{{ $user->first_name }} {{ $user->last_name }}', {{$user->id}})" > <i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                    @endforeach
                    
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer">
                
            </div>
          </div>
        </div>
      </div>
</div>



