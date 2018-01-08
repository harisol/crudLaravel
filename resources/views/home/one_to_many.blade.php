@extends('layouts.app')

@section('title', $title)

@section('sidebar')
	@parent
	<li>PHP</li>
@endsection

@section('content')
 	<center>
	 	<h1>{{ $title }}</h1>
	 	<p>{{ $content }}</p>
	 	@foreach ( $users as $user )
		 	<tr>
		 		<h3>Nama : {{ $user->name }}</h3>
		 	</tr>
		 	<table>
		 		<thead>
		 			<tr>
		 				<th>Kendaraan</th>
		 				<th>Jenis Kendaraan</th>
		 				<th>Buatan</th>
		 			</tr>
		 		</thead>
		 		<tbody>
		 			@foreach($user->kendaraan as $vehicle)
		 			<tr>
		 				<td>{{ $vehicle->nama_kendaraan }}</td>
		 				<td>{{ $vehicle->jenis_kendaraan }}</td>
		 				<td>{{ $vehicle->buatan }}</td>
		 			</tr>
		 			@endforeach
		 		</tbody>
		 	</table>
	 	@endforeach
	</center>
@endsection