<table width="100%">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Workplace</th>
            <th scope="col">Status</th>
            <th scope="col">Role</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $data)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->name }}</td>
                <td>{{ $data->email }}</td>
                <td>{{ $data->workplace->name }}</td>
                <td>{{ $data->is_active }}</td>
                <td>{{ $data->role }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
