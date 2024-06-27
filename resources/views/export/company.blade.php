<table class="table table-bordered" id="workplace" width="100%">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name Company</th>
            <th scope="col">Npwp</th>
            <th scope="col">Address</th>
            <th scope="col">Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($companies as $data)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->name }}</td>
                <td>{{ $data->npwp }}</td>
                <td>{{ $data->address }}</td>
                <td>{{ $data->is_active }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
