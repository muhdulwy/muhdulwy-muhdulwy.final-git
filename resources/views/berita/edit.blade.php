@extends('template')

@section('content')
<div class="row mt-5 mb-5">
        <div class="float-right">
            <a class="btn btn-secondary" href="{{ route('berita.index') }}"> Kembali</a>
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> Input gagal.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container">
    <h1 class="mb-4 text-center">Edit Berita</h1>
<form action="{{ route('berita.update', $berita->id) }}" method="POST">
    @csrf
    @method("PUT")
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Judul Berita:</strong>
                <input type="text" name="Judul" class="form-control" placeholder="Judul" value="{{ old('Judul', $berita->Judul) }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Isi Berita:</strong>
                <input type="text" name="IsiBerita" class="form-control" placeholder="Isi Berita" value="{{ old('IsiBerita', $berita->IsiBerita) }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Kategori:</strong>
                <select name="kategori_id" class="form-control">
                    <option value="">-- pilih Kategori --</option>
                    @foreach ($kategori as $sw)
                        <option value="{{ $sw->id }}" {{ old('kategori_id', $berita->kategori_id) == $sw->id ? 'selected' : '' }}>{{ $sw->NamaKategori }}</option>
                    @endforeach
                </select>
            </div>
        </div>                
        
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
@endsection
