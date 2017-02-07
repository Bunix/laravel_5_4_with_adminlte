@extends('adminlte::layouts.sge_layout')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection


@section('content-header-v2')

	@include('vendor.adminlte.layouts.partials.contentheader_v2', 
			[	
				'title' => 'New Asset Category',
				'indexes' => 'Categories, Add'
			])

@endsection

@section('main-content')

	<div class="row">
		<div class="col-sm-12">
			<div class="text-left">
				<a href=" {{ url('categories') }}" class="btn btn-info btn-md"><i class="fa fa-arrow-circle-left"></i> Back </a>
			</div>
			<br>
			<div class="box" style="border-top: 0;">
				<div class="box-body">

					<div class="box box-primary">
						<div class="box-header with-border">
							<h3 class="box-title">Create a new asset category.</h3>
						</div>
						<form role="form" action="{{ url('category/add') }}" method="POST">
                    		{{ csrf_field() }}
							<div class="box-body">
								@include('macro.textv3', ['data' => array('Ecri Code', 'ecri_code', null, null, $errors )])
								@include('macro.textv3', ['data' => array('Description', 'description', null, null, $errors )])
								@include('macro.textv3', ['data' => array('Asset Definition', 'asset_definition', null, null, $errors )])
								@include('macro.textv3', ['data' => array('Life Service', 'life_service', null, null, $errors )])
								@include('macro.select_name', ['data' => array('Critical Level', 'critical_id', $critical, null, $errors )])
								@include('macro.select_name', ['data' => array('Classification Level', 'classification_id', $classification, null, $errors )])
								@include('macro.select_name', ['data' => array('Frequency Level', 'frequency_id', $frequency, null, $errors )])
								@include('macro.select_name', ['data' => array('Risk Level', 'risk_id', $risk, null, $errors )])
								@include('macro.select_name', ['data' => array('Proficiency Level', 'proficiency_id', $proficiency, null, $errors )])
								@include('macro.select_tenant', ['data' => array('Tenant Name', 'tenant_id', $tenants, null, $errors )])
							</div>
							<div class="box-footer">
								<button class="btn btn-success" type="submit">Submit</button>
								<a href=" {{ url('categories') }}" class="btn btn-info btn-md"> Cancel </a>
							</div>
						</form>
					</div>

				</div>
			</div>
		</div>
	</div>


@endsection
