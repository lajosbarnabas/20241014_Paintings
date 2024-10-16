<x-layout>

    <form class="mb-3" action="/paintings/search-by-title" method="POST">
        @csrf
        <div class="d-flex align-items-center justify-content-between">
          <label for="Title" class="form-label">Title</label>
          <input type="text" class="form-control mx-3" id="title" name="title" value="{{old('title')}}">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>

    <div class="row">
        @foreach ($paintings as $paint)
            <div class="col-md-3 mb-3">
                <x-card :paint="$paint"></x-card>
            </div>
        @endforeach
    </div>
</x-layout>