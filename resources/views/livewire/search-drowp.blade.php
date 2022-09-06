
<div class="fixed top-0 left-0 w-full h-full bg-gray-200 z-40 select-none">
  <div class="w-4/6 z-50 relative mx-auto mt-36">
    <div class="bg-white w-full h-16 rounded-xl mb-3 shadow-lg p-2">
      <input type="text" wire:model.debounce.300ms="search" placeholder="Search" class="w-full h-full text-2xl rounded-lg focus:outline-none focus:ring focus:border-blue-300" />
    </div>
    <div class="bg-white w-full rounded-xl shadow-xl overflow-hidden p-1">
      <!-- items -->
      @if(strlen($search > 2))


      @forelse($searchResults as $result)

      <li class="w-full flex p-3 pl-4 items-center hover:bg-gray-300 rounded-lg cursor-pointer">
     
       <a 
       
        @if(array_key_exists('trackViewUrl' , $result))

        href="{{ $result['trackViewUrl'] }}"
        @else
        href="#"
        @endif 
        class="flex items-center px-4 py-4 hover:bg-gray-200 transition ease-in-out duration-150"> 
        <div class="mr-4">
          <div class="h-9 w-9 rounded-sm flex items-center justify-center text-3xl">
            <img src="{{ $result['artworkUrl60']}}" alt="album art" class="w-10">
          </div>
        </div>
        <div class="ml-4 leading-tight">
          <div class="font-semibold">Name:{{ $result['artistName']}}</div>
          <div class="text-gray-600">{{ $result['trackName'] }}</div>
        </div>
        @empty

      <li class="px-4 py-4">No results Found for "{{ $search }}"</li>

      @endforelse
    </a>
      </li>
      @endif
    </div>
  </div>
</div>