<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Pakaian</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="d-flex gap-3 flex-column mx-auto" style="max-width:600px;">
        <h1>Tambah Pakaian</h1>
        @if (session('alert') && session('alertType') == 'danger') 
    <div class="alert alert-danger">
        {{ Session::get('alert') }}
    </div>
@endif
        <form action="/dashboard/tambah" method="post">
            @csrf
        <div class="form-floating mb-3">
  <input type="text" class="form-control" id="kodebrg"  name='kode_barang'>
  <label for="kodebrg" >Kode Barang</label>
</div>
        <div class="form-floating mb-3">
  <input type="text" class="form-control" id="namabrg"  name='nama_barang'>
  <label for="namabrg" >Nama Barang</label>
</div>
        <div class="form-floating mb-3">
  <input type="text" class="form-control" id="ukuran"  name='ukuran'>
  <label for="ukuran" >Ukuran</label>
</div>
<div class="form-floating">
  <textarea class="form-control" id="floatingTextarea" name="deskripsi"></textarea>
  <label for="floatingTextarea">Deskripsi</label>
</div>
        <div class="form-floating mb-3">
  <input type="number" class="form-control" id="harga"  name='harga'>
  <label for="harga" >Harga</label>
</div>
        <div class="form-floating mb-3">
  <input type="text" class="form-control" id="supplier"  name='supplier'>
  <label for="supplier" >Supplier</label>
</div>
<div class="form-floating mb-3">
  <input type="number" class="form-control" id="stok"  name='stok'>
  <label for="stok" >Stok</label>
</div>
<button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>