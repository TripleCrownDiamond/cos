<div wire:ignore.self>

    @if($currentPage == PAGECREATEFORM)
         @include("livewire.dashboard.formulas.add-formula")
    @endif

    @if($currentPage == PAGEEDITFORM)
        @include("livewire.dashboard.formulas.edit")
    @endif

    @if($currentPage == PAGELIST)
        @include("livewire.dashboard.formulas.formulas-list")
    @endif

</div>
<script>
    window.addEventListener('error', event => {
        swal('Oups', event.detail.content, 'error', {
          buttons: false,
          timer: 3000,
        });
    });
  
    window.addEventListener('success', event => {
        swal('Bien joué', event.detail.content, 'success', {
          buttons: false,
          timer: 3000,
        });
    });
  
    window.addEventListener('showConfirmMessage', event => {
      swal({
        title: event.detail.message.title,
        text: event.detail.message.text,
        icon: event.detail.message.type,
        buttons: true,
        dangerMode: true,
      })
        .then((willDelete) => {
          if (willDelete) {
            @this.resetPassword()
          }
        });
    });

    window.addEventListener('confirmDelete', event => {
      swal({
        title: event.detail.message.title,
        text: event.detail.message.text,
        icon: event.detail.message.type,
        buttons: true,
        dangerMode: true,
      })
        .then((willDelete) => {
          if (willDelete) {
            @this.deleteFormula(event.detail.message.data.formula_id)
          }
        });
    });
  
  </script>