@extends('Backend.Layout.backend')
@section('content')
<div class="container-fluid">

    <table id="table_id">
        <thead>
            <tr>
                <th>Col1</th>
                <th>Col2</th>
                <th>Col3</th>
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
            $('#table_id').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ url("admin/ssd") }}',
                columns: [
                    { data: 'name', name: 'name' },
                    { data: 'email', name: 'email' },
                    { data: 'phone', name: 'phone' },
                    // Add more columns as per your requirement
                ]
            });
        });
</script>
@endsection
