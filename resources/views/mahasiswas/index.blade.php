@extends('mahasiswas.layout')
@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left mt-2">
            <h2>JURUSAN TEKNOLOGI INFORMASI-POLITEKNIK NEGERI MALANG</h2>
        </div>
        <div class="float-right my-2">
                <form class="d-flex" action="{{ url('mahasiswas') }}" method="get">
                    <input class="form-control me-1" type="search" name="search" value="{{ Request::get('search') }}" placeholder="search" aria-label="Search">
                    <button class="btn btn-secondary" type="submit">Cari</button>
                </form>
            <a class="btn btnsuccess" href="{{ route('mahasiswas.create') }}"> Input Mahasiswa</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<table class="table table-bordered">
    <tr>
        <th>Nim</th>
        <th>Nama</th>
        <th>Tanggal Lahir</th>
        <th>Kelas</th>
        <th>Jurusan</th>
        <th>Email</th>
        <th>No_Handphone</th>
        <th width="280px">Action</th>
    </tr>
 
    @foreach ($mahasiswas as $Mahasiswa)
    <tr>
        <td>{{ $Mahasiswa->Nim }}</td>
        <td>{{ $Mahasiswa->Nama }}</td>
        <td>{{ $Mahasiswa->Tanggal_Lahir }}</td>
        <td>{{ $Mahasiswa->Kelas }}</td>
        <td>{{ $Mahasiswa->Jurusan }}</td>
        <td>{{ $Mahasiswa->Email }}</td>
        <td>{{ $Mahasiswa->No_Handphone }}</td>
        <td>

            <form action="{{ route('mahasiswas.destroy',$Mahasiswa->Nim) }}" method="POST">
                <a class="btn btninfo" href="{{ route('mahasiswas.show',$Mahasiswa->Nim) }}">Show</a>
                <a class="btn btnprimary" href="{{ route('mahasiswas.edit',$Mahasiswa->Nim) }}">Edit</a>
            @csrf
            @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
{{$mahasiswas->withQueryString()->links()}}

@endsection