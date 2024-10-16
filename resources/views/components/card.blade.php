<div class="card">
    <img src="{{$paint['Image']}}" class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title">{{$paint['Painting']}}</h5>
        <p class="card-text" >Artist: {{$paint['Artist']}}</p>
        <p class="card-text" >Year of Painting: {{$paint['Year of Painting']}}</p>
        <a href="/paintings/{{$paint['Painting']}}" class="btn btn-primary">Details</a>
    </div>
</div>
