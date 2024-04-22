<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <section class="d-flex flex-column gap-3">
        <h1>Data Pakaian</h1>
        <table class="table">
  <thead class="table-light">
    <tr>
        <td>ID</td>
        <td>Kode Barang</td>
        <td>Nama Barang</td>
        <td>Ukuran</td>
        <td>Deskripsi</td>
        <td>Harga</td>
        <td>Supplier</td>
        <td>Stok</td>
    </tr>
  </thead>
  <tbody>
   @if(!$clothes->isEmpty())
    @foreach($clothes as $c)
    <tr>
        <td>{{ $c->id }}</td>
        <td>{{ $c->kode_barang }}</td>
        <td>{{ $c->nama_barang }}</td>
        <td>{{ $c->ukuran }}</td>
        <td>{{ $c->deskrpsi }}</td>
        <td>{{ $c->harga }}</td>
        <td>{{ $c->supplier }}</td>
        <td>{{ $c->stok }}</td>
    </tr>
    @endforeach
   @else
    <tr>
        <td colspan='8'>Tidak ada data.</td>
    </tr>
   @endif
  </tbody>
</table>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>