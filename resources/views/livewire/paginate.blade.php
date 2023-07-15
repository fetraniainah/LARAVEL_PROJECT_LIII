

    @if ($paginator->hasPages())
        <nav role="navigation" aria-label="Pagination Navigation" style="max-width: 700px;background:transparent;display:flex;justify-content:flex-end">
            <span>
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <span style="color: rgba(250, 235, 215, 0.103);margin-right:25px">
                        Précedant
                    </span>
                @else
                    <button wire:click="previousPage" wire:loading.attr="disabled" rel="prev" style="background: rgba(5, 68, 5, 0.329);outline:none;border:none;padding:10px 25px;border-radius:8px;color:white;margin:25px;cursor: pointer;">
                        Précedant
                    </button>
                @endif
            </span>
 
            <span>
                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <button wire:click="nextPage" wire:loading.attr="disabled" rel="next" style="background: rgba(5, 68, 5, 0.329);outline:none;border:none;padding:10px 25px;border-radius:8px;color:white;margin:25px;cursor: pointer;">
                        Suivant
                    </button>
                @else
                    <span style="color: rgba(250, 235, 215, 0.103);margin-right:25px">
                        Suivant
                    </span>
                @endif
            </span>
        </nav>
    @endif