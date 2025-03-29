@extends('layouts.contentNavbarLayout')

@section('title', 'Fiscal Years - DataTables')

@section('content')
<!-- Sneat Card Component -->
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Fiscal Years</h5>
            <a href="{{ route('fiscal-years.create') }}" class="btn btn-primary btn-sm">

                <i class="bx bx-plus me-1"></i> Add Fiscal Year
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <table class="table table-hover" id="fiscalYearTable">
                    <thead class="table">
                        <tr>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <!-- Data will be populated via DataTables -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

<!-- jQuery and DataTables JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        // Check if DataTables and jQuery are loaded
        if (typeof $.fn.DataTable === 'undefined') {
            console.error('DataTables is not loaded');
        } else {
            console.log('DataTables is loaded, initializing table');
            $('#fiscalYearTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('fiscal-years.data') }}',
                columns: [{
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ]
            });
        }
    });
</script>
