<div>
  <div class="row">
    <div class="col-12">
      <div class="row d-flex justify-content-between">
        <div class="col-6">
          <a href="" wire:click.prevent="goToAddUser()" class="btn btn-dark btn-compose mb-3"><i class="
                fas fa-user-plus"></i> Nouveau Partenaire</a>
        </div>
        <div class="col-4 float-left">
          {{--<input type="text" class="form-control" name="" id="" placeholder="Rechercher..." wire:model="search">
          --}}
        </div>
      </div>
      <div class="card">
        <div class="card-header">
          <h4>Gérer les partenaires</h4>
        </div>
        <div class="card-body">
          {{-- <div class="table-responsive">
            <table class="table table-striped table-hover" id="" style="width:100%;">
              <thead>
                <tr>
                  <th>Nom & Prénoms</th>
                  <th>Téléphone</th>
                  <th>WhatsApp</th>
                  <th>Inscrit</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>

                @foreach ($users as $user)

                <tr>

                  <td><small>{{ $user->first_name }} {{ $user->last_name }}</small></td>

                  <td>
                    <small> {{ $user->telephone }}</small>
                  </td>
                  <td>
                    @if($user->whatsapp == NULL)
                    <small><span class="text-danger ml-3">Indisponible</span></small>
                    @else
                    <small><a class="btn btn-success" href="https://wa.me/{{ $user->whatsapp }}" target="blank"> <i
                          class="fab fa-whatsapp"></i> Contacter </a></small>
                    @endif
                  </td>
                  <td><small><span class="tag tag-success">{{ $user->created_at->diffForHumans() }}</span></small></td>
                  <td>
                    <button class="btn btn-dark btn-circle btn-sm" wire:click="goToEditUser({{$user->id}})"> <i
                        class="far fa-edit"></i> </button>
                    <button class="btn btn-danger btn-circle btn-sm"
                      wire:click="confirmDelete('{{ $user->first_name }} {{ $user->last_name }}', {{$user->id}})"> <i
                        class="fas fa-trash"></i></button>
                  </td>
                </tr>

                @endforeach


              </tbody>
            </table>
          </div> --}}
          <table id="example" class="table table-striped" style="width:100%">
            <thead>
              <tr>
                <th>Nom & Prénoms</th>
                <th>Téléphone</th>
                <th>WhatsApp</th>
                <th>Inscrit</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>

              @foreach ($users as $user)
                
                <tr>
                  <td><small>{{ $user->first_name }} {{ $user->last_name }}</small></td>

                  <td>
                    <small> {{ $user->telephone }}</small>
                  </td>
                  <td>
                    @if($user->whatsapp == NULL)
                    <small><span class="text-danger ml-3">Indisponible</span></small>
                    @else
                    <small><a class="btn btn-success" href="https://wa.me/{{ $user->whatsapp }}" target="blank"> <i
                          class="fab fa-whatsapp"></i> Contacter </a></small>
                    @endif
                  </td>
                  <td><small><span class="tag tag-success">{{ $user->created_at->diffForHumans() }}</span></small></td>
                  <td>
                    <button class="btn btn-dark btn-circle btn-sm" wire:click="goToEditUser({{$user->id}})"> <i
                        class="far fa-edit"></i> </button>
                    <button class="btn btn-danger btn-circle btn-sm"
                      wire:click="confirmDelete('{{ $user->first_name }} {{ $user->last_name }}', {{$user->id}})"> <i
                        class="fas fa-trash"></i></button>
                  </td>
                </tr>

                @endforeach
              
            </tbody>
            <tfoot>
              <tr>
                <th>Nom & Prénoms</th>
                <th>Téléphone</th>
                <th>WhatsApp</th>
                <th>Inscrit</th>
                <th>Action</th>
              </tr>
            </tfoot>
          </table>
        </div>
        {{-- <div class="card-footer">
          <div class="float-right">
            @if ($users->hasPages())
            <div class="pagination-wrapper">
              {{ $users->links() }}
            </div>
            @endif
          </div>
        </div> --}}
      </div>
    </div>
  </div>
</div>
