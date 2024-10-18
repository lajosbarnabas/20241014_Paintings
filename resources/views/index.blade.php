<x-layout>

    <div class="row">
        <form class="mb-3 col-md-6" action="/paintings/search-by-title" method="POST">
            @csrf
            <div class="d-flex align-items-center justify-content-between">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control mx-3" id="title" name="title" value="{{ old('title') }}">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
        <form class="mb-3 col-md-6" action="/paintings/search-by-artist" method="POST">
            @csrf
            <div class="d-flex align-items-center justify-content-between">
                <label for="artist" class="form-label">Artist</label>
                <select type="text" class="form-select mx-3" id="artist" name="artist">
                    @foreach ($artists as $artist)
                        @if (old('artist') == $artist)
                            <option selected value="{{ $artist }}">{{ $artist }}</option>
                        @else
                            <option value="{{ $artist }}">{{ $artist }}</option>
                        @endif
                    @endforeach
                </select>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>

    <div class="row">
        @foreach ($paintings as $paint)
            <div class="col-md-3 mb-3">
                <x-card :paint="$paint"></x-card>
            </div>
        @endforeach
    </div>
</x-layout>
