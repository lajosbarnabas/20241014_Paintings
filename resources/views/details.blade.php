<x-layout>
    <img class="float-end" src="{{$paint['Image']}}" alt="{{$paint['Painting']}}">
    <h1>{{$paint['Painting']}}</h1>
    @foreach ($paint as $key => $value)
        @if ($key != 'Painting' && $key != 'Image' && $value != '')
            @if (str_contains($key, 'Wikipedia'))
                <p><a target="_blank" href="{{$value}}">{{$key}}</a></p>
            @else
                <p><b>{{$key}}</b>: {{$value}}</p>
            @endif
        @endif
    @endforeach
</x-layout>