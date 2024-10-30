<div class="form-group mb-3">
    <label for="judul">Judul</label>
    <input type="text" class="form-control" name="judul" id="judul" value="{{ old('judul', $sambutan->judul ?? '') }}" required>
</div>

<div class="form-group mb-3">
    <label for="konten">Konten</label>
    <textarea name="konten" id="konten" class="form-control" rows="5" required>{{ old('konten', $sambutan->konten ?? '') }}</textarea>
</div>

<div class="form-group mb-3">
    <label for="gambar">Gambar</label>
    <input type="file" class="form-control" name="gambar" id="gambar">
    @if(isset($sambutan) && $sambutan->gambar)
        <img src="{{ asset('storage/' . $sambutan->gambar) }}" alt="Gambar" class="img-thumbnail mt-2" width="150">
    @endif
</div>
