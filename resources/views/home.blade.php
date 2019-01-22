@extends('layouts.dashboard')

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
            <?php
            $date_now = date("m/d/Y");

            $date= new DateTime($reservering->datum);
            $date_convert = date_format($date,"m/d/Y");

            if ($date_now > $date_convert) {
                echo 'greater than';
            }else{
                echo 'Less than';
            }
            ?>
            <tr>
                <td>{{$reservering->reserveernummer}}</td>
                <td>{{$reservering->datum}}</td>
                <td>{{$reservering->tijd}}</td>
                <td>{{$reservering->klantnummer}}</td>
            </tr>
        @endforeach

        </tbody>
    </table>

@endsection


