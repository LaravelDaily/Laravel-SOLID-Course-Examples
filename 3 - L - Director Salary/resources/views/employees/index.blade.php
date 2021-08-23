@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Employees') }}</div>

                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th class="text-center">Position</th>
                                <th class="text-center">Salary (USD / year)</th>
                                <th class="text-center">Years in Company</th>
                                <th class="text-center">Start date</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($employees as $employee)
                            <tr>
                                <td>{{ $employee->name }}</td>
                                <td class="text-center">{{ $employee->employee_type }}</td>
                                <td class="text-center">{{ number_format($employee->salary) }}</td>
                                <td class="text-center">{{ now()->diffInYears($employee->start_date) }}</td>
                                <td class="text-center">{{ $employee->start_date->format('Y-m-d') }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
