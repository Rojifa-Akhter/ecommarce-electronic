@extends('layouts.admin')

@section('title', 'Category_list')

@section('content')
    <div class="p-4 rounded shadow-sm" style="background-color: #000;">

        <!-- Top Control Bar -->
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">


            <!-- Show per page -->
            <div class="d-flex align-items-center gap-2">
                <label for="entries" class="text-white">Showing</label>
                <select id="entries" class="form-select bg-dark text-white border-0" style="width: 80px;">
                    <option>10</option>
                    {{-- <option>25</option>
                    <option>50</option> --}}
                </select>
                <span class="text-white">on page</span>
            </div>

            <!-- Search -->
            <form method="GET" class="d-flex gap-2 mb-3">
                <input type="text" name="name" value="{{ request('name') }}"
                    class="form-control bg-dark text-white border-0" placeholder="Search by name...">

                <input type="date" name="created_at" value="{{ request('created_at') }}"
                    class="form-control bg-dark text-white border-0">

                <button type="submit" class="btn btn-warning">Filter</button>
                <a href="{{ url('admin/categories') }}" class="btn btn-secondary">Reset</a>
            </form>


            <!-- Add Category Button -->
            <a href="{{ url('/admin/add-category') }}" class="btn text-warning border border-warning fw-semibold px-4">
                Add Category +
            </a>
        </div>

        <!-- Category Table -->
        <div class="table-responsive">
            <table class="table table-borderless align-middle text-white mb-0">
                <thead class="text-uppercase small" style="color: #aaa; border-bottom: 1px solid #333;">
                    <tr>
                        <th>Sr. no.</th>
                        <th>Category Name</th>
                        <th>Image</th>
                        <th>Description</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $key => $category)
                        <tr style="background-color: #1c1c1c;">
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $category->name }}</td>
                            <td>
                                @if ($category->image)
                                    <img src="{{ $category->image }}" alt="Category Image" width="60" height="60"
                                        style="object-fit: cover;">
                                @else
                                    N/A
                                @endif
                            </td>

                            <td>{{ $category->description }}</td>
                            <td>{{ $category->created_at->format('d M Y') }}</td>

                            <td>
                                <a href="{{ url('admin/edit-category/' . $category->id) }}" class="text-warning me-2"><i
                                        class="bi bi-pencil-square"></i></a>
                                <form action="{{ url('admin/delete-category/' . $category->id) }}" method="POST"
                                    style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Are you sure?')"
                                        style="border: none; background: none;">
                                        <i class="bi bi-trash-fill text-danger"></i>
                                    </button>
                                </form>

                            </td>
                        </tr>
                        <tr style="height: 8px;"></tr>
                    @endforeach
                </tbody>

            </table>
        </div>

        <!-- Footer -->
        <div class="d-flex justify-content-between align-items-center mt-3 pt-3 border-top border-secondary">
            <small class="text-secondary">Showing 10 categories</small>

            <!-- Pagination -->
            <ul class="pagination pagination-sm mb-0">
                <li class="page-item"><a class="page-link bg-dark text-white border-0" href="#"><i
                            class="bi bi-chevron-left"></i></a></li>
                <li class="page-item"><a class="page-link bg-warning text-black border-0" href="#">1</a></li>
                <li class="page-item"><a class="page-link bg-dark text-white border-0" href="#">2</a></li>
                <li class="page-item"><a class="page-link bg-dark text-white border-0" href="#">3</a></li>
                <li class="page-item"><a class="page-link bg-dark text-white border-0" href="#"><i
                            class="bi bi-chevron-right"></i></a></li>
            </ul>
        </div>
    </div>
    <!-- Success / Error Message -->
    @if (session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger text-center">
            @foreach ($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
        </div>
    @endif
@endsection
@section('scripts')
    <script>
        setTimeout(() => {
            document.querySelectorAll('.alert').forEach(alert => alert.style.display = 'none');
        }, 300);
    </script>
@endsection
