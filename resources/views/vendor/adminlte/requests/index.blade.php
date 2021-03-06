@extends('adminlte::layouts.sge_layout')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection


@section('content-header-v2')

	@include('vendor.adminlte.layouts.partials.contentheader_v2', 
			[	
				'title' => 'Request Type Categories',
				'indexes' => 'Requests'
			])

@endsection

@section('main-content')

	<div class="row">
		<div class="col-sm-12">
			<div class="text-right">
				<a href="{{ url('request/add') }}" class="btn btn-success btn-md" style="min-width: 170px;"><i class="fa fa-plus"></i> Add New Request Type </a>
			</div>
			<br>
			<table id="tbldatas" class="table table-striped table-bordered row-border table-hover table-compact"  style="table-layout: fixed;">
				<thead>
					<tr>
						<th width="5%">ID</th>
						<th width="auto">Code</th>
						<th width="auto">Name</th>
						<th width="160" class="text-center">Action</th>
					</tr>
				</thead>
				<tbody>
				@foreach($requests as $request)
					<tr>
						<td style="vertical-align: middle;">{{ $request->id }}</td>
						<td style="vertical-align: middle;">{{ $request->code }}</td>
						<td style="vertical-align: middle;">{{ $request->name }}</td>
						<td style="vertical-align: middle;">
							<a href="{{ url('request/edit/' . $request->id) }}" class="btn btn-info btn-xs" style="width: 48%;"> Edit </a>
							<a href="{{ url('request/delete/' . $request->id) }}" class="btn btn-danger btn-xs" style="width: 48%;"> Delete </a>
						</td>
					</tr>
				@endforeach
				</tbody>
				</tfoot>
			</table>
		</div>
	</div>

@endsection
