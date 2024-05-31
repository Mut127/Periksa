<a {{$attributes}} class="{{ $active ? ' bg-C29DC2 text-white' : 'text-black-300 hover:bg-C29DC2 hover:text-white'  }} rounded-md px-3 py-2 text-sm font-medium" aria-current="{{ $active ? 'page' : false}}">{{$slot}} </a>

<!-- //bg-purple -->