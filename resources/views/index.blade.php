<x-layout>
    <div class="row">
        @foreach ($paintings as $paint)
            <div class="col-md-3 mb-3">
                <x-card :paint="$paint"></x-card>
            </div>
        @endforeach
    </div>
</x-layout>