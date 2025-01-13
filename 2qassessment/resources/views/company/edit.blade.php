@extends("layout.default")

@section("title", "Edit Company")
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
        <h1>Edit Company</h1>
        <div class="card bg-default shadow">
            <div class="card-header bg-transparent border-0">
                <h3 class="text-white mb-0">Company Information</h3>
            </div>
            <form action="{{ route('companies.update', $company->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-6">
                        <div class="ms-4 mb-3">
                            <label for="name" class="text-white form-label">Company Name</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $company->name) }}" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="me-4 mb-3">
                            <label for="email" class="text-white form-label">Email Address</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $company->email) }}" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="ms-4">
                            <label for="logo" class="text-white form-label">Company Logo</label>
                            <input type="file" name="logo" id="logo" class="form-control" accept="image/*">
                            <small class="text-white text-muted">Minimum dimensions: 100x100px</small>
                            <!-- Show company logo -->
                            @if ($company->logo)
                                    <div class="mt-2 text-center">
                                        <img src="{{ asset('storage/' . $company->logo) }}" alt="Current Logo" width="100">
                                    </div>
                                @endif
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="me-4">
                            <label for="website" class="text-white form-label">Website Link</label>
                            <input type="url" name="website" id="website" class="form-control" value="{{ old('website', $company->website) }}">
                        </div>
                    </div>
                </div>
                <div class="text-end me-3 mb-3">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('companies.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection