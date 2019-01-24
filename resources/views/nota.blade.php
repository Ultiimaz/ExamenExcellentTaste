@extends("layouts.dashboard")

@section('page')
    <table class="table table-striped">
        <thead>
        <th>ID</th>
        <th>Address</th>
        <th>City</th>
        <th>Zip Code</th>
        <th>Action</th>
        </thead>
        <tbody>
        @foreach($reserveringen as $reservering)

            <tr>
                <td>{{$reservering->reserveernummer}}</td>
                <td>{{$reservering->datum}}</td>
                <td>{{$reservering->tijd}}</td>
                <td>{{$reservering->klantnummer}}</td>
                <td><a href="{{action('ProfielController@downloadPDF', $reservering->reserveernummer)}}">PDF</a></td>
            </tr>
        @endforeach

        </tbody>
    </table>
@endsection