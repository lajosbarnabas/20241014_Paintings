<x-layout>
    <x-slot name="title">Artists</x-slot>

    <ul>
        @foreach ($artists as $artist )
            <a href="/artists/{{$artist}}">
                <li>{{$artist}}</li>
            </a>
        @endforeach
    </ul>
</x-layout>