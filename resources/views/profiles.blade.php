@extends('layouts.app')

@section('content')

<!--base code taken from the home blade -->
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Profiles</div>
                <div class="panel-body">
					 <table class="table table-striped task-table">

                    <!-- Header Section -->
                    <thead>
                        <th>Name</th>
						<th>City</th>
						<th>Twitter</th>
						<th>Github</th> 
						<th>Role</th>
                    </thead>

                    <!-- Body Section -->
                    <tbody>
						<!--loop trough the results-->
                        @foreach ($users as $user)
                            <tr>
								<td class="table-text">
									<a href="mailto:{{$user->email}}">
										{{ $user->name }}
									</a>
									@if ($user->id == $id)
										&nbsp;<span style="color:red; font-weight:bold">&lt;- This is you!</span>
									@endif
								</td>
								<td class="table-text">{{ $user->city }}</td>
								<td class="table-text">{{ $user->twitter }}</td>
								<td class="table-text">{{ $user->github }}</td> 
								<td class="table-text">{{ $user->career_role }}</td>
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
