<div class="container">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            @foreach ($slide as $key => $row)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                    <img src="{{ asset('storage/assets/materi/foto.jpg') }}"
                        class="d-block w-100" alt="..." style="width: 300px; height: 150px;">
                </div>
            @endforeach

</div>

</div>
</div>
