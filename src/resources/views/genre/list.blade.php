@extends('layout')
@section('content')
<h1>{{ $title }}</h1>
@if (count($items) > 0)
 <table class="table table-sm table-hover table-striped">
 <thead class="thead-light">
 <tr>
 <th>ID</th>
 <th>Žanrs</th>
 <th>Grāmatas_ID</th>
 <th>Autora_ID</th>
 <th>&nbsp;</th>
 </tr>
 </thead>
 <tbody>
 @foreach($items as $genre)
 <tr>
 <td>{{ $genre->id }}</td>
 <td>{{ $genre->genre }}</td>
 <td>{{ $genre->book_id }}</td>
 <td>{{ $genre->author_id }}</td>
 <td>
 <a
 href="/genre/update/{{ $genre->id }}"
 class="btn btn-outline-primary btn-sm"
 >Labot</a> /
 <form
 method="post"
 action="/genre/delete/{{ $genre->id }}"
 class="d-inline deletion-form"
 >
 @csrf
<button
 type="submit"
 class="btn btn-outline-danger btn-sm"
 >Dzēst</button>
 </form>
 </td>
 </tr>
 @endforeach
 </tbody>
 </table>
@else
 <p>Nav atrasts neviens ieraksts</p>
@endif
@endsection
