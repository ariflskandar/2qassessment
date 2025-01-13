@extends("layout.default")

@section("title", "Create Company")
@section('content')
<div class="main-content">
    <div class="container mt-7">
        <!-- Show error message -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h1>Create Company</h1>
        <div class="card bg-default shadow">
            <div class="card-header bg-transparent border-0">
                <h3 class="text-white mb-0">Company Information</h3>
            </div>
            <form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="ms-4 mb-3">
                            <label for="name" class="text-white form-label">Name</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="me-4 mb-3">
                            <label for="email" class="text-white form-label">Email Address</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="ms-4 mb-3">
                            <label for="logo" class="text-white form-label">Logo</label>
                            <input type="file" name="logo" id="logo" class="form-control" accept="image/*">
                            <small class="text-white text-muted">Minimum dimensions: 100x100px</small>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="me-4 mb-3">
                            <label for="website" class="text-white form-label">Website Link</label>
                            <input type="url" name="website" id="website" class="form-control" value="{{ old('website') }}">
                        </div>
                    </div>
                    
                </div>
                <div class="me-4 mb-3 text-end">
                    <button type="submit" class="text-end btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection