<table class="table table-striped">
    <thead>
        <tr>
            <th>id</th>
            <th>Team Name</th>
            <th>Country</th>
            <th>Total Point</th>
            <th>cAt</th>
            <th>uAt</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data_teamSeeder as $team)
            <tr>
                <td>{{ $team -> id_team}}</td>
                <td>{{ $team -> name_team}}</td>
                <td>{{ $team -> country_team}}</td>
                <td>{{ $team -> totalPoint_team}}</td>
            </tr>
        @endforeach
    </tbody>
</table>