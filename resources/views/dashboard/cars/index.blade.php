@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">My Cars</h1>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success col-lg-8" role="alert">
           {{ session('success') }}
        </div>
    @endif

    <a href="/dashboard/cars/create" class="btn btn-primary mb-3"><span data-feather="plus-circle"></span> Add new cars</a>
    <div class="table-responsive col-lg-8">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Model</th>
              <th scope="col">Merk</th>
              <th scope="col">Tahun</th>
              <th scope="col">Harga</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($cars as $car)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $car->model }}</td>
                    <td>{{ $car->merk->name }}</td>
                    <td>{{ $car->tahun }}</td>
                    <td>   {{ number_format($car->harga,0,',','.') }}</td>
                    <td>
                        <a href="/dashboard/cars/{{ $car->id }}" class="badge bg-info"><span data-feather="eye"></span></a>
                        <a href="{{ '/dashboard/cars/'.$car->id.'/edit' }}" class="badge bg-warning"><span data-feather="edit"></span></a>
                        <form action="/dashboard/cars/{{ $car->id }}" method="POST" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')">
                                <span data-feather="x-circle"></span>
                            </button>
                        </form>
                    </td>
                </tr>
              @endforeach    
          </tbody>
        </table>
      </div>
@endsection