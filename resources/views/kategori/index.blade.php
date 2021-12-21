@extends('template')

@section('content')

    @if ($message = Session::get('succes'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    <div class="container mt-5">
        <h1 class="mb-4 text-center">List Berita ITC News</h1>
        <table class="table table-bordered">
            <tr>
                <th width="20px" class="text-center">No</th>
                <th width="280px"class="text-center">Kategori</th>
                <th width="280px"class="text-center">Action</th>
            </tr>
            @foreach ($kategori as $Kategori)
            <tr>
                <td class="text-center">{{ ++$i }}</td>
                
                <td>{{ $Kategori->NamaKategori }}</td>
                <td class="text-center">
                    <form action="{{ route('kategori.destroy',$Kategori->id) }}" method="POST">

                        <a class="btn btn-primary btn-sm" href="{{ route('kategori.edit',$Kategori->id) }}">Edit</a>
    
                        @csrf
                        @method('DELETE')
    
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
                {!! $kategori->links() !!}
            
            @endsection