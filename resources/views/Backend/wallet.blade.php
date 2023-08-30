@extends('Backend.Layout.backend')
@section('content')
    {{-- <div class="mt-3 mb-3 ms-3">
        <a href="{{ route('addUser') }}" class="btn bg-gradient-primary text-white"><i
                class="fa-solid fa-circle-plus me-2"></i>Add Admin</a>
    </div> --}}

    <div class="container-fluid mt-3 mb-3">

        <table id="table_id">
            <thead>
                <tr>
                    <th>Account Number</th>
                    <th>Account Person</th>
                    <th>Amount (MMK)</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                   
                </tr>
            </thead>
            <tbody>

                .....
            </tbody>
        </table>

    </div>
@endsection

@section('side')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script>
        $(function() {
            var table = $('#table_id').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ url('admin/ssdWallet') }}',
                columns: [{
                        data: 'account_number',
                        name: 'account_number'
                    },
                    {
                        data: 'account_person',
                        name: 'account_person'
                    },
                    {
                        data: 'amount',
                        name: 'amount'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    },
                    {
                        data: 'updated_at',
                        name: 'updated_at'
                    },
                    
                   
                   
                    // Add more columns as per your requirement
                ]
            });

            // $(document).on('click', '.deleteProduct', function(e) {
            //     e.preventDefault();
            //     var id = $(this).data("id");

            //     // alert(id);

            //     Swal.fire({
            //         title: 'Are you sure?',
            //         text: "You won't be able to revert this!",
            //         icon: 'warning',
            //         showCancelButton: true,
            //         confirmButtonColor: '#3085d6',
            //         cancelButtonColor: '#d33',
            //         confirmButtonText: 'Yes, delete it!'
            //     }).then((result) => {
            //         if (result.isConfirmed) {
            //             var token = $("meta[name='csrf-token']").attr("content");

            //             $.ajax({
            //                 url: '{{ route('adminPage.index') }}' + id,
            //                 type: 'Delete',
            //                 data: {
            //                     "id": id,
            //                     "_token": token,
            //                 },

            //                 success: function() {
            //                     console.log("This is work");
            //                     table.ajax.reload();
            //                 }

            //             });
            //         }
            //     })
            // })
        });
    </script>
@endsection
