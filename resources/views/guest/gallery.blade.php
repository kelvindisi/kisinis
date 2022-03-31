<x-guest-layout>
    <div class="gallery-container" style="margin-top: 100px;">
        <div class="image-gallery">
            @foreach($images as $image)
            <a href="{{ asset("storage/".$image->file) }}" class="img-{{$loop->index + 1}}" 
                style="background-image: url('{{ asset('storage/'.$image->file) }}');">
                <ion-icon name="expand-outline"></ion-icon>
            </a>
            @endforeach
        </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</x-guest-layout>