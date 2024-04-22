<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboad</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <section class="d-flex flex-column gap-3 mx-auto mt-3" style="max-width:800px;">
        <h1>Data Pakaian</h1>
        <div>
            <a class="btn btn-primary mb-3" href="/dashboard/tambah">Tambah</a>
            <form action="/logout" method="post">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-outline-danger">logout</button>
            </form>
        </div>
        <div>
        @if (session('alert') && session('alertType') == 'danger') 
    <div class="alert alert-danger">
        {{ Session::get('alert') }}
    </div>
@endif
        @if (session('alert') && session('alertType') == 'success') 
    <div class="alert alert-success">
        {{ Session::get('alert') }}
    </div>
@endif
        </div>
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
        <td>Aksi</td>
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
        <td class="d-flex gap-2" rowspan='2'>
           <div class="mb-3">
             <a class="btn btn-outline-dark" href="{{route('edit-pakaian',  $c->id)}}">Edit</a>

           </div>
            <form action="/dashboard/hapus/{{$c->id}}" method="post">
                @csrf
                @method('delete')
                <!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Hapus
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div>Hapus</div>
        <div>{{  $c->nama_barang }}</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Hapus</button>
      </div>
    </div>
  </div>
</div>
            </form>
        </td>
    </tr>
    @endforeach
   @else
    <tr>
        <td colspan='10'>Tidak ada data.</td>
    </tr>
   @endif
  </tbody>
</table>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>