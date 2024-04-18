{{-- download link - stretched --}}
<div>


   {{-- loading spinner --}}
   <span wire:loading wire:target='download'
      class="spinner-border spinner-border-sm text-success spinner--float-right-top" role="status"></span>


   {{-- download Link --}}
   <a wire:click.prevent='download' href="#!" class='init-link stretched-link'></a>


</div>