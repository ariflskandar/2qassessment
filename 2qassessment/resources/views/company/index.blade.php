@extends("layout.default")

@section("title", "Company")
@section('content')
<div class="main-content">
    <div class="container mt-7">
      <!-- Dark table -->
        @if(session()->has("success"))
            <div class="alert alert-success">
                {{session()->get("success")}}
            </div>
        @endif
        @if(session()->has("error"))
            <div class="alert alert-danger">
                {{session()->get("error")}}
            </div>
        @endif
        <div class="row mt-5">
            <div class="col">
                <div class="card bg-default shadow">
                    <div class="card-header bg-transparent border-0">
                    <div class="row">
                            <div class="col-6"><h3 class="text-white mb-0">Company List</h3></div>
                            <div class="col-6 text-end"><a href="{{ route('companies.create') }}" class="btn btn-success">Add New Company</a></div>
                        </div>
                    </div>
                    <!-- Check if there is company -->
                    @if ($companies->isEmpty())
                    <div class="col-6"><p class="text-white m-3">No companies found.</p></div>
                    
                    @else
                    <div class="table-responsive">
                        <table class="table align-items-center table-dark table-flush">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Website</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($companies as $company)
                                    <tr>
                                        <th scope="row">
                                        <div class="media align-items-center">
                                            <!-- Show company logo if exists -->
                                                @if ($company->logo)
                                                    <img src="{{ asset('storage/' . $company->logo) }}" alt="Logo" width="50" height="50" style="border-radius: 20px;">
                                                @else
                                                    N/A
                                                @endif
                                            <div class="media-body ms-3">
                                            <span class="mb-0 text-sm">{{ $company->name }}</span>
                                            </div>
                                        </div>
                                        </th>
                                        <td>
                                        {{ $company->email }}
                                        </td>
                                        <td>
                                            @if ($company->website)
                                                <a href="{{ $company->website }}" target="_blank" class="no-link">{{ $company->website }}</a>
                                            @else
                                                N/A
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                                <form action="{{ route('companies.destroy', $company->id) }}" method="POST" style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                                </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection