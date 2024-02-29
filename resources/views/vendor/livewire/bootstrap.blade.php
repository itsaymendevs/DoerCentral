<div>
   @if ($paginator->hasPages())
      <nav>
         <ul class="pagination justify-content-center">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
               <li class="page-item page-item-theme disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                  <span class="page-link" aria-hidden="true">&lsaquo;</span>
               </li>
            @else
               <li class="page-item page-item-theme">
                  <button class="page-link" type="button" aria-label="@lang('pagination.previous')"
                     dusk="previousPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}"
                     wire:click="previousPage('{{ $paginator->getPageName() }}')" wire:loading.attr="disabled"
                     rel="prev">&lsaquo;</button>
               </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
               {{-- "Three Dots" Separator --}}
               @if (is_string($element))
                  <li class="page-item  page-item-theme disabled" aria-disabled="true"><span
                        class="page-link">{{ $element }}</span></li>
               @endif

               {{-- Array Of Links --}}
               @if (is_array($element))
                  @foreach ($element as $page => $url)
                     @if ($page == $paginator->currentPage())
                        <li class="page-item page-item-theme active" aria-current="page"
                           wire:key="paginator-{{ $paginator->getPageName() }}-page-{{ $page }}"><span
                              class="page-link">{{ $page }}</span></li>
                     @else
                        <li class="page-item page-item-theme"
                           wire:key="paginator-{{ $paginator->getPageName() }}-page-{{ $page }}">
                           <button class="page-link" type="button"
                              wire:click="gotoPage({{ $page }}, '{{ $paginator->getPageName() }}')">{{ $page }}</button>
                        </li>
                     @endif
                  @endforeach
               @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
               <li class="page-item page-item-theme">
                  <button class="page-link" type="button" aria-label="@lang('pagination.next')"
                     dusk="nextPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}"
                     wire:click="nextPage('{{ $paginator->getPageName() }}')" wire:loading.attr="disabled"
                     rel="next">&rsaquo;</button>
               </li>
            @else
               <li class="page-item page-item-theme disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                  <span class="page-link" aria-hidden="true">&rsaquo;</span>
               </li>
            @endif
         </ul>
      </nav>
   @endif
</div>
