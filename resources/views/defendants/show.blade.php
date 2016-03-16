@extends('layouts.master')

@section('content')

    <h1>Defendant</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>Defendant</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $defendant->id }}</td> <td> {{ $defendant->defendant }} </td>
                </tr>
            </tbody>    
        </table>
    </div>

@endsection